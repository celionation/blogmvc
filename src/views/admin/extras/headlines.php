<?php

/** @var $this View */

use core\forms\Form;
use core\View;

$this->title = 'Admin Headlines';

?>

<script src="<?= asset('/assets/vendor/ckeditor5/ckeditor.js') ?>"></script>
<script>
    window.addEventListener('load', function() {
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
    });
</script>

<div class="content my-3 px-2">
    <div class="card">
        <div class="card-body">
            <h3>Add New Headlines</h3>
            <form action="" method="post">
                <?= Form::csrfField() ?>
                <?= Form::textareaField('', 'body', '', ['class' => 'form-control', 'rows' => "8"], ['class' => 'mb-3'], $errors) ?>
            </form>
        </div>
    </div>
    <hr class="my-3">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover table-sm" id="dataTable">
                <thead>
                <tr>
                    <th>#Headlines</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Cheesecake candy canes danish gummies cheesecake ice cream. Tootsie roll icing caramels jelly beans shortbread cake gingerbread tiramisu.</td>
                    <td>
                        <a href="#" class="btn btn-info"><i class="fas fa-ban"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


