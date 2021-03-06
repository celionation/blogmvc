<?php

global $currentUser;

use core\helpers\Navigation;


?>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/assets/img/logocolor.jpg" alt="NattiFlash" style="width: 65px; width: 65px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarCollapse">
            <ul class="navbar-nav mx-auto mb-2 mb-md-0">
                <?= Navigation::navItem('', 'Home') ?>
                <?= Navigation::navItem('news', 'News') ?>
                <?= Navigation::navItem('contact', 'Contact') ?>
                <?= Navigation::navItem('magazine', 'Magazine') ?>
            </ul>
            <ul class="navbar-nav mx-end mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" id="search-btn"><span class="fas fa-search"></span></a>
                </li>
                <?php if(!$currentUser): ?>
                    <?= Navigation::navItem('login', 'Sign In') ?>
                    <?= Navigation::navItem('register', 'Sign Up') ?>
                <?php endif; ?>

                <?php if($currentUser): ?>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php /** @var mixed $currentUser */ ?>
                            <span class="text-danger">Hi</span> <?= $currentUser->username ?? 'Guests'; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                            <?php if ($currentUser->acl !== 'guests') : ?>
                                <?= Navigation::navItem('admin/dashboard', 'Admin Dashboard', true); ?>
                                <li>
                                    <hr class="dropdown-divider text-danger">
                                </li>
                            <?php endif ?>
                            <?= Navigation::navItem('logout', 'Log Out', true); ?>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<!-- __________________SEARCH BOX___________________ -->
<form action="" method="post" class="search-form">
    <input type="search" id="search-box" placeholder="Search here...">
    <label for="search-box" class="fas fa-search"></label>
</form>
<!-- __________________END OF SEARCH BOX___________________ -->
