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
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="bx bx-edit-alt me-1"></i> User Type</a>
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ChooseRecipe"><i class="bx bx-trash me-1"></i> Recipe Access</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Disable</a>
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

    <div class="modal fade" id="EditModal" aria-labelledby="EditModalLabel" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditModalLabel">Edit User Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" disabled>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" disabled>
                    </div>
                    <div class="mt-3">
                        <label for="exampleFormControlSelect1" class="form-label">User Type</label>
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option selected="">Choose</option>
                            <option value="1">Admin</option>
                            <option value="2">Creator</option>
                            <option value="3">User</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">
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
                    <h5 class="modal-title" id="ChooseFeatured">Select Allowed Recipe for this User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-search"></i></span>
                            <input type="text" id="searchRecipe" class="form-control" placeholder="Search..." aria-label="Search..." onkeyup="myFunction()">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="list-group" id="recipe-list">
                            <label class="list-group-item">
                            <input class="form-check-input me-3" type="checkbox" value="">
                            <span>Soufflé pastry pie ice</span>
                            </label>
                            <label class="list-group-item">
                            <input class="form-check-input me-3" type="checkbox" value="">
                            <span>Bear claw cake biscuit</span>
                            </label>
                            <label class="list-group-item">
                            <input class="form-check-input me-3" type="checkbox" value="">
                            <span>Tart tiramisu cake</span>
                            </label>
                            <label class="list-group-item">
                            <input class="form-check-input me-3" type="checkbox" value="">
                            <span>Bonbon toffee muffin</span>
                            </label>
                            <label class="list-group-item">
                            <input class="form-check-input me-3" type="checkbox" value="">
                            <span>Dragée tootsie roll</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">
                        Select
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
<?= $this->endSection() ?>