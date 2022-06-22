<?php

use core\View;

/** @var $this View */

$this->title = 'Users Page';

?>


<div class="d-flex align-items-center justify-content-between mb-3">
    <h2>Users</h2>
    <div>
        <a href="/admin/users/guests" class="btn btn sm btn-warning mx-1">Access Level</a>
        <a href="/admin/create_user/new" class="btn btn sm btn-primary">New User</a>
    </div>
</div>
