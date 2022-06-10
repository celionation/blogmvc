<?php

namespace src\controllers;

use core\Controller;
use core\View;
use src\models\Users;

class AuthController extends Controller
{
    public function onConstruct()
    {
        $this->setLayout('auth');
    }

    public function register()
    {
        $user = new Users();

        $view = [
            'errors' => $user->getErrors(),
            'user' => $user,
        ];

        return View::make('auth/register', $view);
    }

}