<?php

namespace src\controllers;

use core\Application;
use core\Controller;
use core\helpers\CoreHelpers;
use core\helpers\GenerateToken;
use core\Request;
use core\Response;
use core\Session;
use core\View;
use Exception;
use src\models\Articles;
use src\models\Headlines;
use src\models\Newsletters;
use src\models\Users;

class SiteController extends Controller
{
    public function onConstruct()
    {
        $this->setLayout('blog');
    }

    /**
     * @throws Exception
     */
    public function index(): View
    {
        $latestParams = [
            'columns' => "article_id, title, img",
            'conditions' => "status = :status",
            'bind' => ['status' => 'public'],
            'limit' => '9',
            'order' => 'created_at DESC'
        ];

        $sportsParams = [
            'columns' => "articles.article_id, articles.title, articles.img, categories.name as category",
            'conditions' => "articles.status = :status AND categories.name = :category",
            'bind' => ['status' => 'public', 'category' => 'sports'],
            'joins' => [
                ['categories', 'articles.category_id = categories.id', 'categories', 'LEFT'],
            ],
            'limit' => '4',
        ];

        $politicsParams = [
            'columns' => "articles.article_id, articles.title, articles.img, categories.name as category",
            'conditions' => "articles.status = :status AND categories.name = :category",
            'bind' => ['status' => 'public', 'category' => 'politics'],
            'joins' => [
                ['categories', 'articles.category_id = categories.id', 'categories', 'LEFT'],
            ],
            'limit' => '4',
        ];

        $aroundParams = [
            'columns' => "articles.article_id, articles.title, articles.img, categories.name as category",
            'conditions' => "articles.status = :status AND categories.name = :category",
            'bind' => ['status' => 'public', 'category' => 'Around CNblog'],
            'joins' => [
                ['categories', 'articles.category_id = categories.id', 'categories', 'LEFT'],
            ],
            'limit' => '4',
        ];

        $globalParams = [
            'columns' => "articles.article_id, articles.title, articles.img, categories.name as category",
            'conditions' => "articles.status = :status AND categories.name = :category",
            'bind' => ['status' => 'public', 'category' => 'Global'],
            'joins' => [
                ['categories', 'articles.category_id = categories.id', 'categories', 'LEFT'],
            ],
            'limit' => '8',
        ];

        $techParams = [
            'columns' => "articles.article_id, articles.title, articles.img, categories.name as category",
            'conditions' => "articles.status = :status AND categories.name = :category",
            'bind' => ['status' => 'public', 'category' => 'Tech'],
            'joins' => [
                ['categories', 'articles.category_id = categories.id', 'categories', 'LEFT'],
            ],
            'limit' => '1',
        ];

        $storyParams = [
            'columns' => "articles.article_id, articles.title, articles.img, categories.name as category",
            'conditions' => "articles.status = :status AND categories.name = :category",
            'bind' => ['status' => 'public', 'category' => 'Story'],
            'joins' => [
                ['categories', 'articles.category_id = categories.id', 'categories', 'LEFT'],
            ],
            'limit' => '1',
        ];

        $headlinesParams = [
            'conditions' => "status = :status",
            'bind' => ['status' => '1'],
        ];


        $view = [
            'latestArticles' => Articles::find($latestParams),
            'techArticle' => Articles::findFirst($techParams),
            'storyArticle' => Articles::findFirst($storyParams),
            'sportsArticle' => Articles::find($sportsParams),
            'politicsArticle' => Articles::find($politicsParams),
            'aroundArticle' => Articles::find($aroundParams),
            'globalArticle' => Articles::find($globalParams),
            'headlines' => Headlines::find($headlinesParams),
        ];

        return View::make('blog/home', $view);
    }


    /**
     * @throws Exception
     */
    public function newsletter(Request $request)
    {
        $newsLetter = new NewsLetters();

        if($request->isPost()) {
            Session::csrfCheck();
            $newsLetter->email = $request->get('email');
            $newsLetter->newsletter_id = GenerateToken::randomString(6);

            if (empty($newsLetter->getErrors())) {
                if ($newsLetter->save()) {
                    Session::msg('Thanks for Subscribing. will get to you daily.', 'success');
                    Response::redirect('news');
                }
            }
            Session::msg('Error Occurred.', 'warning');
            Response::redirect('news');
        }
    }

}