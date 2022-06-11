<?php

use src\controllers\AdminController;
use src\controllers\AuthController;
use src\controllers\BlogController;
use src\controllers\MailboxController;
use src\controllers\SiteController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/** @var TYPE_NAME $app */

$app->router->get('/', [SiteController::class, 'index']);
$app->router->get('/news', [BlogController::class, 'news']);
$app->router->get('/read/{article_id}', [BlogController::class, 'read']);
$app->router->post('/read/{article_id}', [BlogController::class, 'read']);
$app->router->get('/contact', [BlogController::class, 'contact']);
$app->router->post('/contact', [BlogController::class, 'contact']);
$app->router->get('/read/articleNotFound', [BlogController::class, 'articleNotFound']);
$app->router->post('/newsletter', [BlogController::class, 'newsletter']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/logout', [AuthController::class, 'logout']);

// Admin
$app->router->get('/admin/dashboard', [AdminController::class, 'dashboard']);

//articles Actions
$app->router->get('/admin/articles', [AdminController::class, 'articles']);
$app->router->get('/admin/article/{id}', [AdminController::class, 'article']);
$app->router->post('/admin/article/{id}', [AdminController::class, 'article']);
$app->router->get('/admin/delete_article/{id}', [AdminController::class, 'deleteArticle']);

//category Actions
$app->router->get('/admin/categories/{id}', [AdminController::class, 'categories']);
$app->router->post('/admin/categories/{id}', [AdminController::class, 'categories']);

//Region Actions
$app->router->get('/admin/regions/{id}', [AdminController::class, 'regions']);
$app->router->post('/admin/regions/{id}', [AdminController::class, 'regions']);

//User Actions
$app->router->get('/admin/users', [AdminController::class, 'users']);
$app->router->get('/admin/create_user/{id}', [AdminController::class, 'createUser']);
$app->router->post('/admin/create_user/{id}', [AdminController::class, 'createUser']);

//Comments Actions
$app->router->get('/admin/comments', [AdminController::class, 'comments']);
$app->router->get('/admin/comment_delete/{id}', [AdminController::class, 'commentDelete']);
$app->router->get('/admin/comment_view/{id}', [AdminController::class, 'commentView']);

// Setting Actions
$app->router->get('/admin/settings', [AdminController::class, 'settings']);
$app->router->post('/admin/settings', [AdminController::class, 'settings']);
$app->router->get('/admin/settings/social', [AdminController::class, 'socialSettings']);
$app->router->get('/admin/settings/email', [AdminController::class, 'emailSettings']);

// Mailbox Actions
$app->router->get('/admin/mailbox/read', [MailboxController::class, 'read']);
$app->router->get('/admin/mailbox/inbox', [MailboxController::class, 'inbox']);
$app->router->get('/admin/mailbox/compose', [MailboxController::class, 'compose']);

//Newsletter Actions
$app->router->get('/admin/newsletter/mail', [AdminController::class, 'newsletterMail']);
$app->router->get('/admin/newsletter/subscribers', [AdminController::class, 'subscribers']);

//Contact Messages Actions
$app->router->get('/admin/contact_messages', [AdminController::class, 'contactMessages']);
$app->router->get('/admin/delete_contact_msg/{id}', [AdminController::class, 'deleteContactMessage']);