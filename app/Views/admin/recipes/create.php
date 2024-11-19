<?= $this->extend('layouts/admin/main') ?>
    <?= $this->section('content') ?>

        <style>
            .step-num {
                border-radius: 50%;
                padding: 10px;
                border: solid 1px #ced1d5;
                height: 35px;
                width: 35px;
                align-self: center;
                position: relative;
                font-size: 12px;
                margin-right: 10px;
                color: #ced1d5;
            }
            
            .step-num span {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }
            
            .ingrids-temp {
                display: none;
            }
        </style>
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <h4 class="card-header">
                                Create New Recipe
                            </h4>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <label for="storeName" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="storeName">
                                        </div>
                                        <div class="mt-3">
                                            <label for="StoreComment" class="form-label">Details</label>
                                            <textarea class="form-control" id="StoreComment" rows="9"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card mt-5">
                            <h5 class="card-header">
                                Instructions
                            </h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="steps-area">
                                            <div class="mt-3 steps-container">
                                                <!-- <label class="form-label">Step 1</label> -->
                                                <div style="display: inline-flex; width: 100%;">
                                                    <div class="step-num"><span>1</span></div>
                                                    <textarea class="form-control" rows="2"></textarea>
                                                    <button type="button" class="btn btn-icon btn-outline-danger ml-3 delSteps" style="margin-left: 5px;visibility: hidden; align-self: center;">
                                                        <span class="tf-icons bx bx-trash bx-22px"></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="mt-3 steps-container">
                                                <!-- <label class="form-label">Step 2</label> -->
                                                <div style="display: inline-flex; width: 100%;">
                                                    <div class="step-num"><span>2</span></div>
                                                    <textarea class="form-control" rows="2"></textarea>
                                                    <button type="button" class="btn btn-icon btn-outline-danger ml-3 delSteps" style="margin-left: 5px;visibility: hidden; align-self: center;">
                                                        <span class="tf-icons bx bx-trash bx-22px"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" id="addSteps" class="btn btn-sm rounded-pill btn-primary mt-3 text-center">
                                    <span class="tf-icons bx bx-plus bx-18px me-2"></span>Add More Steps
                                </button>
                            </div>
                        </div>

                        <div class="card mt-5">
                            <h5 class="card-header">
                                Ingredients
                            </h5>
                            <div class="card-body">
                                <h5 class="no-ingrids text-center" style="color: #d3d3d3;">Currently No Ingredients Selected</h5>
                                <div class="row with-ingrids">
                                    <div class="col-12 placement">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#ChooseIngredients" class="btn btn-sm rounded-pill btn-primary mt-3 text-center" id="openIngridsModal">
                                    <span class="tf-icons bx bx-plus bx-18px me-2"></span>Add Ingredients
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <label class="form-label">Recipe Type</label>
                                    <select class="form-select form-select-sm">
                                        <option value="public" selected>Public</option>
                                        <option value="private">Private</option>
                                    </select>
                                </div>

                                <div class="mt-5">
                                    <label class="form-label">Categories</label>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <label class="form-check-label">Cookies</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <label class="form-check-label">Vegan</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <label class="form-check-label">Cake</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <label class="form-check-label">Cupcakes</label>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <label class="form-label">Recipe Image</label>
                                    <img src="<?= base_url('assets/admin/img/default-img.jpg') ?>" alt="" style="width: 100%;max-height: 150px;object-fit: cover;" />
                                    <input class="form-control form-control-sm mt-2" type="file">
                                </div>

                                <div class="mt-5">
                                    <label class="form-label">Time</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                                <div class="mt-5">
                                    <label class="form-label">Servings</label>
                                    <input type="number" class="form-control form-control-sm">
                                </div>

                            </div>
                            <hr class="mb-0">
                            <div class="card-footer">
                                <a href="" style="float: right;">
                                    <button type="button" class="btn btn-primary">
                                        <span class="tf-icons bx bx-plus-circle me-2"></span>Create
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- / Content -->

            <div class="modal fade" id="ChooseIngredients" aria-labelledby="ChooseIngredientsLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ChooseIngredientsLabel">Select Ingredient</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-search"></i></span>
                                    <input type="text" id="searchIngrids" class="form-control" placeholder="Search..." aria-label="Search..." onkeyup="myFunction()">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="list-group" id="ingrids-list"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="generateIngrids">
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