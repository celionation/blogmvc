<?php

namespace src\controllers;

use core\Controller;
use core\helpers\CoreHelpers;
use core\helpers\GenerateToken;
use core\Request;
use core\Response;
use core\Session;
use core\View;
use Exception;
use src\models\Users;

class AuthController extends Controller
{
    public function onConstruct()
    {
        $this->setLayout('auth');
    }

    /**
     * @throws Exception
     */
    public function register(Request $request)
    {
        $user = new Users();

        if($request->isPost()) {
            Session::csrfCheck();
            $fields = ['username', 'email', 'password', 'confirmPassword', 'terms'];
            foreach ($fields as $field) {
                $user->{$field} = $request->get($field);
            }

            $user->acl = 'guests';
            $user->terms = $user->terms ? 1 : 0;
            $user->ref_link = GenerateToken::randomString(6);
            $user->user_id = GenerateToken::randomString(10);

            if ($user->save()) {
                Session::msg('Thanks for Registering', 'success');
                Response::redirect('login');
            }
        }

        $view = [
            'errors' => $user->getErrors(),
            'user' => $user,
        ];

        return View::make('auth/register', $view);
    }

    /**
     * @throws Exception
     */
    public function login(Request $request)
    {
        $user = new Users();
        $isError = true;

        if ($request->isPost()) {
            Session::csrfCheck();
            $user->email = $request->get('email');
            $user->password = $request->get('password');
            $user->remember = $request->get('remember');
            $user->validateLogin();
            if (empty($user->getErrors())) {
                $u = $user->findFirst([
                    'conditions' => "email = :email",
                    'bind' => ['email' => $request->get('email')]
                ]);
                if ($u) {
                    $verified = password_verify($request->get('password'), $u->password);
                    if ($verified) {
                        //log the user in
                        $isError = false;
                        $remember = $request->get('remember') == 'on';
                        $u->login($remember);
                        Response::redirect('');
                    }
                }
            }
            if ($isError) {
                $user->setError('email', 'Something is wrong with the Email or Password. Please try again.');
                $user->setError('password', '');
            }
        }

        $view = [
            'errors' => $user->getErrors(),
            'user' => $user,
        ];
        return View::make('auth/login', $view);
    }

    public function logout()
    {
        /** @var mixed $currentUser */
        global $currentUser;
        if ($currentUser) {
            $currentUser->logout();
        }
        Response::redirect('');
    }

}