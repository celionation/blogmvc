<?php


/** @var $this View */

use core\forms\Form;
use core\View;

$this->title = 'Admin Settings';

?>

<div class="content my-3 px-2">
    <div class="row">
        <?= component('admin/settingsNav') ?>
        <div class="col-9">
            <div class="card p-3 bg-light">
                <div class="mb-3">
                    <h3>Social Settings</h3>
                    <small class="text-muted">All the information about website that is used in the application</small>
                </div>
                <div class="card-body bg-white">
                    <h4>Social media profile link</h4>
                    <form action="" method="post">
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mt-4 text-shadow">Facebook URL</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'facebookUrl', '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mt-4 text-shadow">Twitter URL</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'twitterUrl', '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mt-4 text-shadow">Instagram URL</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'instagramUrl', '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>
                            <hr class="my-3">
                            <h4 class="text-capitalize text-danger">SMS / Whatsapp Settings</h4>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mt-4 text-shadow">Phone SMS</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'phone', '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mt-4 text-shadow">Whatsapp</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'whatsapp', '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-warning w-100">Update Email Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>