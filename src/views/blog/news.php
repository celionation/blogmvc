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
        <div class="pagination-links">
            <button class="text-center btn btn-outline-primary w-100 my-3 rounded-pill load-more-btn">Load more</button>
        </div>
        <!-- //Pagination -->
    </div>
</div>

<script>
    const loadMoreBtn = document.querySelector('.load-more-btn')
    const articles = document.querySelector('.articles')
    const paginationLinks = document.querySelector('.pagination-links')

    function displayPosts(posts)
    {
        posts.forEach(post => {
            let postHtmlString = `
                <div class="card">
                            <div class="thumbnail">
                                <img src="${post.img}" alt="" class="w-100">
                            </div>
                            <div class="card-header">
                                <a href="#" class="text-dark">
                                    <h2 class="text-shadow h2 text-capitalize border-bottom border-3 border-danger pb-2">
                                        ${post.title}
                                    </h2>
                                </a>
                                <div class="info border-bottom border-3 border-danger pb-2 d-flex justify-content-around align-items-center">
                                    <a class="text-dark small"><i class="far fa-clock"></i> ${post.created_at}</a> &bull;
                                    <span class="text-dark small"><i class="fas fa-map-marker-alt"></i> ${post.region}</span> &bull;
                                    <a class="text-dark small"><span class="fas fa-tag"></span>
                                        <span class="badge bg-primary py-2">${post.category}</span>
                                    </a>
                                </div>
                                <div class="text-shadow fst-italic">
                                    <p>${post.body}</p>
                                </div>
                                <a href="/read/${post.article_id}" class="btn btn-primary btn-sm">Read More</a>
                            </div>
                        </div>
            `;

            const domParser = new DOMParser()
            const doc = domParser.parseFromString(postHtmlString, 'text/html')
            const postNode = doc.body.firstChild
            articles.appendChild(postNode)
        })
    }

    let nextPage = 2

    loadMoreBtn.addEventListener('click', async function () {
        loadMoreBtn.textContent = 'Loading...'
        const response = await fetch(`/news?page=${nextPage}&ajax=1`)
        const data = await response.json()
        displayPosts(data.news)
        nextPage = data.nextpage
        if(!data.nextpage) {
            paginationLinks.innerHTML = '<div class="text-muted">No more Post</div>'
        } else {
            loadMoreBtn.textContent = 'Load More'
        }
    })
</script>
