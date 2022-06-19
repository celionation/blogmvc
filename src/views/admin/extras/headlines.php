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
                <button type="submit" class="btn btn-outline-info w-100">Add</button>
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
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($headlinesList as $headline): ?>
                <tr>
                    <td><?= html_entity_decode($headline->body) ?></td>
                    <td><?= $headline->status ? 'Active' : 'Closed' ?></td>
                    <td>
                        <button class="btn btn-info my-1" onclick="statusHeadline('<?= $headline->id ?>')"><i class="fas fa-ban"></i></button>
                        <button class="btn btn-danger my-1" onclick="deleteHeadline('<?= $headline->id ?>')"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    function deleteHeadline(id) {
        if (window.confirm("Are you sure you want to delete this headline? This cannot be undone!")) {
            window.location.href = `/admin/extras/headlines/delete/${id}`;
        }
    }

    function statusHeadline(id) {
        if (window.confirm("Are you sure you want to change status of this headline?")) {
            window.location.href = `/admin/extras/headlines/status/${id}`;
        }
    }
</script>


