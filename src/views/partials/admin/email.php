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
                    <h3>E-Mail Settings</h3>
                    <small class="text-muted">All the information about website that is used in the application</small>
                </div>
                <div class="card-body bg-white">
                    <form action="" method="post">
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-6 mt-3">
                                    <h5 class="m-0">E-Mail DSN</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'email_dsn', '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 mt-3">
                                    <h5 class="m-0 text-shadow">E-Mail Host</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'email_host', '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 mt-3">
                                    <h5 class="m-0">E-Mail Port</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'email_port', '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 mt-3">
                                    <h5 class="m-0 text-shadow">E-Mail User</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'email_user', '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 mt-3">
                                    <h5 class="m-0 text-shadow">E-Mail Password</h5>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'email_pass', '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary w-100">Update Email Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>