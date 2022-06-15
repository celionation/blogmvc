<?php


$this->title = 'Welcome Page';


?>

<?= partials('partials/welcome') ?>
<main class="container-fluid mt-2">
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
            </div>
        </div>
    </header>
    <!-- ________________END OF LABEL_____________________ -->

    <!--_______________________SLIDER____________________ -->
    <section class="slider px-2 border-bottom border-top border-3 border-danger">
        <div class="slider-box">
            <div class="slider-track">
                <div class="slide">
                    <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt temporibus quia repellat sit mol
                    </h2>
                </div>
                <div class="slide">
                    <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt temporibus quia repellat sit mol
                    </h2>
                </div>
                <div class="slide">
                    <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt temporibus quia repellat sit mol
                    </h2>
                </div>
                <div class="slide">
                    <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt temporibus quia repellat sit mol
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!--___________________END OF SLIDER________________________ -->

    <!-- __________________SECOND SECTION___________________ -->
    <section class="section border-bottom border-3 border-danger">
        <div class="col-12 col-md-12 col-sm-12">
            <h2 class="text-uppercase ms-5 mb-4 mt-2 border-bottom border-3 border-danger text-start fw-bold"><i class="fas fa-arrow-circle-right text-danger"></i> LATEST STORIES</h2>
            <div class="row">
                <?php foreach ($latestArticles as $latestArticle): ?>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-2">
                    <div class="card position-relative overflow-hidden">
                        <div class="thumbnail_latest">
                            <img src="<?= $latestArticle->img ?>" alt="" class="w-100 img-fluid">
                        </div>
                        <div class="card-header position-absolute bottom-0 pt-4">
                            <a href="/read/<?= $latestArticle->article_id ?>" class="text-dark">
                                <h2 class="text-shadow h6 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                    <?= $latestArticle->title ?>></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- __________________END OF SECOND SECTION___________________ -->

    <!-- ________________________THIRD SECTION___________________ -->
    <section class="section border-bottom border-top border-3 border-danger">
        <div class="row mb-3">
            <?php if($sportsArticle !== false): ?>
            <div class="col-12 col-md-6 col-sm-12">
                <h2 class="text-uppercase ms-5 mb-4 mt-2 border-bottom border-3 border-danger text-start fw-bold"><i class="fas fa-arrow-circle-right text-danger"></i> Sports</h2>
                <div class="card position-relative overflow-hidden">
                    <div class="thumbnail">
                        <img src="<?= $sportsArticle->img ?>" alt="" class="w-100 img-fluid">
                    </div>
                    <div class="card-header position-absolute bottom-0 pt-4">
                        <a href="/read/<?= $sportsArticle->article_id ?>" class="text-dark">
                            <h2 class="text-shadow h1 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                <?= $sportsArticle->title ?></h2>
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($politicsArticle !== false): ?>
            <div class="col-12 col-md-6 col-sm-12">
                <h2 class="text-uppercase ms-5 mb-4 mt-2 border-bottom border-3 border-danger text-start fw-bold"> <i class="fas fa-arrow-circle-right text-danger"></i> Politics</h2>
                <div class="card position-relative overflow-hidden">
                    <div class="thumbnail">
                        <img src="<?= $politicsArticle->img ?>" alt="" class="w-100 img-fluid">
                    </div>
                    <div class="card-header position-absolute bottom-0 pt-4">
                        <a href="/read/<?= $politicsArticle->article_id ?>" class="text-dark">
                            <h2 class="text-shadow h1 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                <?= $politicsArticle->title ?></h2>
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- ________________________END OF THIRD SECTION___________________ -->

    <!-- ___________________________FOURTH SECTION___________________ -->
    <section class="section">
        <div class="row mb-3">
            <div class="col-12">
                <h2 class="text-uppercase ms-5 mb-4 mt-2 border-bottom border-3 border-danger text-start fw-bold"><i class="fas fa-arrow-circle-right text-danger"></i> Updates</h2>
                <div class="row">
                    <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-2">
                        <div class="card position-relative overflow-hidden">
                            <img src="/assets/img/trending/trending_2.jpg" alt="" class="w-100 img-fluid">
                            <div class="card-header position-absolute bottom-0 pt-4">
                                <a href="#" class="text-dark">
                                    <h2 class="text-shadow h6 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                        Twitter's New Retweet With Comment Counter Is Now Available On Andriod & Web</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-2">
                        <div class="card position-relative overflow-hidden">
                            <img src="/assets/img/trending/trending_2.jpg" alt="" class="w-100 img-fluid">
                            <div class="card-header position-absolute bottom-0 pt-4">
                                <a href="#" class="text-dark">
                                    <h2 class="text-shadow h6 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                        Twitter's New Retweet With Comment Counter Is Now Available On Andriod & Web</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-2">
                        <div class="card position-relative overflow-hidden">
                            <img src="/assets/img/trending/trending_2.jpg" alt="" class="w-100 img-fluid">
                            <div class="card-header position-absolute bottom-0 pt-4">
                                <a href="#" class="text-dark">
                                    <h2 class="text-shadow h6 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                        Twitter's New Retweet With Comment Counter Is Now Available On Andriod & Web</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-2">
                        <div class="card position-relative overflow-hidden">
                            <img src="/assets/img/trending/trending_2.jpg" alt="" class="w-100 img-fluid">
                            <div class="card-header position-absolute bottom-0 pt-4">
                                <a href="#" class="text-dark">
                                    <h2 class="text-shadow h6 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                        Twitter's New Retweet With Comment Counter Is Now Available On Andriod & Web</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-2">
                        <div class="card position-relative overflow-hidden">
                            <img src="/assets/img/trending/trending_2.jpg" alt="" class="w-100 img-fluid">
                            <div class="card-header position-absolute bottom-0 pt-4">
                                <a href="#" class="text-dark">
                                    <h2 class="text-shadow h6 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                        Twitter's New Retweet With Comment Counter Is Now Available On Andriod & Web</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-2">
                        <div class="card position-relative overflow-hidden">
                            <img src="/assets/img/trending/trending_2.jpg" alt="" class="w-100 img-fluid">
                            <div class="card-header position-absolute bottom-0 pt-4">
                                <a href="#" class="text-dark">
                                    <h2 class="text-shadow h6 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                        Twitter's New Retweet With Comment Counter Is Now Available On Andriod & Web</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-2">
                        <div class="card position-relative overflow-hidden">
                            <img src="/assets/img/trending/trending_2.jpg" alt="" class="w-100 img-fluid">
                            <div class="card-header position-absolute bottom-0 pt-4">
                                <a href="#" class="text-dark">
                                    <h2 class="text-shadow h6 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                        Twitter's New Retweet With Comment Counter Is Now Available On Andriod & Web</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-2">
                        <div class="card position-relative overflow-hidden">
                            <img src="/assets/img/trending/trending_1.jpg" alt="" class="w-100 img-fluid">
                            <div class="card-header position-absolute bottom-0 pt-4">
                                <a href="#" class="text-dark">
                                    <h2 class="text-shadow h6 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                        Twitter's New Retweet With Comment Counter Is Now Available On Andriod & Web</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ___________________________END OF FOURTH SECTION___________________ -->
</main>
