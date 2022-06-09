<?php

namespace src\controllers;

use core\Controller;
use core\View;
use Exception;
use src\models\Users;

class SiteController extends Controller
{
    /**
     * @throws Exception
     */
    public function index(): View
    {
        $view = [
            'name' => Users::findFirst(),
        ];

        return View::make('blog/home', $view);
    }

    public function news(): View
    {
        $view = [
            'name' => 'Celio Natti',
        ];

        return View::make('blog/news', $view);
    }
}