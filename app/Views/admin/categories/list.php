<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <div class="navbar-nav" style="display: inline-block">
                    <div class="nav-item d-flex align-items-center" style="border-bottom: solid 1px #d3d3d3">
                        <i class="bx bx-search bx-md" style="cursor: pointer"></i>
                        <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2 search-input" placeholder="Search..." aria-label="Search..." data-url="/admin/categories/list" />
                    </div>
                </div>

                <a href="<?= base_url('admin/categories/form') ?>" style="float: right;">
                    <button type="button" class="btn btn-primary">
                        <span class="tf-icons bx bx-plus-circle me-2"></span>Create Category
                    </button>
                </a>
            </div>

            <div class="table-responsive text-nowrap gsh-data_table">
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
                        <?= $this->include('admin/categories/partials/_table_data.php', ['category_list' => $category_list]) ?>
                    </tbody>
                </table>
            </div>

            <div class="paginate gsh-data_pager">
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