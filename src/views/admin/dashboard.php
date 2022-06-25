<?php


/** @var $this View */

use core\View;

$this->title = 'Admin Dashboard';

?>

<div class="d-flex justify-content-between align-items-center">
    <h2>Dashboard</h2>
    <div>
        <a class="btn btn-sm btn-primary" href="/admin/extras/headlines"><i class="fas fa-bullhorn"></i> Headlines</a>
        <a class="btn btn-sm btn-warning" href="/admin/extras/adverts"><i class="fas fa-rss"></i> Adverts</a>
    </div>
</div>