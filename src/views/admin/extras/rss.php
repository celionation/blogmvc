<?php

/** @var $this View */

use core\forms\Form;
use core\helpers\StringFormat;
use core\View;

$this->title = 'Admin RSS FEEDS';

?>

<div class="content my-2">
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="link-secondary" href="#">Subscribe</a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="#">Large</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <form action="" method="post" class="d-flex justify-content-end align-items-center">
                        <?= Form::selectField('', 'country', '', $country, ['class' => 'form-control'], ['class' => 'mb-3 mx-1'], $errors) ?>
                        <?= Form::selectField('', 'category', '', $category, ['class' => 'form-control'], ['class' => 'mb-3 mx-1'], $errors) ?>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 link-secondary" href="#">World</a>
                <a class="p-2 link-secondary" href="#">U.S.</a>
                <a class="p-2 link-secondary" href="#">Technology</a>
                <a class="p-2 link-secondary" href="#">Design</a>
                <a class="p-2 link-secondary" href="#">Culture</a>
                <a class="p-2 link-secondary" href="#">Business</a>
                <a class="p-2 link-secondary" href="#">Politics</a>
                <a class="p-2 link-secondary" href="#">Opinion</a>
                <a class="p-2 link-secondary" href="#">Science</a>
                <a class="p-2 link-secondary" href="#">Health</a>
                <a class="p-2 link-secondary" href="#">Style</a>
                <a class="p-2 link-secondary" href="#">Travel</a>
            </nav>
        </div>
    </div>

    <main class="container">
        <div class="row mb-2">
            <?php foreach ($articles as $article): ?>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary"><?= $article['author'] ?></strong>
                        <h3 class="mb-0"><?= $article['title'] ?></h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto"><?= $article['description'] ?></p>
                        <a href="<?= $article['url'] ?>" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="<?= $article['urlToImage'] ?>" width="200" height="250" class="img-fluid">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </main>
</div>