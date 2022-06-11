<?php


/** @var $this View */

use core\View;

$this->title = 'Admin contact Messages';

?>

<div class="d-flex justify-content-between align-items-center">
    <h2 class="text-primary">Contact Messages</h2>
</div>

<div class="card">
    <div class="card-body pb-2">
        <h6 class="text-danger mx-3">
            Please note that all messages must be attended to before deleting... Thanks.
        </h6>
    </div>
</div>
<!-- ===== // Card ======= -->

<hr class="my-3">

<div class="contactMsg">
    <?php foreach ($contactMsgs as $contactMsg) : ?>
        <div class="alert alert-success" role="alert">
            <h5 class="alert-heading"><span class="text-danger">#</span> <?= $contactMsg->fullname ?></h5>
            <hr>
            <h6 class="text-warning">Subject: <span class="text-success"><?= $contactMsg->subject ?></span></h6>
            <hr>
            <p><?= $contactMsg->message ?></p>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0"><?= $contactMsg->email ?></p>
                <div>
                    <a href="/admin/delete_contact_msg/<?= $contactMsg->contact_id ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>