<?php

/** @var $this View */

use core\forms\Form;
use core\View;

$this->title = 'Admin Adverts';

$errors = $this->errors;
$labelsOpt = $this->labelsOpt;
$statusOpt = $this->statusOpt;
$expOpt = $this->expOpt;

?>

<div class="content my-2">
    <div class="card">
        <div class="card-header bg-primary">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="text-white">Create Adverts</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <?= Form::csrfField() ?>
                <?= Form::inputField('Company', 'name', '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                <div class="row g-3 my-1">
                    <div class="col-md-6">
                        <?= Form::fileInput('Ads image', 'ads_img', ['class' => 'form-control'], ['class' => 'mb-1'], $errors) ?>
                        <div class="form-text text-danger">
                            Please Note this Field is Optional.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?= Form::inputField('Ads image Link', 'ads_img_link', '', ['class' => 'form-control'], ['class' => 'mb-1'], $errors) ?>
                        <div class="form-text text-danger">
                            Please Note this Field is Optional.
                        </div>
                    </div>
                </div>
                <div class="row g-3 my-1">
                    <div class="col-md-6">
                        <?= Form::inputField('Ads Link', 'ads_link', '', ['class' => 'form-control'], ['class' => 'mb-1'], $errors) ?>
                    </div>
                    <div class="col-md-6">
                        <?= Form::selectField('Ads Label', 'ads_label', '', $labelsOpt, ['class'=> 'form-control'], ['class' => 'mb-1'], $errors) ?>
                    </div>
                </div>

                <div class="row g-3 my-1">
                    <div class="col-md-6">
                        <?= Form::selectField('Ads Status', 'status', '', $statusOpt, ['class'=> 'form-control'], ['class' => 'mb-1'], $errors) ?>
                    </div>
                    <div class="col-md-6">
                        <?= Form::selectField('Ads Expired', 'expired_in', '', $expOpt, ['class'=> 'form-control'], ['class' => 'mb-1'], $errors) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Create Ads</button>
                    </div>
                    <div class="col">
                        <a href="/admin/extras/adverts" class="btn btn-danger w-100">Cancel</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>