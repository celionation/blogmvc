<?php


/** @var $this core\View */

use core\forms\Form;
use core\helpers\TimeFormat;

$this->title = 'Blog Read Page';

global $currentUser;

?>

<?= partials('partials/welcome') ?>

<main class="container-fluid mt-1">
    <div class="row mb-3">
        <div class="col-12 col-lg-8 col-md-8 col-sm-12">
            <div class="card">
                <div class="thumbnail_read">
                    <img src="<?= '/' . $article->img ?>" alt="" class="w-100 img-fluid rounded-2">
                </div>
                <div class="card-header">
                    <h2 class="text-shadow h4 text-capitalize border-bottom border-top border-3 border-danger pb-2"><?= html_entity_decode($article->title) ?></h2>
                    <div class="info border-bottom border-3 border-danger pb-2 d-flex justify-content-around align-items-center">
                        <a class="text-dark small"><span class="far fa-clock"></span> <?= TimeFormat::TimeInAgo($article->created_at) ?></a> &bull;
                        <a class="text-dark small"><span class="fas fa-map-marker-alt"></span> <?= $article->region ?></a> &bull;
                        <a href="#" class="text-dark small"><span class="fas fa-user"></span> <?= $article->username ?></a>
                        <a class="text-dark small"><span class="fas fa-tag"></span>
                            <span class="badge bg-primary py-2"><?= $article->category ?></span>
                        </a>
                    </div>
                    <div class="single-content">
                        <div class="text-shadow fs-5 fst-italic lh-lg pb-2 border-bottom border-danger border-3">
                            <p><?= html_entity_decode($article->body) ?></p>
                            <div class="copyright bg-danger px-2 float-end">
                                <h6 class="text-white"><span>Source:</span> CNBlog</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- Comment Section -->
                    <div class="comment-section mt-2">
                        <div class="comment-count">
                            <h3 class="text-capitalize bg-danger rounded-pill p-2 text-white shadow-lg"><i class="fas fa-comment"></i> <?= $commentsTotal ?> Comment</h3>
                        </div>
                        <div class="comment-list">
                            <?php foreach ($comments as $comment) : ?>
                                <div class="comment-msg d-flex border-bottom border-3 border-danger py-2">
                                    <img src="/assets/img/author.png" alt="" class="rounded-circle" width="55px" height="55px">
                                    <div class="px-2">
                                        <div class="mx-auto d-flex justify-content-between align-items-center text-center">
                                            <h3 class="h6 text-capitalize"><?= $comment->name ?></h3>
                                            <small class="text-muted mx-5 mb-2"><i class="far fa-clock"></i> <?= TimeFormat::FBTimeAgo($comment->created_at) ?></small>
                                        </div>
                                        <p class="ms-3"><?= html_entity_decode($comment->comment) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="comment-form">
                            <h2 class="text-shadow h4 text-capitalize border-bottom border-3 border-danger pb-2"><i class="fas fa-comment-alt"></i> Add Comment</h2>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <?php /** @var mixed $currentUser */ ?>
                                    <?= Form::inputField('Name:', 'name', $currentUser->username ?? '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                                <div class="mb-3">
                                    <?= Form::textareaField('Comment:', 'comment', '', ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Max Characters is 255'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-md w-100">Add Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= component('BlogSidebar') ?>
    </div>
</main>