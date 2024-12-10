<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>
<!-- Content wrapper -->
<div class="content-wrapper form-create_ingredient">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card">
            <div class="card-body">
                <div class="alert alert-danger alert-dismissible" role="alert" id="warningTop" style="display: none;">
                    <span>Store Name Already Existing!</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="row">
                    <div class="col-md-8 mt-3 required">
                        <label for="cii_inp-name" class="form-label">Name<span class="error-msg">* Required Field!</span></label>
                        <input type="text" class="form-control cii-name" id="cii_inp-name">
                    </div>

                    <div class="col-md-4 mt-3 required">
                        <label for="cii_inp-name" class="form-label">Quantity<span class="error-msg">* Required Field!</span></label>
                        <div class="input-group">
                            <!-- <span class="input-group-text">Volume</span> -->
                            <input type="text" class="form-control cii-vol" placeholder="100">
                            <span class="input-group-text selected-unit">g</span>
                            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end unit-selector" data-selected="1">
                                <?php foreach ($units_measure_list as $key => $units_measure_info) : ?>
                                    <li><a class="dropdown-item" data-id="<?= $units_measure_info['ID'] ?>"><?= $units_measure_info['LABEL'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mt-3 required">
                        <label class="form-label">Volume to Weight (1g = ?ml)<span class="error-msg">* Required Field!</span></label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control cii-weight" placeholder="20">
                            <span class="input-group-text">ml</span>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3 required">
                        <label class="form-label">Calories<span class="error-msg">* Required Field!</span></label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control cii-cal" placeholder="0">
                            <span class="input-group-text">kcal</span>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3 required">
                        <label class="form-label">Fat<span class="error-msg">* Required Field!</span></label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control cii-fat" placeholder="0">
                            <span class="input-group-text">g</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mt-3 required">
                        <label class="form-label">Sugar<span class="error-msg">* Required Field!</span></label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control cii-sugar" placeholder="0">
                            <span class="input-group-text">g</span>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3 required">
                        <label class="form-label">Protein<span class="error-msg">* Required Field!</span></label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control cii-protein" placeholder="0">
                            <span class="input-group-text">g</span>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3 required">
                        <label class="form-label">Carbs<span class="error-msg">* Required Field!</span></label>
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
                    <?php foreach ($store_list as $key => $store_info) : ?>
                        <div class="row mt-3 store_row" data-id="<?= $store_info['ID'] ?>">
                            <div class="col-12">
                                <label class="form-label"><?= $store_info['NAME'] ?></label>
                                <div class="input-group">
                                    <span class="input-group-text">Price</span>
                                    <input type="text" class="form-control sr-price" placeholder="0" value="0">
                                    <span class="input-group-text">SEK</span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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

<div class="bs-toast toast fade bg-primary" id="success-alert" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed;right: 3%;bottom:3%;">
<div class="toast-header">
    <i class="bx bx-bell me-2"></i>
    <div class="me-auto fw-medium">Success</div>
    <!-- <small>11 mins ago</small> -->
    <!-- <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button> -->
</div>
<div class="toast-body">
    Ingredient Successfully Created!
</div>
</div>

<!-- Content wrapper -->
<?= $this->endSection() ?>