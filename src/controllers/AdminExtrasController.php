<?php

namespace src\controllers;

use core\Controller;
use core\helpers\CoreHelpers;
use core\View;
use Exception;
use src\classes\Permission;
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
        $view = [
            'errors' => [],
        ];

        return View::make('admin/extras/rss', $view);
    }

    public function headlines()
    {
        $view = [
            'errors' => [],
        ];

        return View::make('admin/extras/headlines', $view);
    }
}