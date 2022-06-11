<?php


/** @var $this View */

use core\View;

$this->title = 'Admin NewsLetter Subscribers';

?>

<div class="d-flex justify-content-between align-items-center my-1">
    <h2 class="text-warning">Subscribers</h2>
    <a class="btn btn-primary" href="/admin/newsletter/mail">Messages All</a>
</div>

<table class="table table-striped table-hover table-sm" id="dataTable">
    <thead>
        <tr>
            <th>E-Mail</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($newsletters as $newsletter) : ?>
            <tr>
                <td><?= $newsletter->email ?></td>
                <td>
                    <a href="/admin/mailbox/compose?to=<?= $newsletter->email ?>" class="btn btn-sm mx-1 btn-outline-primary"><i class="fas fa-message"></i></a>
                    <a href="/admin/newsletter/delete_subscriber/<?= $newsletter->newsletter_id ?>" class="btn btn-sm mx-1 btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>