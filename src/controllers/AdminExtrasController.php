<?php

namespace src\controllers;

use core\Controller;
use core\helpers\CoreHelpers;
use core\Request;
use core\Response;
use core\Session;
use core\View;
use Curl\Curl;
use GuzzleHttp\Client;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use src\classes\Permission;
use src\models\Headlines;
use src\models\Users;

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


    public function rss()
    {
//        $curl = new Curl();
//        $curl->get('http://nattiblog.test/news');
//
//        if ($curl->error) {
//            echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
//        } else {
//            echo 'Response:' . "\n";
//            var_dump($curl->response);
//        }

        $view = [
            'errors' => [],
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


}