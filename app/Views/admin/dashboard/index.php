<?= $this->extend('layouts/admin/main') ?>
    <?= $this->section('content') ?>
        <div id="admin-page" class="ap-main">
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-xxl-8 mb-6 order-0">
                            <div class="card">
                                <div class="d-flex align-items-start row">
                                    <div class="col-sm-7">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary mb-3">Welcome John!</h5>
                                            <p class="mb-6">
                                                Here you’ll find all the tools <br>and information you need to get started.
                                            </p>

                                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">Create New Recipe</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 text-center text-sm-left">
                                        <div class="card-body pb-0 px-0 px-md-6">
                                            <img src="<?= base_url('assets/admin/img/illustrations/man-with-laptop.png') ?>" height="175" class="scaleX-n1-rtl" alt="View Badge User" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 order-1">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-6 mb-6">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                                <div class="avatar flex-shrink-0">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/4201/4201018.png" alt="chart success" class="rounded" style="width: 40px;
                                                    height: 40px;
                                                    background: #7dba7d;" />
                                                </div>
                                            </div>
                                            <p class="mb-1">Recipes Created</p>
                                            <h4 class="card-title mb-3">0</h4>
                                            <!-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-6 mb-6">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                                <div class="avatar flex-shrink-0">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/869/869636.png" alt="paypal" class="rounded" style="width: 40px;
                                                    height: 40px;
                                                    background: #e9a8a8;
                                                    padding: 5px;" />
                                                </div>
                                            </div>
                                            <p class="mb-1">Stores Created</p>
                                            <h4 class="card-title mb-3">0</h4>
                                            <!-- <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i> -14.82%</small> -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Total Revenue -->
                        <div class="col-12 col-xxl-8 order-2 order-md-3 order-xxl-2 mb-6">
                            <div class="card">
                                <div class="row row-bordered g-0">
                                    <div class="col-lg-12">
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <div class="card-title mb-0">
                                                <h5 class="m-0 me-2">Top 10 Visited Recipes</h5>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="p-0 m-0" style="list-style: none;">
                                                        <li>
                                                            <a href="#" class="d-flex align-items-center mb-6">
                                                                <div class="avatar flex-shrink-0 me-3">
                                                                    <img src="/assets/main/images/recipes/recipe-img1.jpg" style="width: 40px;height: 40px;object-fit: cover;" alt="User" class="rounded" />
                                                                </div>
                                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                    <div class="me-2" style="width: 75%;">
                                                                        <small class="d-block">Top 1</small>
                                                                        <h6 class="fw-normal mb-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Send money</h6>
                                                                    </div>
                                                                    <div class="user-progress">
                                                                        <h6 class="mb-0">82.5k</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex align-items-center mb-6">
                                                                <div class="avatar flex-shrink-0 me-3">
                                                                    <img src="/assets/main/images/recipes/recipe-img1.jpg" style="width: 40px;height: 40px;object-fit: cover;" alt="User" class="rounded" />
                                                                </div>
                                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                    <div class="me-2" style="width: 75%;">
                                                                        <small class="d-block">Top 2</small>
                                                                        <h6 class="fw-normal mb-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Send money</h6>
                                                                    </div>
                                                                    <div class="user-progress">
                                                                        <h6 class="mb-0">82.5k</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex align-items-center mb-6">
                                                                <div class="avatar flex-shrink-0 me-3">
                                                                    <img src="/assets/main/images/recipes/recipe-img1.jpg" style="width: 40px;height: 40px;object-fit: cover;" alt="User" class="rounded" />
                                                                </div>
                                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                    <div class="me-2" style="width: 75%;">
                                                                        <small class="d-block">Top 3</small>
                                                                        <h6 class="fw-normal mb-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Send money</h6>
                                                                    </div>
                                                                    <div class="user-progress">
                                                                        <h6 class="mb-0">82.5k</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex align-items-center mb-6">
                                                                <div class="avatar flex-shrink-0 me-3">
                                                                    <img src="/assets/main/images/recipes/recipe-img1.jpg" style="width: 40px;height: 40px;object-fit: cover;" alt="User" class="rounded" />
                                                                </div>
                                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                    <div class="me-2" style="width: 75%;">
                                                                        <small class="d-block">Top 4</small>
                                                                        <h6 class="fw-normal mb-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Send money</h6>
                                                                    </div>
                                                                    <div class="user-progress">
                                                                        <h6 class="mb-0">82.5k</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex align-items-center mb-6">
                                                                <div class="avatar flex-shrink-0 me-3">
                                                                    <img src="/assets/main/images/recipes/recipe-img1.jpg" style="width: 40px;height: 40px;object-fit: cover;" alt="User" class="rounded" />
                                                                </div>
                                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                    <div class="me-2" style="width: 75%;">
                                                                        <small class="d-block">Top 5</small>
                                                                        <h6 class="fw-normal mb-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Send money</h6>
                                                                    </div>
                                                                    <div class="user-progress">
                                                                        <h6 class="mb-0">82.5k</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="p-0 m-0" style="list-style: none;">
                                                        <li>
                                                            <a href="#" class="d-flex align-items-center mb-6">
                                                                <div class="avatar flex-shrink-0 me-3">
                                                                    <img src="/assets/main/images/recipes/recipe-img1.jpg" style="width: 40px;height: 40px;object-fit: cover;" alt="User" class="rounded" />
                                                                </div>
                                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                    <div class="me-2" style="width: 75%;">
                                                                        <small class="d-block">Top 6</small>
                                                                        <h6 class="fw-normal mb-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Send money</h6>
                                                                    </div>
                                                                    <div class="user-progress">
                                                                        <h6 class="mb-0">82.5k</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex align-items-center mb-6">
                                                                <div class="avatar flex-shrink-0 me-3">
                                                                    <img src="/assets/main/images/recipes/recipe-img1.jpg" style="width: 40px;height: 40px;object-fit: cover;" alt="User" class="rounded" />
                                                                </div>
                                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                    <div class="me-2" style="width: 75%;">
                                                                        <small class="d-block">Top 7</small>
                                                                        <h6 class="fw-normal mb-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Send money</h6>
                                                                    </div>
                                                                    <div class="user-progress">
                                                                        <h6 class="mb-0">82.5k</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex align-items-center mb-6">
                                                                <div class="avatar flex-shrink-0 me-3">
                                                                    <img src="/assets/main/images/recipes/recipe-img1.jpg" style="width: 40px;height: 40px;object-fit: cover;" alt="User" class="rounded" />
                                                                </div>
                                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                    <div class="me-2" style="width: 75%;">
                                                                        <small class="d-block">Top 8</small>
                                                                        <h6 class="fw-normal mb-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Send money</h6>
                                                                    </div>
                                                                    <div class="user-progress">
                                                                        <h6 class="mb-0">82.5k</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex align-items-center mb-6">
                                                                <div class="avatar flex-shrink-0 me-3">
                                                                    <img src="/assets/main/images/recipes/recipe-img1.jpg" style="width: 40px;height: 40px;object-fit: cover;" alt="User" class="rounded" />
                                                                </div>
                                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                    <div class="me-2" style="width: 75%;">
                                                                        <small class="d-block">Top 9</small>
                                                                        <h6 class="fw-normal mb-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Send money</h6>
                                                                    </div>
                                                                    <div class="user-progress">
                                                                        <h6 class="mb-0">82.5k</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex align-items-center mb-6">
                                                                <div class="avatar flex-shrink-0 me-3">
                                                                    <img src="/assets/main/images/recipes/recipe-img1.jpg" style="width: 40px;height: 40px;object-fit: cover;" alt="User" class="rounded" />
                                                                </div>
                                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                    <div class="me-2" style="width: 75%;">
                                                                        <small class="d-block">Top 10</small>
                                                                        <h6 class="fw-normal mb-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Send money</h6>
                                                                    </div>
                                                                    <div class="user-progress">
                                                                        <h6 class="mb-0">82.5k</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Total Revenue -->
                        <div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2">
                            <div class="row">
                                <div class="col-6 mb-6">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                                <div class="avatar flex-shrink-0">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/601/601939.png" alt="wallet info" class="rounded" style="width: 40px;
                                                    height: 40px;
                                                    background: #71c9ec;
                                                    padding: 5px;" />
                                                </div>
                                            </div>
                                            <p class="mb-1">Ingredients Created</p>
                                            <h4 class="card-title mb-3">0</h4>
                                            <!-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-6">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                                <div class="avatar flex-shrink-0">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/18509/18509415.png" alt="Credit Card" class="rounded" style="width: 40px;
                                                    height: 40px;
                                                    background: #aa92d7;" />
                                                </div>
                                            </div>
                                            <p class="mb-1">Users Registered</p>
                                            <h4 class="card-title mb-3">0</h4>
                                            <!-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-6">
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <h5 class="card-title m-0 me-2">Featured Recipe</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="p-0 m-0" style="list-style: none;">
                                                <li class="d-flex align-items-center mb-6">
                                                    <div class="avatar flex-shrink-0 me-3">
                                                        <img src="/assets/main/images/recipes/recipe-img1.jpg" style="width: 40px;height: 40px;object-fit: cover;" alt="User" class="rounded" />
                                                    </div>
                                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                        <div class="me-2">
                                                            <small class="d-block">Featured 1</small>
                                                            <h6 class="fw-normal mb-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Send money</h6>
                                                        </div>
                                                        <div class="user-progress">
                                                            <div class="dropdown">
                                                                <button class="btn text-muted p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded bx-lg"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ChooseRecipe">Change Featured</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-flex align-items-center mb-6">
                                                    <div class="avatar flex-shrink-0 me-3">
                                                        <img src="/assets/main/images/recipes/recipe-img1.jpg" style="width: 40px;height: 40px;object-fit: cover;" alt="User" class="rounded" />
                                                    </div>
                                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                        <div class="me-2">
                                                            <small class="d-block">Featured 2</small>
                                                            <h6 class="fw-normal mb-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Send money</h6>
                                                        </div>
                                                        <div class="user-progress">
                                                            <div class="dropdown">
                                                                <button class="btn text-muted p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded bx-lg"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ChooseRecipe">Change Featured</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-flex align-items-center mb-6">
                                                    <div class="avatar flex-shrink-0 me-3">
                                                        <img src="/assets/main/images/recipes/recipe-img1.jpg" style="width: 40px;height: 40px;object-fit: cover;" alt="User" class="rounded" />
                                                    </div>
                                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                        <div class="me-2">
                                                            <small class="d-block">Featured 3</small>
                                                            <h6 class="fw-normal mb-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">Send money</h6>
                                                        </div>
                                                        <div class="user-progress">
                                                            <div class="dropdown">
                                                                <button class="btn text-muted p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded bx-lg"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ChooseRecipe">Change Featured</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ChooseRecipe" aria-labelledby="ChooseFeatured" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ChooseFeatured">Select Featured Recipe</h5>
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

                <!-- / Content -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <?= $this->endSection() ?>