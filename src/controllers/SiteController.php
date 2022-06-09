<?php

namespace src\controllers;

use core\Controller;
use core\View;

class SiteController extends Controller
{
    public function index()
    {
        $view = [
            'name' => 'Celio Natti',
        ];

        return View::make('blog/home', $view);
    }
}