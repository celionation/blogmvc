<?php


use core\forms\Form;
use src\classes\BlogSidebar;


?>


<div class="col-12 col-lg-4 col-md-4 col-sm-12">
    <div class="position-sticky" style="top: 2rem;">
        <!--  Top Adverts  -->
        <div class="card mb-2">
            <img src="/assets/img/older_posts/older_posts_6.jpg" alt="" class="w-100 img-fluid rounded-3">
        </div>
        <!--  // Top Adverts  -->

        <!--  NewsLetters  -->
        <div class="card">
            <h2 class="text-shadow h4 text-uppercase rounded-3 text-center border-bottom border-3 border-danger pb-2">
                Subscribe</h2>
            <div class="card-body">
                <p class="text-center text-italic">Subscribe To Our Weekly Newsletter And Receive Updates Via Email.
                </p>
                <div class="mb-3">
                    <form action="/newsletter" method="post">
                        <?= Form::csrfField() ?>
                        <input type="email" name="email" id="" class="form-control" placeholder="E-Mail">
                        <button type="submit" class="btn btn-primary btn-lg w-100 mt-2">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        <!--  // NewsLetters  -->

        <!-- Share Link -->
        <div class="card mb-2 bg-light my-2">
            <div class="card-header sidebar d-flex justify-content-between px-3 py-3 align-items-start">
                <a href="#"><span class="fab fa-facebook-f fa-2x"></span></a>
                <a href="#"><span class="fab fa-twitter fa-2x"></span></a>
                <a href="#"><span class="fab fa-instagram fa-2x"></span></a>
            </div>
        </div>
        <!-- // Share Link -->

        <!--  New Updates  -->
        <?php $mostReads = BlogSidebar::mostRead() ?>
        <div class="card mb-2 mt-2">
            <h2 class="text-shadow h4 text-uppercase rounded-3 p-2 text-start border-bottom border-3 border-danger pb-1">
                Most Viewed</h2>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php foreach ($mostReads as $mostRead): ?>
                    <li class="list-group-item">
                        <a href="/read/<?= $mostRead->article_id ?>" class="text-black">
                            <h2 class="text-shadow h6 text-capitalize border-bottom border-3 border-danger pb-2">
                                <?= $mostRead->title ?></h2>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!--  //News Updates  -->

        <!--  News -->
        <?php $sideNews = BlogSidebar::sideNews() ?>
        <?php foreach ($sideNews as $news): ?>
        <div class="card position-relative overflow-hidden mb-3">
            <div class="mini-img">
                <img src="<?= ROOT . $news->img ?>" alt="" class="w-100 img-fluid rounded-3">
            </div>
            <div class="text position-absolute bottom-0">
                <a href="<?= $news->article_id ?>" class="text-white">
                    <h2 class="text-shadow bg-shadow h5 text-capitalize border-bottom border-3 border-danger p-3"><?= $news->title ?></h2>
                </a>
            </div>
        </div>
        <?php endforeach; ?>

        <!--  // News  -->

        <!--  Advert Down  -->
        <div class="card mb-2">
            <img src="/assets/img/older_posts/older_posts_1.jpg" alt="" class="w-100 img-fluid rounded-3">
        </div>
        <!--  // Advert Down  -->

    </div>
</div>
