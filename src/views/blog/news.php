<?php


use core\helpers\StringFormat;
use core\helpers\TimeFormat;

$this->title = 'News Page';

$total = $this->total;


?>

<div class="col-md-8">
    <!-- news -->
    <div class="news-page">
        <div class="news-list">
            <?php if ($total !== 0) : ?>
                <?php foreach ($articles as $article) : ?>
                    <div class="card rounded-4 mt-2 articles">
                        <div class="card">
                            <div class="thumbnail">
                                <img src="<?= $article->img ?>" alt="" class="w-100">
                            </div>
                            <div class="card-header">
                                <a href="#" class="text-dark">
                                    <h2 class="text-shadow h2 text-capitalize border-bottom border-3 border-danger pb-2">
                                        <?= html_entity_decode($article->title) ?>
                                    </h2>
                                </a>
                                <div class="info border-bottom border-3 border-danger pb-2 d-flex justify-content-around align-items-center">
                                    <a class="text-dark small"><i class="far fa-clock"></i> <?= TimeFormat::FBTimeAgo($article->created_at) ?></a> &bull;
                                    <span class="text-dark small"><i class="fas fa-map-marker-alt"></i> <?= $article->region ?></span> &bull;
                                    <a class="text-dark small"><span class="fas fa-tag"></span>
                                        <span class="badge bg-primary py-2"><?= $article->category ?></span>
                                    </a>
                                </div>
                                <div class="text-shadow fst-italic">
                                    <p><?= StringFormat::Excerpt(html_entity_decode($article->body), 350) ?></p>
                                </div>
                                <a href="/read/<?= $article->article_id ?>" class="btn btn-primary btn-sm">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <h2 class="text-center mx-auto mt-5 text-white bg-danger p-3">No Post Available</h2>
            <?php endif; ?>
        </div>
        <!-- End of News -->

        <!-- Pagination -->
        <div class="my-3">
            <nav aria-label="Pagination">
                <ul class="d-flex justify-content-center align-items-center my-3 pagination">
                    <li class="page-item <?= !$prevPage ? 'disabled' : '' ?>" aria-current="page">
                        <a class="page-link" href="/news?page=<?= $prevPage ?>">&laquo;</a>
                    </li>
                    <?php foreach ($pageNumbers as $page): ?>
                        <?php if($page == $currentPage || $page == '...'): ?>
                            <li class="page-item disabled"><a class="page-link" href="#"><?= $page ?></a></li>
                        <?php else: ?>
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="/news?page=<?= $page ?>"><?= $page ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <li class="page-item <?= !$nextPage ? 'disabled' : '' ?>" aria-current="page">
                        <a class="page-link" href="/news?page=<?= $nextPage ?>">&raquo;</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- //Pagination -->
    </div>
</div>