<?php

global $currentUser;

use core\helpers\Navigation;


?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
<!--    <a class="navbar-brand" href="#">CN<span class="text-danger">Blog</span></a>-->
    <a class="navbar-brand" href="#"><img src="/assets/img/logocolor.jpg" alt="NattiFlash" style="width: 65px; width: 65px;"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <?= Navigation::navItemIcon('admin/dashboard', 'Dashboard', 'fa fa-fw fa-dashboard') ?>
            <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Articles">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#article" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-newspaper"></i>
                    <span class="nav-link-text">Articles</span>
                </a>
                <ul class="sidenav-second-level collapse" id="article">
                    <?= Navigation::navItem('admin/articles', 'Articles', true) ?>
                    <?= Navigation::navItem('admin/article/new', 'New Article', true) ?>
                </ul>
            </li>
            <?= Navigation::navItemIcon('admin/comments', 'Comments', 'fa fa-fw fa-comments') ?>
            <?php if ($currentUser->hasPermission('admin')) : ?>
                <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Users">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#users" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-users"></i>
                        <span class="nav-link-text">Users</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="users">
                        <?= Navigation::navItem('admin/users', 'Users', true) ?>
                        <?= Navigation::navItem('admin/create_user/new', 'New User', true) ?>
                    </ul>
                </li>
                <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Category & Region">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#category" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-tags"></i>
                        <span class="nav-link-text">Categories & Region</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="category">
                        <?= Navigation::navItem('admin/categories/new', 'Categories', true) ?>
                        <?= Navigation::navItem('admin/regions/new', 'Regions', true) ?>
                    </ul>
                </li>

                <?= Navigation::navItemIcon('admin/contact_messages', 'Contact Message', 'fa fa-fw fa-envelope') ?>

                <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="NewsLetters">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#newsletter" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-mail-bulk"></i>
                        <span class="nav-link-text">NewsLetters</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="newsletter">
                        <?= Navigation::navItem('admin/newsletter/mail', 'Send Emails to Subscribers', true) ?>
                        <?= Navigation::navItem('admin/newsletter/subscribers', 'Subscribers', true) ?>
                    </ul>
                </li>
            <?php endif; ?>
            <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Mailbox">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#mailbox" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-envelope-open-text"></i>
                    <span class="nav-link-text">Mailbox</span>
                </a>
                <ul class="sidenav-second-level collapse" id="mailbox">
                    <?= Navigation::navItem('admin/mailbox/inbox', 'Inbox', true) ?>
                    <?= Navigation::navItem('admin/mailbox/compose', 'Compose', true) ?>
                    <?= Navigation::navItem('admin/mailbox/read', 'Read', true) ?>
                </ul>
            </li>

            <?= Navigation::navItemIcon('admin/settings/new', 'Settings', 'fa fa-fw fa-cog') ?>
        </ul>
        <!-- End of Side Bar -->

        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link mr-lg-2" href="/" data-target="dropdown">
                    <i class="fa fa-fw fa-globe"></i>
                    <span class="d-lg-none">Visit Site</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-envelope"></i>
                    <span class="d-lg-none">Messages
                        <span class="badge badge-pill badge-primary">12 New</span>
                    </span>
                    <span class="indicator text-primary d-none d-lg-block">
                        <i class="fa fa-fw fa-circle"></i>
                    </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">New Messages:</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>David Miller</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>Jane Smith</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>John Doe</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">View all messages</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="d-lg-none">Alerts
                        <span class="badge badge-pill badge-warning">6 New</span>
                    </span>
                    <span class="indicator text-warning d-none d-lg-block">
                        <i class="fa fa-fw fa-circle"></i>
                    </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">New Alerts:</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <span class="text-success">
                            <strong>
                                <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                        </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <span class="text-danger">
                            <strong>
                                <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
                        </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <span class="text-success">
                            <strong>
                                <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                        </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">View all alerts</a>
                </div>
            </li>
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
