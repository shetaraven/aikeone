<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Hoverable Table rows -->
        <div class="card">
            <h5 class="card-header">
                User List
                <!-- <a href="" style="float: right;">
                    <button type="button" class="btn btn-primary">
                    <span class="tf-icons bx bx-plus-circle me-2"></span>Create Store
                    </button>
                </a> -->
            </h5>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Date Registered</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Status</th>
                            <th style="width: 5%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>09/15/2024</td>
                            <td>Jomar Adalan</td>
                            <td>jomaradalan1416@gmail.com</td>
                            <td>Creator</td>
                            <td><span class="badge bg-label-success">Active</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="bx bx-edit-alt me-1"></i> User Type</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Disable</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>09/15/2024</td>
                            <td>Jomar Adalan</td>
                            <td>jomaradalan1416@gmail.com</td>
                            <td>Creator</td>
                            <td><span class="badge bg-label-danger">Disabled</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="bx bx-edit-alt me-1"></i> User Type</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Enable</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr></tr>
                            <td>09/15/2024</td>
                            <td>Jomar Adalan</td>
                            <td>jomaradalan1416@gmail.com</td>
                            <td>User</td>
                            <td><span class="badge bg-label-danger">Disabled</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="bx bx-edit-alt me-1"></i> User Type</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Enable</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
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

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
