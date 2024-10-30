<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Hoverable Table rows -->
        <div class="card">
            <h5 class="card-header">
                Ingredient List
                <a href="" style="float: right;">
                    <button type="button" class="btn btn-primary">
                    <span class="tf-icons bx bx-plus-circle me-2"></span>Create Store
                    </button>
                </a>
            </h5>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date Created</th>
                            <th>Creator</th>
                            <th>Date Last Edited</th>
                            <th>Last Edited by</th>
                            <th style="width: 5%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>SM</td>
                            <td>09/15/2024</td>
                            <td>User 1</td>
                            <td>09/15/2024</td>
                            <td>User 1</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>SM</td>
                            <td>09/15/2024</td>
                            <td>User 1</td>
                            <td>09/15/2024</td>
                            <td>User 1</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>SM</td>
                            <td>09/15/2024</td>
                            <td>User 1</td>
                            <td>09/15/2024</td>
                            <td>User 1</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
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
                    <h5 class="modal-title" id="EditModalLabel">Edit Ingredient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Volume to Weight (1g = ?ml)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="20">
                            <span class="input-group-text">ml</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Calories</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="2000">
                            <span class="input-group-text">kcal</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Fat</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="0">
                            <span class="input-group-text">g</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Sugar</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="0">
                            <span class="input-group-text">g</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Protein</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="0">
                            <span class="input-group-text">g</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Carbs</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="0">
                            <span class="input-group-text">g</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="StoreComment" class="form-label">Comment</label>
                        <textarea class="form-control" id="StoreComment" rows="5"></textarea>
                    </div>

                    <div class="divider mt-12">
                        <div class="divider-text">Prices per Shop</div>
                    </div>

                    <div class="shop-prices">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Landers</label>
                                <div class="input-group">
                                    <span class="input-group-text">Price</span>
                                    <input type="text" class="form-control" placeholder="1000">
                                    <span class="input-group-text">SEK</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">&nbsp;</label>
                                <div class="input-group">
                                    <span class="input-group-text">Volume</span>
                                    <input type="text" class="form-control" placeholder="100">
                                    <span class="input-group-text selected-unit">g</span>
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end unit-selector">
                                        <li><a class="dropdown-item" href="javascript:void(0);">g</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">mg</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Kg</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">ml</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">L</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Whole</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Half</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">pc/pcs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <label class="form-label">SM</label>
                                <div class="input-group">
                                    <span class="input-group-text">Price</span>
                                    <input type="text" class="form-control" placeholder="1000">
                                    <span class="input-group-text">SEK</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">&nbsp;</label>
                                <div class="input-group">
                                    <span class="input-group-text">Volume</span>
                                    <input type="text" class="form-control" placeholder="100">
                                    <span class="input-group-text selected-unit">g</span>
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end unit-selector">
                                        <li><a class="dropdown-item" href="javascript:void(0);">g</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">mg</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Kg</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">ml</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">L</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Whole</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Half</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">pc/pcs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <label class="form-label">Robinsons</label>
                                <div class="input-group">
                                    <span class="input-group-text">Price</span>
                                    <input type="text" class="form-control" placeholder="1000">
                                    <span class="input-group-text">SEK</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">&nbsp;</label>
                                <div class="input-group">
                                    <span class="input-group-text">Volume</span>
                                    <input type="text" class="form-control" placeholder="100">
                                    <span class="input-group-text selected-unit">g</span>
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end unit-selector">
                                        <li><a class="dropdown-item" href="javascript:void(0);">g</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">mg</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Kg</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">ml</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">L</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Whole</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Half</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">pc/pcs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
<?= $this->endSection() ?>
            