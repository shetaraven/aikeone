<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="card-header">

                <div class="navbar-nav" style="display: inline-block">
                    <div class="nav-item d-flex align-items-center" style="border-bottom: solid 1px #d3d3d3">
                        <i class="bx bx-search bx-md" style="cursor: pointer"></i>
                        <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2 search-input" placeholder="Search..." aria-label="Search..." data-url="/admin/ingredients/list" />
                    </div>
                </div>

                <a href="<?= base_url('admin/ingredients/form') ?>" style="float: right;">
                    <button type="button" class="btn btn-primary">
                        <span class="tf-icons bx bx-plus-circle me-2"></span>Create Ingredient
                    </button>
                </a>
            </div>

            <div class="table-responsive text-nowrap gsh-data_table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 25%;">Name</th>
                            <th>Creator</th>
                            <th>Date Created</th>
                            <th>Last Edited By</th>
                            <th>Date Last Edited</th>
                            <th style="width: 5%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?= $this->include('admin/ingredients/partials/_table_data.php', ['ingredients_list' => $ingredients_list]) ?>
                    </tbody>
                </table>
            </div>

            <div class="paginate gsh-data_pager">
                <?= $pager->links('admin', 'admin') ?>
            </div>
        </div>
        <!--/ Hoverable Table rows -->

    </div>
    <!-- / Content -->

    <div class="modal fade" id="edit_modal-ingred" aria-labelledby="IngredientEditLabel" tabindex="-1" style="display: none;" aria-hidden="true">
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

    <div class="modal fade" id="del_modal-ingred" aria-labelledby="DelModalLabel" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DelModalLabel">Delete Ingredient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Ingredient?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary ita-delete-proceed">
                        Proceed
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
<?= $this->endSection() ?>