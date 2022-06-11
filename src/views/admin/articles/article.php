<?php

/** @var $this View */

use core\forms\Form;
use core\View;

$this->title = 'Article Page';

?>

<h2><?= $heading ?></h2>

<div class="poster mb-2">
    <form action="" method="post" enctype="multipart/form-data" >
        <?= Form::csrfField() ?>
        <div class="row">
            <?= Form::inputField('Title', 'title', $article->title, ['class' => 'form-control'], ['class' => 'mb-3 col-md-12'], $errors); ?>
            <?= Form::selectField('Status', 'status', $article->status, $statusOptions, ['class' => 'form-control'], ['class' => 'mb-3 col-md-4'], $errors); ?>
            <?= Form::selectField('Category', 'category_id', $article->category_id, $categoryOptions, ['class' => 'form-control'], ['class' => 'mb-3 col-md-4'], $errors); ?>
            <?= Form::selectField('Region', 'region_id', $article->region_id, $regionOptions, ['class' => 'form-control'], ['class' => 'mb-3 col-md-4'], $errors); ?>
            <?= Form::textareaField('Article Body', 'body', $article->body, ['class' => 'form-control', 'rows' => "15"], ['class' => 'mb-3 col-md-12'], $errors); ?>
            <?= Form::fileInput('Featured Image', 'img', ['class' => 'form-control'], ['class' => 'mb-3 col-12'], $errors); ?>
        </div>

        <?php if ($hasImage) : ?>
            <div class="d-flex align-items-center">
                <h5 class="me-2 mx-3">Current Image</h5>
                <img src="<?= '/' . $article->img ?>" style="height:75px;width:75px;object-fit:cover;" />
            </div>
        <?php endif; ?>

        <div class="text-end">
            <a href="/admin/articles" class="btn btn-secondary">Cancel</a>
            <input class="btn btn-primary" value="Save" type="submit" />
        </div>
    </form>
</div>