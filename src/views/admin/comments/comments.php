<?php

use core\helpers\StringFormat;
use core\helpers\TimeFormat;
use core\View;

/** @var $this View */

$this->title = 'Comments Page';

/** @var $total View */
// $this->total = $total;

?>

<div class="d-flex justify-content-between align-items-center">
    <h2>Comments</h2>
    <a class="btn btn-primary" href="/admin/article/new">All Comments</a>
</div>

<div class="poster">
    <table class="table table-striped table-hover table-sm" id="dataTable">
        <thead>
        <tr>
            <th>Date</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Article Title</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($comments as $comment) : ?>
            <tr>
                <td><?= TimeFormat::FBTimeAgo($comment->created_at) ?></td>
                <td><?= $comment->name ?></td>
                <td><?= StringFormat::Excerpt($comment->comment, 64) ?></td>
                <td><?= StringFormat::Excerpt($comment->title, 30) ?></td>
                <td>
                    <button class="btn btn-sm btn-outline-danger" title="Delete" data-bs-toggle="tooltip" onclick="deleteComment('<?= $comment->comment_id ?>')"><i class="fas fa-trash-alt"></i></button>

                    <button class="btn btn-sm btn-outline-primary" title="Preview" data-bs-toggle="tooltip" onclick="viewComment('<?= $comment->comment_id ?>')"><i class="fas fa-eye"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>

<script>
    function deleteComment(id) {
        if (window.confirm("Are you sure you want to delete Comment? This cannot be undone!")) {
            window.location.href = `/admin/comment_delete/${id}`;
        }
    }

    function viewComment(id) {
        window.location.href = `/admin/comment_view/${id}`;
    }
</script>