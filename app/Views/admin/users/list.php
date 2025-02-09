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
                        <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search..." />
                    </div>
                </div>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Status</th>
                            <th>Date Registered</th>
                            <th style="width: 5%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($user_list as $key => $user_info): ?>
                            <tr>
                                <td><?= $user_info['GIVEN_NAME'] . ' ' . $user_info['FAMILY_NAME'] ?></td>
                                <td><?= $user_info['EMAIL'] ?></td>
                                <td><?= $user_info['USER_TYPE_LABEL'] ?></td>
                                <td>
                                    <span class="badge bg-label-<?= $user_info['ACTIVE'] ? 'success' : 'primary' ?> me-1"><?= $user_info['ACTIVE'] ? 'ACTIVE' : 'INACTIVE' ?></span>
                                </td>
                                <td><?= $user_info['CREATED_AT'] ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item uta-recommend_recipe" href="javascript:void(0);" data-id="<?= $user_info['ID'] ?>"><i class="bx bx-edit-alt me-1"></i> Recommend Recipe</a>
                                            <a class="dropdown-item uta-edit" href="javascript:void(0);" data-id="<?= $user_info['ID'] ?>"><i class="bx bx-edit-alt me-1"></i> User Type</a>
                                            <a class="dropdown-item uta-show_modal" href="javascript:void(0);" data-id="<?= $user_info['ID'] ?>"><i class="bx bx-hide me-1"></i> Recipe Access</a>
                                            <a class="dropdown-item uta-delete" href="javascript:void(0);" data-id="<?= $user_info['ID'] ?>" data-type="<?=$user_info['ACTIVE']?>"><i class='bx bxs-<?= $user_info['ACTIVE'] ? 'minus' : 'plus' ?>-circle' ></i> <?= $user_info['ACTIVE'] ? 'Deactivate' : 'Activate' ?></a>
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
    <!-- / Content -->

    <div class="modal fade" id="EditModal" aria-labelledby="EditModalLabel" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditModalLabel">Edit User Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- contents here -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary uta-update">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ChooseRecipe" aria-labelledby="ChooseFeatured" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ChooseFeatured">Select User Featured Recipe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- contents here -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-dismiss="modal">
                        Done
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
<?= $this->endSection() ?>