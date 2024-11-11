<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>
<!-- Content wrapper -->
<div class="content-wrapper form-create_ingredient">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card">
            <h5 class="card-header">
                Ingredient Details
            </h5>

            <div class="card-body">
                <div>
                    <label for="cii_inp-name" class="form-label">Name</label>
                    <input type="text" class="form-control cii-name" id="cii_inp-name">
                </div>

                <div class="row">
                    <div class="col-md-4 mt-3">
                        <label class="form-label">Volume to Weight (1g = ?ml)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control cii-weight" placeholder="20">
                            <span class="input-group-text">ml</span>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label class="form-label">Calories</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control cii-cal" placeholder="2000">
                            <span class="input-group-text">kcal</span>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label class="form-label">Fat</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control cii-fat" placeholder="0">
                            <span class="input-group-text">g</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mt-3">
                        <label class="form-label">Sugar</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control cii-sugar" placeholder="0">
                            <span class="input-group-text">g</span>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label class="form-label">Protein</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control cii-protein" placeholder="0">
                            <span class="input-group-text">g</span>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label class="form-label">Carbs</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control cii-carbs" placeholder="0">
                            <span class="input-group-text">g</span>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <label for="cii_inp-comment" class="form-label">Comment</label>
                    <textarea class="form-control cii-comment" id="cii_inp-comment" rows="5"></textarea>
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

            <div class="card-footer">
                <a href="" style="float: right;"></a>
                <button type="button" class="btn btn-primary ci_action-create">
                    <span class="tf-icons bx bx-plus-circle me-2"></span>Create
                    </button>
                </a>
            </div>
        </div>

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
<?= $this->endSection() ?>
            