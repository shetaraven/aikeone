<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <div class="navbar-nav" style="display: inline-block">
                    <div class="nav-item d-flex align-items-center" style="border-bottom: solid 1px #d3d3d3">
                        <i class="bx bx-search bx-md" style="cursor: pointer"></i>
                        <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search..." />
                    </div>
                </div>

                <a href="<?=base_url('admin/stores/form')?>" style="float: right;">
                    <button type="button" class="btn btn-primary">
                        <span class="tf-icons bx bx-plus-circle me-2"></span>Create Store
                    </button>
                </a>
            </div>

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
                                <td><?= $store_info['CREATOR'] ?></td>
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

            <div class="paginate">
                <?=$pager->links('admin', 'admin')?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_modal-ingrid" aria-labelledby="EditModalLabel" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditModalLabel">Edit Store</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- contents here -->
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