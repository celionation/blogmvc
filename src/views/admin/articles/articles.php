<?php

use core\helpers\StringFormat;
use core\helpers\TimeFormat;
use core\View;

/** @var $this View */

$this->title = 'Articles Page';

/** @var $total View */
$this->total = $total;

?>

<div class="d-flex justify-content-between align-items-center">
    <h2>Your Articles</h2>
    <a class="btn btn-primary" href="/admin/article/new">New Article</a>
</div>

<div class="poster">
    <table class="table table-striped table-hover table-sm" id="dataTable">
        <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Create Date</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $article) : ?>
            <tr>

                <td><img src="<?= asset("/$article->img") ?>" class="image-fluid" width="60" height="60"> &nbsp;<?= StringFormat::Excerpt($article->title, 50) ?></td>
                <td><?= $article->fname . ' ' . $article->lname ?></td>
                <td><?= $article->category ?></td>
                <td><?= TimeFormat::TimeInAgo($article->created_at) ?></td>
                <td><?= $article->status ?></td>
                <td class="text-end">
                    <a href="/admin/article/<?= $article->id ?>" class="btn btn-sm btn-info">Edit</a>
                    <button class="btn btn-sm btn-danger" onclick="deleteArticle('<?= $article->id ?>')">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>

<script>
    function deleteArticle(id) {
        if (window.confirm("Are you sure you want to delete this article? This cannot be undone!")) {
            window.location.href = `/admin/delete_article/${id}`;
        }
    }
</script>