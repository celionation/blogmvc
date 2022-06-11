<?php

namespace src\controllers;

use core\Controller;
use core\helpers\GenerateToken;
use core\Request;
use core\Response;
use core\Session;
use core\View;
use Exception;
use src\models\Articles;
use src\models\Comments;
use src\models\contactMessages;
use src\models\Users;

class BlogController extends Controller
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
        $this->setLayout('blog');

        $this->currentUser = Users::getCurrentUser();
    }

    /**
     * @throws Exception
     */
    public function news(): View
    {
        $this->setLayout('page');

        $params = [
            'columns' => "articles.*, users.username, categories.name as category, regions.name as region",
            'conditions' => "articles.status = :status",
            'bind' => ['status' => 'public'],
            'joins' => [
                ['users', 'articles.user_id = users.user_id'],
                ['categories', 'articles.category_id = categories.id', 'categories', 'LEFT'],
                ['regions', 'articles.region_id = regions.id', 'regions', 'LEFT']
            ],
            'order' => 'articles.created_at DESC'
        ];
        $params = Articles::mergeWithPagination($params);

        $view = [
            'total' => Articles::findTotal($params),
            'articles' => Articles::find($params),
        ];

        return View::make('blog/news', $view);
    }

    /**
     * @throws Exception
     */
    public function read(Request $request)
    {
        $id = $request->getParam('article_id');

        $params = [
            'columns' => "articles.*, users.username, category.name as category, region.name as region",
            'conditions' => "articles.article_id = :id AND articles.status = 'public'",
            'joins' => [
                ['users', 'users.user_id = articles.user_id'],
                ['categories', 'category.id = articles.category_id', 'category', 'LEFT'],
                ['regions', 'region.id = articles.region_id', 'region', 'LEFT']
            ],
            'bind' => ['id' => $id]
        ];
        $article = Articles::findFirst($params);
        if (!$article) Response::redirect('read/articleNotFound');
        if (empty($article->category_id) || empty($article->region_id)) {
            $article->category_id = 0;
            $article->category = "Uncategorized";
            $article->region_id = 0;
            $article->region = "Global";
        }

        $comment = new Comments();

        $Commentparams = [
            'conditions' => "article_id = :id",
            'bind' => ['id' => $id],
            'order' => 'created_at DESC'
        ];


        if($request->isPost()) {
            $comment->name = $request->get('name') ? $request->get('name') : 'anonymous';
            $comment->comment = $request->get('comment');
            $comment->article_id = $id;
            $comment->comment_id = GenerateToken::randomString(6);

            if($comment->save()) {
                Response::redirect("read/{$id}");
            }
        }

        $view = [
            'errors' => $comment->getErrors(),
            'article' => $article,
            'comments' => $comment::find($Commentparams),
            'commentsTotal' => $comment::findTotal($Commentparams)
        ];

        return View::make('blog/read', $view);
    }

    /**
     * @throws Exception
     */
    public function contact(Request $request)
    {
        $contactMsg = new contactMessages();

        if($request->isPost()) {
            Session::csrfCheck();
            $fields = ['fullname', 'email', 'subject', 'message'];
            foreach ($fields as $field) {
                $contactMsg->{$field} = $request->get($field);
            }
            $contactMsg->contact_id = GenerateToken::randomString(6);

            if ($contactMsg->save()) {
                Session::msg('Your Message was sent Successfully, Thank You!', 'warning');
                Response::redirect('contact');
            }
        }

        $view = [
            'errors' => $contactMsg->getErrors(),
            'contact' => $contactMsg,
        ];

        return view::make('blog/contact', $view);
    }

}