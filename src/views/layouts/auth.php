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
    <link rel="stylesheet" href="<?= asset('/assets/css/bootstrap.min.css') ?>">
    <!-- Custom styles -->
    <link rel="stylesheet" href="<?= asset('/assets/css/auth.css') ?>?v=<?= Config::get("version") ?>">
    <title>Laraton Blog MVC | <?= $this->title ?></title>
</head>
<body>
<?= Session::displaySessionAlerts() ?>
    {{content}}

<script type="application/javascript" src="<?= asset('/assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
