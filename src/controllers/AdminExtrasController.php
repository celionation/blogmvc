<?php

namespace src\controllers;

use core\Config;
use core\Controller;
use core\helpers\CoreHelpers;
use core\helpers\FileUpload;
use core\helpers\GenerateToken;
use core\helpers\TimeFormat;
use core\Request;
use core\Response;
use core\Session;
use core\View;
use Curl\Curl;
use GuzzleHttp\Client;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use src\classes\Permission;
use src\models\Adverts;
use src\models\Headlines;
use src\models\Users;
use Symfony\Component\DomCrawler\Crawler;

class AdminExtrasController extends Controller
{
    /**
     * @var bool|void
     */
    public $currentUser;

    /**
     * @throws Exception
     */
    public function onConstruct()
    {
        $this->setLayout('admin');

        /** @var mixed $currentUser */

        $this->currentUser = Users::getCurrentUser();

        Permission::permRedirect(['admin', 'author'], '');
    }


    public function rss(Request $request)
    {
        if ($request->isPost()) {
            $country = $request->get('country');
            $category = $request->get('category');
            $search = $request->get('search');

            $news = $this->newsApi($country, $category, $search);

            $articleLists = $news->articles;

            $news = json_decode(json_encode($articleLists), true);
        }


        $view = [
            'errors' => [],
            'country' => [
                'us' => 'UNITED STATE',
                'ng' => 'NIGERIA',
                'in' => 'INDIA'
            ],
            'category' => [
                ' ' => 'Please Select',
                'general' => 'General',
                'business' => 'Business',
                'sports' => 'Sports',
                'entertainment' => 'Entertainment',
            ],
            'articles' => $news ?? [],
        ];

        return View::make('admin/extras/rss', $view);
    }

    /**
     * @throws Exception
     */
    public function headlines(Request $request)
    {
        Permission::permRedirect(['admin', 'author'], 'admin/dashboard');

        $headlines = new Headlines();

        if($request->isPost()) {
            Session::csrfCheck();

            $headlines->status = '1';
            $headlines->body = $request->get('body');

            if($headlines->save()) {
                Session::msg("Headline Saved Successfully!.", 'success');
                Response::redirect('admin/extras/headlines');
            }
        }

        $headlinesList = $headlines::find();

        $view = [
            'errors' => $headlines->getErrors(),
            'headlinesList' => $headlinesList,
        ];

        return View::make('admin/extras/headlines', $view);
    }

    /**
     * @throws Exception
     */
    public function statusHeadline(Request $request)
    {
        Permission::permRedirect(['admin', 'author'], 'admin/dashboard');

        $id = $request->getParam('id');

        $headline = Headlines::findById($id);

        if($headline) {
            $headline->status = $headline->status ? 0 : 1;
            $headline->save();
            $msg = $headline->status ? "Headline Active." : "Headline Closed.";
        }
        Session::msg($msg, 'success');
        Response::redirect('admin/extras/headlines');
    }

    /**
     * @throws Exception
     */
    public function deleteHeadline(Request $request)
    {
        Permission::permRedirect(['admin', 'author'], 'admin/dashboard');

        $id = $request->getParam('id');

        $headline = Headlines::findById($id);

        if($headline) {
            $headline->delete();
        }
        Session::msg('Headline Deleted Successfully.', 'danger');
        Response::redirect('admin/extras/headlines');
    }

    public function newsApi($country, $category, $search)
    {
        if($category == '') {
            $url = "https://newsapi.org/v2/top-headlines?country={$country}&apiKey=" . Config::get('NEWSAPI_KEY');
        } else {
            $url = "https://newsapi.org/v2/top-headlines?country={$country}&category={$category}&apiKey=" . Config::get('NEWSAPI_KEY');
        }

        if($search) {
            $url = "https://newsapi.org/v2/everything?q={$search}&sortBy=publishedAt&apiKey=" . Config::get('NEWSAPI_KEY');
        }

//            $url = "https://newsapi.org/v2/top-headlines?country={$country}&category={$category}&apiKey=" . Config::get('NEWSAPI_KEY');

        $curl = new Curl();
        $curl->get($url);

        if ($curl->error) {
            echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
        } else {
            return $curl->response;
        }
    }

    /**
     * @throws Exception
     */
    public function adverts(): View
    {
        Permission::permRedirect(['admin', 'author'], 'admin/dashboard');

        $view = [
            'errors' => [],
        ];

        return View::make('admin/extras/adverts', $view);
    }

    /**
     * @throws Exception
     */
    public function createAdverts(Request $request): View
    {
        Permission::permRedirect(['admin', 'author'], 'admin/dashboard');
        
        $id = $request->getParam('id');

        if ($id == 'new') {
            $adverts = new Adverts();
        } else {
            $adverts = Adverts::findById($id);
        }

        if (!$adverts) {
            Session::msg("You do not have permission to edit this adverts", "info");
            Response::redirect('admin/extras/adverts/new');
        }

        if($request->isPost()) {
            Session::csrfCheck();
            $adverts->name = $request->get('name');
            $adverts->ads_img = $request->get('ads_img');
            $adverts->ads_img_link = $request->get('ads_img_link');
            $adverts->ads_link = $request->get('ads_link');
            $adverts->ads_label = $request->get('ads_label');
            $adverts->status = $request->get('status');
            $adverts->expired_in = $request->get('expired_in');

            $upload = new FileUpload('ads_img');

            $upload->directory('uploads/adverts');

            if ($adverts->save()) {
                if(!empty($upload->tmp)) {
                    if($upload->upload()) {
                        $adverts->ads_img = $upload->fc;
                        $adverts->save();
                    }
                }
                Session::msg("Adverts was saved Successfully!.", 'success');
                Response::redirect('admin/extras/adverts/new');
            }
        }

        $view = [
            'errors' => $adverts->getErrors(),
            'labelsOpt' => [
                '' => 'Please Select',
                Adverts::MAIN_ADS => 'Main',
                Adverts::SUB_ADS => 'Sub',
            ],
            'statusOpt' => [
                '' => '___Please Select___',
                'active' => 'Active',
                'inactive' => 'Inactive',
                'expired' => 'Expired',
            ],
            'expOpt' => [
                '' => '__Please Select__',
                'one week' => 'One Week',
                'two week' => 'Two Week',
                'three week' => 'Three Week',
                'one month' => 'One Month',
                'three months' => 'Three Months',
            ],
        ];

        return View::make('admin/extras/newAdverts', $view);
    }


}