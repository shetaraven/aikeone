<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Hoverable Table rows -->
        <div class="card">
            <h5 class="card-header">
                Ingredient List
                <a href="<?=base_url('admin/ingredients/create-form')?>" style="float: right;">
                    <button type="button" class="btn btn-primary">
                        <span class="tf-icons bx bx-plus-circle me-2"></span>Create Store
                    </button>
                </a>
            </h5>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Creator</th>
                            <th>Date Created</th>
                            <th>Last Edited By</th>
                            <th>Date Last Edited</th>
                            <th style="width: 5%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($ingredients_list as $key => $ingred_info) : ?>
                            <tr>
                                <td><?=$ingred_info['NAME']?></td>
                                <td><?=$ingred_info['CREATOR']?></td>
                                <td><?=$ingred_info['CREATED_AT']?></td>
                                <td><?=$ingred_info['UPDATOR']?></td>
                                <td><?=$ingred_info['UPDATED_AT']?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button type="button" class="dropdown-item ita-edit" data-id="<?=$ingred_info['ID']?>"><i class="bx bx-edit-alt me-1 "></i> Edit</button>
                                            <button type="button" class="dropdown-item ita-delete" data-id="<?=$ingred_info['ID']?>"><i class="bx bx-trash me-1"></i> Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center m-10">
                    <li class="page-item first">
                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left bx-sm"></i></a>
                    </li>
                    <li class="page-item prev">
                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left bx-sm"></i></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0);">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0);">2</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="javascript:void(0);">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0);">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0);">5</a>
                    </li>
                    <li class="page-item next">
                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right bx-sm"></i></a>
                    </li>
                    <li class="page-item last">
                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right bx-sm"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
        <!--/ Hoverable Table rows -->

    </div>
    <!-- / Content -->

    <div class="modal fade" id="edit_modal-ingrid" aria-labelledby="IngredientEditLabel" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="IngredientEditLabel">Edit Ingredient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- contents here -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary ema-save">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
<?= $this->endSection() ?>