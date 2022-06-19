<?php


use core\Config;
use core\Session;


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('/assets/img/favicon.png') ?>">
    <!-- Remix icons -->
    <link rel="stylesheet" href="<?= asset('/assets/css/all.css') ?>">
    <!-- Swiper.js styles -->
    <link rel="stylesheet" href="<?= asset('/assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('/assets/vendor/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('/assets/vendor/datatables/dataTables.bootstrap4.css') ?>">
    <!-- Custom styles -->
    <link rel="stylesheet" href="<?= asset('/assets/css/admin/sb-admin.css') ?>">
    <title>Blog MVC ADMIN DASHBOARD | <?= $this->title ?></title>

    <style>
        ::selection{
            background: #000;
            color: #fff;
        }
        .nav-item a:hover{
            color: #111 !important;
            background-color: #F1F1F1 !important;
        }
        .active{
            color: #111 !important;
            background-color: #F1F1F1 !important;
        }

        .ck-editor__editable_inline {
            min-height: 400px;
        }

        .is-invalid+.ck-editor .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
            border-color: crimson;
        }

        button[type='submit'],
        button {
            cursor: pointer;
        }
    </style>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?= component('admin/Navbar') ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <?= component('admin/Crumbs') ?>
        <?= Session::displaySessionAlerts() ?>
        {{content}}
        <?= component('admin/Footer') ?>
    </div>
</div>

<script type="application/javascript" src="<?= asset('/assets/vendor/jquery/jquery.min.js') ?>"></script>
<script type="application/javascript" src="<?= asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script type="application/javascript" src="<?= asset('/assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<script type="application/javascript" src="<?= asset('/assets/vendor/datatables/jquery.dataTables.js') ?>"></script>
<script type="application/javascript" src="<?= asset('/assets/vendor/datatables/dataTables.bootstrap4.js') ?>"></script>
<script type="application/javascript" src="<?= asset('/assets/js/admin/sb-admin.min.js') ?>"></script>
<script type="application/javascript" src="<?= asset('/assets/js/admin/sb-admin-datatables.min.js') ?>"></script>
<script type="application/javascript" src="<?= asset('/assets/js/all.js') ?>"></script>
</body>
</html>
