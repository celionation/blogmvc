<?php

namespace src\controllers;

use core\Application;
use core\Controller;
use core\helpers\CoreHelpers;
use core\helpers\File;
use core\helpers\FileUpload;
use core\Request;
use core\Response;
use core\Session;
use core\View;
use Exception;
use src\classes\Permission;
use src\models\AdminUsers;
use src\models\Articles;
use src\models\Categories;
use src\models\Comments;
use src\models\contactMessages;
use src\models\Newsletters;
use src\models\Regions;
use src\models\Settings;
use src\models\Users;

class AdminController extends Controller
{
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

    public function dashboard()
    {
        $view = [];

        return View::make('admin/dashboard', $view);
    }

    /**
     * @throws Exception
     */
    public function articles()
    {
        Permission::permRedirect(['admin', 'author'], 'admin/dashboard');

        if($this->currentUser->acl == 'admin') {
            $params = [
                'columns' => "articles.*, users.fname, users.lname, categories.name as category",
                'joins' => [
                    ['users', 'articles.user_id = users.user_id'],
                    ['categories', 'articles.category_id = categories.id', 'categories', 'LEFT']
                ],
                'order' => 'articles.id DESC'
            ];
        } else {
            $params = [
                'columns' => "articles.*, users.fname, users.lname, categories.name as category",
                'conditions' => "users.user_id = :user_id",
                'bind' => ['user_id' => $this->currentUser->user_id],
                'joins' => [
                    ['users', 'articles.user_id = users.user_id'],
                    ['categories', 'articles.category_id = categories.id', 'categories', 'LEFT']
                ],
                'order' => 'articles.id DESC'
            ];
        }

        $params = Articles::mergeWithPagination($params);

        $view = [
            'articles' => Articles::find($params),
            'total' => Articles::findTotal($params),
        ];

        return View::make('admin/articles/articles', $view);
    }

    /**
     * @throws Exception
     */
    public function article(Request $request)
    {
        Permission::permRedirect(['admin', 'author'], 'admin/dashboard');

        $id = $request->getParam('id');

        $params = [
            'conditions' => "id = :id AND user_id = :user_id",
            'bind' => ['id' => $id, 'user_id' => $this->currentUser->user_id]
        ];

        $article = $id == 'new' ? new Articles() : Articles::findFirst($params);
        if (!$article) {
            Session::msg("You do not have permission to edit this article", 'info');
            Response::redirect('admin/articles');
        }

        $categories = Categories::find(['order' => 'name']);
        $catOptions = [0 => '---'];
        foreach ($categories as $category) {
            $catOptions[$category->id] = $category->name;
        }

        $regions = Regions::find(['order' => 'name']);
        $regOptions = [0 => '---'];
        foreach ($regions as $region) {
            $regOptions[$region->id] = $region->name;
        }

        if ($request->isPost()) {
            Session::csrfCheck();
            $article->user_id = $this->currentUser->user_id;
            $article->title = $request->get('title');
            $article->body = $request->get('body');
            $article->status = $request->get('status');
            $article->category_id = $request->get('category_id');
            $article->region_id = $request->get('region_id');
            $upload = new FileUpload('img');

            if ($id != 'new') {
                $upload->required = false;
            }

            if (empty($article->getErrors())) {
                $upload->directory('uploads/articles');

                if ($article->save()) {
                    if(!empty($upload->tmp)) {
                        if($upload->upload()) {
                            $article->img = $upload->fc;
                            $article->save();
                        }
                    }
                    Session::msg("{$article->title}... Saved Successfully!.", 'success');
                    Response::redirect('admin/articles');
                }
            }
        }

        $view = [
            'article' => $article,
            'heading' => $id === 'new' ? "Add Article" : "Edit Article",
            'statusOptions' => ['private' => 'Private', 'public' => 'Public'],
            'categoryOptions' => $catOptions,
            'regionOptions' => $regOptions,
            'hasImage' => !empty($article->img),
            'errors' => $article->getErrors(),
        ];

        return View::make('admin/articles/article', $view);
    }

    /**
     * @throws Exception
     */
    public function deleteArticle(Request $request)
    {
        Permission::permRedirect(['admin', 'author'], 'admin/dashboard');

        $id = $request->getParam('id');

        if ($this->currentUser->acl == 'admin') {
            $params = [
                'conditions' => "id = :id",
                'bind' => ['id' => $id]
            ];
        } else {
            $params = [
                'conditions' => "id = :id AND user_id = :user_id",
                'bind' => ['id' => $id, 'user_id' => $this->currentUser->user_id]
            ];
        }

        $article = Articles::findFirst($params);
        if ($article) {
            Session::msg("Article Deleted Successfully.", 'success');
            unlink(Application::$ROOT_DIR . '/public/' . $article->img);
            $article->delete();
        } else {
            Session::msg("You do not have permission to delete that article");
        }
        Response::redirect('admin/articles');
    }

    /**
     * @throws Exception
     */
    public function categories(Request $request)
    {
        $id = $request->getParam('id');

        if ($id == 'new') {
            $category = new Categories();
        } else {
            $category = Categories::findById($id);
        }

        if (!$category) {
            Session::msg("You do not have permission to edit this package", "info");
            Response::redirect('admin/categories/new');
        }

        $params = [
            'order' => 'id DESC'
        ];
        $params = Categories::mergeWithPagination($params);

        if ($request->isPost()) {
            Session::csrfCheck();
            $category->name = $request->get('name');

            if ($category->save()) {
                Session::msg('Category Saved Successfully', 'success');
                Response::redirect('admin/categories/new');
            }
        }

        $view = [
            'errors' => $category->getErrors(),
            'category' => $category,
            'categories' => Categories::find($params),
            'total' => Categories::findTotal($params),
            'heading' => $id === 'new' ? "Create" : "Edit Category",
            'btn' => $id === 'new' ? "Create" : "Update",
        ];

        return View::make('admin/categories/categories', $view);
    }

    /**
     * @throws Exception
     */
    public function regions(Request $request)
    {
        $id = $request->getParam('id');

        if ($id == 'new') {
            $region = new Regions();
        } else {
            $region = Regions::findById($id);
        }

        if (!$region) {
            Session::msg("You do not have permission to edit this package", "info");
            Response::redirect('admin/regions/new');
        }

        $params = [
            'order' => 'id DESC'
        ];
        $params = Regions::mergeWithPagination($params);

        if ($request->isPost()) {
            Session::csrfCheck();
            $region->name = $request->get('name');

            if ($region->save()) {
                Session::msg('Region Saved Successfully', 'success');
                Response::redirect('admin/regions/new');
            }
        }

        $view = [
            'errors' => $region->getErrors(),
            'region' => $region,
            'regions' => Regions::find($params),
            'total' => Regions::findTotal($params),
            'heading' => $id === 'new' ? "Create" : "Edit Region",
            'btn' => $id === 'new' ? "Create" : "Update",
        ];

        return View::make('admin/regions/regions', $view);
    }

    /**
     * @throws Exception
     */
    public function users()
    {
        Permission::permRedirect(['admin'], 'admin/dashboard');
        $params = ['order' => 'lname', 'fname'];
        $params = Users::mergeWithPagination($params);

        $view = [
            'users' => Users::find($params),
            'total' => Users::findTotal($params),
        ];

        return View::make('admin/users/users', $view);
    }

    /**
     * @throws Exception
     */
    public function createUser(Request $request)
    {
        Permission::permRedirect(['admin'], 'admin/dashboard');

        $id = $request->getParam('id');

        $params = [
            'conditions' => "id = :id",
            'bind' => ['id' => $id]
        ];

        $user = $id == 'new' ? new AdminUsers() : AdminUsers::findFirst($params);

        if (!$user) {
            Session::msg("You do not have permission to edit this article", 'info');
            Response::redirect('admin/users');
        }

        if($request->isPost()) {
            Session::csrfCheck();
            $fields = ['username','fname', 'lname', 'email', 'acl', 'gender', 'state', 'country', 'address', 'password', 'confirmPassword'];
            foreach ($fields as $field) {
                $user->{$field} = $request->get($field);
            }
            $upload = new FileUpload('img');

            $user->fullname = $user->fname . '' . $user->lname;

            if (empty($user->getErrors())) {
                $upload->directory('uploads/users');

                if ($user->save()) {
                    if(!empty($upload->tmp)) {
                        if($upload->upload()) {
                            $user->img = $upload->fc;
                            $user->save();
                        }
                    }
                    Session::msg("User Registration was saved Successfully!.", 'success');
                    Response::redirect('admin/users');
                }
            }

        }

        $view = [
            'errors' => $user->getErrors(),
            'user' => $user,
            'acl' => [
                '' => '',
                AdminUsers::GUESTS_PERMISSION => 'Guests',
                AdminUsers::AUTHOR_PERMISSION => 'Author',
                AdminUsers::ADMIN_PERMISSION => 'Admin',
            ],
            'gender' => [
                '' => '',
                AdminUsers::MALE_GENDER => 'Male',
                AdminUsers::FEMALE_GENDER => 'Female',
            ],
        ];

        return View::make('admin/users/create', $view);
    }

    /**
     * @throws Exception
     */
    public function comments()
    {
        Permission::permRedirect(['admin', 'author'], 'admin/dashboard');

        if ($this->currentUser->acl == 'admin') {
            $params = [
                'columns' => "comments.*, articles.title",
                'conditions' => "articles.article_id = comments.article_id",
                'joins' => [
                    ['articles', 'comments.article_id = articles.article_id'],
                ],
                'order' => 'articles.created_at DESC'
            ];
        } else {
            $params = [
                'columns' => "comments.*, articles.title",
                'conditions' => "articles.article_id = comments.article_id AND articles.user_id = :user_id",
                'bind' => ['user_id' => $this->currentUser->user_id],
                'joins' => [
                    ['articles', 'comments.article_id = articles.article_id'],
                ],
                'order' => 'articles.created_at DESC'
            ];
        }

        $params = Comments::mergeWithPagination($params);

        $view = [
            'comments' => Comments::find($params),
            'total' => Comments::findTotal($params),
        ];

        return View::make('admin/comments/comments', $view);
    }

    /**
     * @throws Exception
     */
    public function commentDelete(Request $request)
    {
        Permission::permRedirect(['admin', 'author'], 'admin/dashboard');

        $id = $request->getParam('id');

        $params = [
            'conditions' => "comment_id = :comment_id",
            'bind' => ['comment_id' => $id]
        ];

        $comment = Comments::findFirst($params);
        if ($comment) {
            Session::msg("Comment Deleted Successfully.", 'success');
            $comment->delete();
        } else {
            Session::msg("You do not have permission to delete that comment");
        }
        Response::redirect('admin/comments');
    }

    /**
     * @throws Exception
     */
    public function settings(Request $request)
    {
        Permission::permRedirect(['admin', 'author'], 'admin/dashboard');

        $settings = new Settings();

        if($request->isPost()) {
            Session::csrfCheck();
            $fields = ['sitename', 'manager', 'logo', 'copyright', 'description', 'keywords', 'mission_aim', 'about_founder'];
            foreach ($fields as $field) {
                $settings->{$field} = $request->get($field);
            }

            if($settings->save()) {
                Session::msg('Saved!', 'success');
                Response::redirect('admin/settings');
            }
        }

        $view = [
            'errors' => $settings->getErrors(),
            'setting' => $settings::findFirst(),
        ];

        return View::make('admin/settings/settings', $view);
    }

    public function socialSettings()
    {
        $view = [
            'errors' => [],
        ];

        return View::make('admin/settings/social', $view);
    }

    public function emailSettings()
    {
        $view = [
            'errors' => [],
        ];

        return View::make('admin/settings/email', $view);
    }

    /**
     * @throws Exception
     */
    public function fieldsSettings(Request $request)
    {
        Permission::permRedirect(['admin'], 'admin/settings');

        $settings = new Settings();

        if($request->isPost()) {
            Session::csrfCheck();
            $settings->name = strtolower($request->get('name'));

            if ($settings->save()) {
                Session::msg("{$settings->name} added successfully.", 'success');
                Response::redirect('admin/settings/fields');
            }
        }

        $view = [
            'errors' => $settings->getErrors(),
            'settings' => Settings::find(),
        ];

        return View::make('admin/settings/fields', $view);
    }

    /**
     * @throws Exception
     */
    public function delete_field(Request $request)
    {
        Permission::permRedirect(['admin'], 'admin/settings');

        $id = $request->getParam('id');

        $params = [
            'conditions' => "id = :id",
            'bind' => ['id' => $id]
        ];

        $settings = Settings::findFirst($params);

        if($settings) {
            Session::msg('Field Deleted...');
            $settings->delete();
            Response::redirect('admin/settings/fields');
        }
    }

    /**
     * @throws Exception
     */
    public function contactMessages()
    {
        $view = [
            'contactMsgs' => contactMessages::find(),
            'total' => contactMessages::findTotal(),
        ];

        return View::make('admin/contactMsg', $view);
    }

    /**
     * @throws Exception
     */
    public function deleteContactMessage(Request $request)
    {
        Permission::permRedirect(['admin'], 'admin');

        $id = $request->getParam('id');

        $params = [
            'conditions' => "contact_id = :contact_id",
            'bind' => ['contact_id' => $id]
        ];

        $contactMsg = contactMessages::findFirst($params);
        if ($contactMsg) {
            Session::msg("Contact Message Deleted Successfully.", 'success');
            $contactMsg->delete();
        } else {
            Session::msg("You do not have permission to delete that Message");
        }
        Response::redirect('admin/contact_messages');
    }

    public function newsletterMail()
    {
        $view = [];

        return View::make('admin/newsletter/mail', $view);
    }

    /**
     * @throws Exception
     */
    public function subscribers()
    {
        $params = [
            'order' => 'created_at DESC'
        ];
        $view = [
            'newsletters' => NewsLetters::find($params),
            'total' => NewsLetters::findTotal($params),
        ];

        return View::make('admin/newsletter/subscribers', $view);
    }


}