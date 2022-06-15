<?php


/** @var $this core\View */

use core\forms\Form;

$this->title = 'Admin Fields Settings';

?>

<div class="content my-3 px-2">
    <div class="row">
        <?= component('admin/settingsNav') ?>
        <div class="col-9">
            <div class="card p-3 bg-light">
                <div class="mb-3">
                    <h3>Add Settings Fields</h3>
                    <small class="text-muted">All the Fields about website settings that is used in the application</small>
                </div>
                <div class="card-body bg-white">
                    <form action="" method="post">
                        <?= Form::csrfField() ?>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-6 mt-3">
                                    <h5 class="m-0">Field Name</h5>
                                    <small>Specify the Field Name</small>
                                </div>
                                <div class="col-6">
                                    <?= Form::inputField('', 'name', '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-sm w-100">Add Field</button>
                    </form>

                    <hr class="my-3">

                    <table class="table table-striped table-hover table-sm" id="dataTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th class="text-end">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($settings as $s): ?>
                            <tr>
                                <td><?= $s->name ?></td>
                                <td><a href="/admin/settings/fields/<?= $s->id ?>" class="btn btn-sm btn-danger float-right"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>