<?php

/** @var $this View */

use core\forms\Form;
use core\View;

$this->title = 'Admin RSS FEEDS';

?>


<div class="content my-3 px-2">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h3>Add New Rss Feed Link</h3>
                    <form action="" method="post">
                        <?= Form::csrfField() ?>
                        <?= Form::inputField('', 'name', '', ['class' => 'form-control'], ['class' => 'mb-3'], $errors) ?>
                    </form>
                </div>
                <div class="col-6">
                    <table class="table table-striped table-hover table-sm" id="dataTable">
                        <thead>
                        <tr>
                            <th>Rss Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>https://bbc.com/news</td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>