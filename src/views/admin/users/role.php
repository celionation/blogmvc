<?php

use core\View;

/** @var $this View */

$this->title = 'Users Page';

?>


<div class="d-flex align-items-center justify-content-between mb-3">
    <h2>Users Role</h2>
    <div>
        <a href="/admin/users/admin" class="btn btn sm btn-success mx-1">Admin</a>
        <a href="/admin/users/author" class="btn btn sm btn-info mx-1">Author</a>
        <a href="/admin/users/guests" class="btn btn sm btn-warning">Guests</a>
    </div>
</div>

<table class="table table-striped" id="dataTable">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">E-Mail</th>
        <th scope="col">Access Level</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $key => $user) : ?>
        <tr>
            <th scope="row"><?= $key + 1 ?></th>
            <td><?= $user->displayName() ?></td>
            <td><?= $user->email ?></td>
            <td><?= ucwords($user->acl) ?></td>
            <td><?= $user->blocked ? "Blocked" : "Active" ?></td>
            <td class="text-end">
                <a href="/admin/create_user/<?= $user->id ?>" class="btn btn-sm btn-info">Edit</a>
                <a href="/admin/block_user/<?= $user->id ?>" class="btn btn-sm <?= $user->blocked ? "btn-warning" : "btn-secondary" ?>">
                    <?= $user->blocked ? "Unblock" : "Block" ?>
                </a>
                <button class="btn btn-sm btn-danger" onclick="confirmDelete('<?= $user->user_id ?>')">Delete</button>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<script>
    function confirmDelete(userId) {
        if (window.confirm("Are you sure you want to delete the user? This cannot be undone!")) {
            window.location.href = `/admin/delete_user/${userId}`;
        }
    }
</script>