<?php

/** @var $this View */

use core\forms\Form;
use core\View;

$this->title = 'Admin Adverts';

$errors = $this->errors;
$labelsOpt = $this->labelsOpt;
$statusOpt = $this->statusOpt;

?>

<div class="content my-2">
    
    <div class="card">
        <div class="card-header bg-primary">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="text-white">Adverts</h6>
                <a href="/admin/extras/adverts/new" class="btn btn-danger btn-sm"><i class="fas fa-plus-circle"></i> New Adverts</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-sm" id="dataTable">
                <thead>
                <tr>
                    <th>Company</th>
                    <th>Img</th>
                    <th>Label</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Expired At</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CNation</td>
                        <td><img src="/assets/img/bg.jpg" alt="" class="image-fluid" width="100%" height="66"></td>
                        <td>Main</td>
                        <td>Active</td>
                        <td>2022-june-22</td>
                        <td>2022-july-22</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" title="Edit Ads"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Delete Ads"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>