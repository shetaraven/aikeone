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

                <a href="<?=base_url('admin/categories/form')?>" style="float: right;">
                    <button type="button" class="btn btn-primary">
                        <span class="tf-icons bx bx-plus-circle me-2"></span>Create Category
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
                        <?php foreach ($category_list as $key => $category) : ?>
                            <tr>
                                <td><?= $category['NAME'] ?></td>
                                <td><?= $category['COMMENT'] ?></td>
                                <td>
                                    <span class="badge bg-label-<?= $category['ACTIVE'] ? 'success' : 'primary' ?> me-1"><?= $category['ACTIVE'] ? 'ACTIVE' : 'INACTIVE' ?></span>
                                </td>
                                <td><?= $category['CREATOR'] ?></td>
                                <td><?= $category['CREATED_AT'] ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item sta-edit" data-id="<?=$category['ID']?>"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                                            <button class="dropdown-item sta-delete" data-id="<?=$category['ID']?>"><i class="bx bx-trash me-1"></i> Delete</button>
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

    <div class="content-backdrop fade"></div>

</div>
<?= $this->endSection() ?>