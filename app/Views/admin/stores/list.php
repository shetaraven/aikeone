<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">
                Store List
                <a href="<?=base_url('admin/stores/create-form')?>" style="float: right;">
                    <button type="button" class="btn btn-primary">
                        <span class="tf-icons bx bx-plus-circle me-2"></span>Create Store
                    </button>
                </a>
            </h5>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>COMMENT</th>
                            <th>STATUS</th>
                            <th>CREATED BY</th>
                            <th>CREATED AT</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($store_list as $key => $store_info) : ?>
                            <tr>
                                <td><?= $store_info['NAME'] ?></td>
                                <td><?= $store_info['COMMENT'] ?></td>
                                <td>
                                    <span class="badge bg-label-<?= $store_info['ACTIVE'] ? 'success' : 'primary' ?> me-1"><?= $store_info['ACTIVE'] ? 'ACTIVE' : 'INACTIVE' ?></span>
                                </td>
                                <td><?= $store_info['USERNAME'] ?></td>
                                <td><?= $store_info['CREATED_AT'] ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button type="button" class="dropdown-item sta-edit" data-id="<?=$store_info['ID']?>"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                                            <a class="dropdown-item sta-delete" data-id="<?=$store_info['ID']?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="modal fade" id="store_edit_modal" aria-labelledby="EditModalLabel" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditModalLabel">Edit Store</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="store-name" class="form-label">Store Name</label>
                        <input type="text" class="form-control" id="store-name">
                    </div>
                    <div>
                        <label for="store-comment" class="form-label">Comment</label>
                        <textarea class="form-control" id="store-comment" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary sem-save">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="content-backdrop fade"></div>
</div>
<?= $this->endSection() ?>