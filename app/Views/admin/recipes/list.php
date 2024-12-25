<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <div class="navbar-nav" style="display: inline-block">
                    <div class="nav-item d-flex align-items-center" style="border-bottom: solid 1px #d3d3d3">
                        <i class="bx bx-search bx-md" style="cursor: pointer"></i>
                        <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2 search-input" placeholder="Search..." aria-label="Search..." data-url="/admin/recipes/list" />
                    </div>
                </div>

                <a href="<?= base_url('admin/recipes/form') ?>" style="float: right;">
                    <button type="button" class="btn btn-primary">
                        <span class="tf-icons bx bx-plus-circle me-2"></span>Create Recipe
                    </button>
                </a>
            </div>

            <div class="table-responsive text-nowrap gsh-data_table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 25%;">TITLE</th>
                            <th style="width: 25%;">DETAILS</th>
                            <th>VISIBILITY</th>
                            <th>CREATED BY</th>
                            <th>CREATED AT</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?= $this->include('admin/recipes/partials/_table_data.php', ['recipe_list' => $recipe_list]) ?>
                    </tbody>
                </table>
            </div>

            <div class="paginate gsh-data_pager">
                <?= $pager->links('admin', 'admin') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>