<?php

namespace src\controllers;

use core\Controller;
use core\View;
use Exception;
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
        $view = [
            'name' => 'celio natti',
        ];

        return View::make('blog/home', $view);
    }

}