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
                        <?= Form::hiddenField('setting_id', $setting->setting_id ?? '') ?>
                        <?= Form::csrfField() ?>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-6 mt-3">
                                    <h5 class="m-0">Site Name</h5>
                                    <small>Specify the name of your website</small>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'value_one', $setting->value_one ?? '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 mt-3">
                                    <h5 class="m-0 text-shadow">Site Copyright</h5>
                                    <small>copyright information of your website</small>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'value_two', $setting->value_two ?? '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mt-4 text-shadow">Site Logo</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::fileInput('', 'value_three', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mt-4 text-shadow">Managing Director</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'value_four', $setting->value_four ?? '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
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