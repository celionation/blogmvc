<?php


$this->title = 'Welcome Page';

$latestArticles = $this->latestArticles;
$techArticle = $this->techArticle;
$storyArticle = $this->storyArticle;
$sportsArticle = $this->sportsArticle;
$politicsArticle = $this->politicsArticle;
$aroundArticle = $this->aroundArticle;
$globalArticle = $this->globalArticle;

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
    <section class="mb-3 border-bottom border-top border-3 border-danger">
        <div class="news_container">
            <div class="title">
                Breaking News
            </div>

            <ul>
                <?php foreach ($headlines as $headline): ?>
                <li>
                    <?= html_entity_decode($headline->body) ?>
                </li>
<!--                <li>-->
<!--                    Lorem ipsum dolor sit amet-->
<!--                </li>-->
<!--                <li>-->
<!--                    Lorem ipsum dolor sit amet consecrate radicalising elite. Explicable.-->
<!--                </li>-->
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <!--___________________END OF SLIDER________________________ -->

    <!-- __________________SECOND SECTION___________________ -->
    <section class="section border-bottom border-3 border-danger">
        <div class="col-12 col-md-12 col-sm-12">
            <h2 class="text-uppercase ms-5 mb-4 mt-2 border-bottom border-3 border-danger text-start fw-bold"><i class="fas fa-arrow-circle-right text-danger"></i> News</h2>
            <article class="row">
                <?php foreach ($latestArticles as $latestArticle): ?>
                <article class="col-lg-4 col-md-6 col-sm-12 col-12 mb-2">
                    <div class="card position-relative overflow-hidden">
                        <div class="thumbnail_latest">
                            <img src="<?= $latestArticle->img ?>" alt="" class="w-100 img-fluid">
                        </div>
                        <div class="card-header position-absolute bottom-0 pt-4">
                            <a href="/read/<?= $latestArticle->article_id ?>" class="text-dark">
                                <h2 class="text-shadow h6 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                    <?= $latestArticle->title ?></h2>
                            </a>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- __________________END OF SECOND SECTION___________________ -->

    <!-- ________________________THIRD SECTION___________________ -->
    <section class="section border-bottom border-top border-3 border-danger">
        <div class="row mb-3">
            <?php if($techArticle !== false): ?>
            <article class="col-12 col-md-6 col-sm-12">
                <h2 class="text-uppercase ms-5 mb-4 mt-2 border-bottom border-3 border-danger text-start fw-bold"><i class="fas fa-arrow-circle-right text-danger"></i> Tech</h2>
                <div class="card position-relative overflow-hidden">
                    <div class="mini-img">
                        <img src="<?= $techArticle->img ?>" alt="" class="w-100 img-fluid">
                    </div>
                    <div class="card-header position-absolute bottom-0 pt-4">
                        <a href="/read/<?= $techArticle->article_id ?>" class="text-dark">
                            <h2 class="text-shadow h1 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                <?= $techArticle->title ?></h2>
                        </a>
                    </div>
                </div>
            </article>
            <?php endif; ?>

            <?php if($storyArticle !== false): ?>
            <article class="col-12 col-md-6 col-sm-12">
                <h2 class="text-uppercase ms-5 mb-4 mt-2 border-bottom border-3 border-danger text-start fw-bold"> <i class="fas fa-arrow-circle-right text-danger"></i> Story</h2>
                <div class="card position-relative overflow-hidden">
                    <div class="mini-img">
                        <img src="<?= $storyArticle->img ?>" alt="" class="w-100 img-fluid">
                    </div>
                    <div class="card-header position-absolute bottom-0 pt-4">
                        <a href="/read/<?= $storyArticle->article_id ?>" class="text-dark">
                            <h2 class="text-shadow h1 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                <?= $storyArticle->title ?></h2>
                        </a>
                    </div>
                </div>
            </article>
            <?php endif; ?>
        </div>
    </section>
    <!-- ________________________END OF THIRD SECTION___________________ -->

    <!-- ___________________________SPORT SECTION___________________ -->
    <?php if($sportsArticle): ?>
    <section class="section">
        <div class="row mb-3">
            <div class="col-12">
                <h2 class="text-uppercase ms-5 mb-4 mt-2 border-bottom border-3 border-danger text-start fw-bold"><i class="fas fa-arrow-circle-right text-danger"></i> SPORTS</h2>
                <div class="row">
                    <?php foreach ($sportsArticle as $spa): ?>
                        <article class="col-12 col-lg-3 col-md-4 col-sm-6 mb-2">
                            <div class="card position-relative overflow-hidden">
                                <div class="mini-img">
                                    <img src="<?= $spa->img ?>" alt="" class="w-100 img-fluid">
                                </div>
                                <div class="card-header position-absolute bottom-0 pt-4">
                                    <a href="/read/<?= $spa->article_id ?>" class="text-dark">
                                        <h2 class="text-shadow h6 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                            <?= $spa->title ?></h2>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- ___________________________END OF SPORT SECTION___________________ -->

    <!-- ___________________________POLITICS SECTION___________________ -->
    <?php if($politicsArticle): ?>
    <section class="section">
        <div class="row mb-3">
            <div class="col-12">
                <h2 class="text-uppercase ms-5 mb-4 mt-2 border-bottom border-3 border-danger text-start fw-bold"><i class="fas fa-arrow-circle-right text-danger"></i> POLITICS</h2>
                <div class="row">
                    <?php foreach ($politicsArticle as $ppa): ?>
                        <article class="col-12 col-lg-3 col-md-4 col-sm-6 mb-2">
                            <div class="card position-relative overflow-hidden">
                                <div class="mini-img">
                                    <img src="<?= $ppa->img ?>" alt="" class="w-100 img-fluid">
                                </div>
                                <div class="card-header position-absolute bottom-0 pt-4">
                                    <a href="/read/<?= $ppa->article_id ?>" class="text-dark">
                                        <h2 class="text-shadow h6 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                            <?= $ppa->title ?></h2>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- ___________________________END OF POLITICS SECTION___________________ -->

    <!-- ___________________________Around CNB SECTION___________________ -->
    <?php if($aroundArticle): ?>
    <section class="section">
        <div class="row mb-3">
            <div class="col-12">
                <h2 class="text-uppercase ms-5 mb-4 mt-2 border-bottom border-3 border-danger text-start fw-bold"><i class="fas fa-arrow-circle-right text-danger"></i> Around CNB</h2>
                <div class="row">
                    <?php foreach ($aroundArticle as $aa): ?>
                    <article class="col-12 col-lg-3 col-md-4 col-sm-6 mb-2">
                        <div class="card position-relative overflow-hidden">
                            <div class="mini-img">
                                <img src="<?= $aa->img ?>" alt="" class="w-100 img-fluid">
                            </div>
                            <div class="card-header position-absolute bottom-0 pt-4">
                                <a href="/read/<?= $aa->article_id ?>" class="text-dark">
                                    <h2 class="text-shadow h6 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                        <?= $aa->title ?></h2>
                                </a>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- ___________________________END OF Around CNB SECTION___________________ -->

    <!-- ___________________________Global SECTION___________________ -->
    <?php if($globalArticle): ?>
    <section class="section">
        <div class="row mb-3">
            <div class="col-12">
                <h2 class="text-uppercase ms-5 mb-4 mt-2 border-bottom border-3 border-danger text-start fw-bold"><i class="fas fa-arrow-circle-right text-danger"></i> Global</h2>
                <div class="row">
                    <?php foreach ($globalArticle as $glo): ?>
                    <article class="col-12 col-lg-3 col-md-4 col-sm-6 mb-2">
                        <div class="card position-relative overflow-hidden">
                            <div class="mini-img">
                                <img src="<?= $glo->img ?>" alt="" class="w-100 img-fluid">
                            </div>
                            <div class="card-header position-absolute bottom-0 pt-4">
                                <a href="/read/<?= $glo->article_id ?>" class="text-dark">
                                    <h2 class="text-shadow h6 text-capitalize border-bottom border-3 border-danger pb-2 text-white text-start">
                                        <?= $glo->title ?></h2>
                                </a>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- ___________________________END OF Global SECTION___________________ -->
</main>
