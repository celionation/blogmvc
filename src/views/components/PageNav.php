<?php

global $currentLink;

use core\helpers\Navigation; ?>

<div class="sub-menu mt-5 p-3 bg-info">
    <h1 class="text-uppercase text-white border-bottom border-dark border-1 pb-2 mb-3">News</h1>
    <div class="sub-menu-item px-2">
        <?= Navigation::subLink('news', 'News') ?>
        <?= Navigation::subLink('news/global', 'Global') ?>
        <?= Navigation::subLink('news/sports', 'Sports') ?>
        <?= Navigation::subLink('news/politics', 'Politics') ?>
        <?= Navigation::subLink('news/world', 'World') ?>
        <?= Navigation::subLink('news/music', 'Music') ?>
    </div>
</div>
