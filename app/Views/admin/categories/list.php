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

                <a href="<?= base_url('admin/categories/form') ?>" style="float: right;">
                    <button type="button" class="btn btn-primary">
                        <span class="tf-icons bx bx-plus-circle me-2"></span>Create Category
                    </button>
                </a>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 25%;">LABEL</th>
                            <th style="width: 25%;">DESCRIPTION</th>
                            <th>CREATED BY</th>
                            <th>CREATED AT</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($category_list as $key => $category) : ?>
                            <tr>
                                <td><?= $category['LABEL'] ?></td>
                                <td><?= $category['DESCRIPTION'] ?></td>
                                <td><?= $category['CREATOR'] ?></td>
                                <td><?= $category['CREATED_AT'] ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item rcta-edit" data-id="<?= $category['ID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                                            <button class="dropdown-item rcta-delete" data-id="<?= $category['ID'] ?>"><i class="bx bx-trash me-1"></i> Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="paginate">
                <?= $pager->links('admin', 'admin') ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_modal-category" aria-labelledby="EditModalLabel" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- contents here -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary rcem-save">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="del_modal-category" aria-labelledby="DelModalLabel" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DelModalLabel">Delete Store</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this store?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary rcta-delete-proceed">
                        Proceed
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="content-backdrop fade"></div>

</div>
<?= $this->endSection() ?>