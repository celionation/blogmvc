<?php

namespace src\controllers;

use core\Controller;
use core\View;
use Exception;
use src\classes\Permission;
use src\models\Users;

class MailboxController extends Controller
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

    public function inbox()
    {
        $view = [];

        return View::make('admin/mailbox/inbox', $view);
    }

    public function read()
    {
        $view = [];

        return View::make('admin/mailbox/read', $view);
    }

    public function compose()
    {
        $view = [];

        return View::make('admin/mailbox/compose', $view);
    }
}