<?php


/** @var $this core\View */

use core\forms\Form;

$this->title = 'Admin Settings';

?>

<div class="content my-3 px-2">
    <div class="row">
        <?= component('admin/settingsNav') ?>
        <div class="col-9">
            <div class="card p-3 bg-light">
                <div class="mb-3">
                    <h3>Site Information</h3>
                    <small class="text-muted">All the information about website that is used in the application</small>
                </div>
                <div class="card-body bg-white">
                    <h4>Website Information</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        <?= Form::csrfField() ?>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-6 mt-3">
                                    <h5 class="m-0">Site Name</h5>
                                    <small>Specify the name of your website</small>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'sitename', $setting->sitename ?? '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 mt-3">
                                    <h5 class="m-0 text-shadow">Site Copyright</h5>
                                    <small>copyright information of your website</small>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'copyright', $setting->copyright ?? '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mt-4 text-shadow">Managing Director</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'manager', $setting->manager ?? '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mt-4 text-shadow">Description</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'description', $setting->description ?? '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mt-4 text-shadow">Keywords</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'keywords', $setting->keywords ?? '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mt-4 text-shadow">Site Logo</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::fileInput('', 'logo', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mt-4 text-shadow">Mission and Aim</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::textareaField('', 'mission_aim', $setting->mission_aim ?? '', ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Type Here ...'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mt-4 text-shadow">About The Founder</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::textareaField('', 'about_founder', $setting->about_founder ?? '', ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Type Here ...'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger btn-sm w-100">Update Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>