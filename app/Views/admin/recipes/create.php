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

    .ingreds-temp {
        display: none;
    }
</style>
<!-- Content wrapper -->
<div class="content-wrapper form-recipe">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningTop" style="display: none;">
                        <span>Store Name Already Existing!</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    
                        <div class="row">
                            <div class="col-12">
                                <div class="required">
                                    <label for="rf-title" class="form-label">Title<span class="error-msg">* Required Field!</span></label>
                                    <input type="text" class="form-control rfi-title" id="rf-title" value="<?= $recipe_info['TITLE'] ?>">
                                    <input type="hidden" class="rfi-id" id="rf-id" value="<?= $recipe_info['ID'] ?>">
                                </div>
                                <div class="mt-3 required">
                                    <label for="rf-details" class="form-label">Details<span class="error-msg">* Required Field!</span></label>
                                    <textarea class="form-control rfi-details" id="rf-details" rows="9"><?= $recipe_info['DETAILS'] ?></textarea>
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
                                    <?php if (! isset($instruction_list) || count($instruction_list) == 0) : ?>
                                        <div class="mt-3 steps-container required" data-id="0">
                                            <span class="error-msg">* Required Field!</span>
                                            <div style="display: inline-flex; width: 100%;">
                                                <div class="step-num"><span>1</span></div>
                                                <textarea class="form-control" rows="2"></textarea>
                                                <button type="button" class="btn btn-icon btn-outline-danger ml-3 steps-action-del g-hidden" style="margin-left: 5px; align-self: center;">
                                                    <span class="tf-icons bx bx-trash bx-22px"></span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="mt-3 steps-container required">
                                            <span class="error-msg">* Required Field!</span>
                                            <div style="display: inline-flex; width: 100%;">
                                                <div class="step-num"><span>2</span></div>
                                                <textarea class="form-control" rows="2"></textarea>
                                                <button type="button" class="btn btn-icon btn-outline-danger ml-3 steps-action-del g-hidden" style="margin-left: 5px; align-self: center;">
                                                    <span class="tf-icons bx bx-trash bx-22px"></span>
                                                </button>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <?php foreach ($instruction_list as $key => $inst_info) : ?>
                                            <div class="mt-3 steps-container required" data-id="<?= $inst_info['ID'] ?>">
                                                <span class="error-msg">* Required Field!</span>
                                                <div style="display: inline-flex; width: 100%;">
                                                    <div class="step-num"><span><?= $inst_info['ORDER'] ?></span></div>
                                                    <textarea class="form-control" rows="2"><?= $inst_info['DESCRIPTION'] ?></textarea>
                                                    <button type="button" class="btn btn-icon btn-outline-danger ml-3 steps-action-del <?=$inst_info == end($instruction_list) ? '' : 'g-hidden'?>" style="margin-left: 5px; align-self: center;">
                                                        <span class="tf-icons bx bx-trash bx-22px"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-sm rounded-pill btn-primary mt-3 text-center steps-action-add">
                            <span class="tf-icons bx bx-plus bx-18px me-2"></span>Add More Steps
                        </button>
                    </div>
                </div>

                <div class="card mt-5">
                    <h5 class="card-header">
                        Ingredients
                    </h5>
                    <div class="card-body">
                        <h5 class="no-ingreds text-center" style="color: #d3d3d3; display:<?= (! isset($ingredients_list) || count($ingredients_list) == 0) ? 'block' : 'none' ?>">Currently No Ingredients Selected</h5>

                        <div class="row with-ingreds contain-ingreds">
                            <div class="col-12 placement">
                                <?php if (isset($ingredients_list) && count($ingredients_list) > 0) : ?>
                                    <?php foreach ($ingredients_list as $key => $ingred_info) : ?>
                                        <label class="list-group-item ingred-row" data-id="<?= $ingred_info['ID'] ?>" data-type="0">
                                            <div class="row mb-3 ingreds-container" data-id="<?= $ingred_info['INGREDIENT_ID'] ?>" data-type="0">
                                                <div class="col-12 required">
                                                    <label class="form-label"><?= $ingred_info['NAME'] ?><span class="error-msg">* Required Field!</span></label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text" class="form-control ic-vol" value="<?= $ingred_info['VOLUME'] ?>">
                                                        <span class="input-group-text ic-unit_measure" data-id="<?= $ingred_info['UNIT_MEASURE_ID'] ?>"><?= $ingred_info['UNIT_MEASURE_LABEL'] ?></span>
                                                        <button class="btn btn-outline-danger remove-ingred" data-type="0" type="button">X</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <?php if (isset($sub_recipe_list) && count($sub_recipe_list) > 0) : ?>
                                    <?php foreach ($sub_recipe_list as $key => $srl_info) : ?>
                                        <label class="list-group-item ingred-row" data-id="<?= $srl_info['ID'] ?>" data-type="1">
                                            <div class="row mb-3 ingreds-container" data-id="<?= $srl_info['SUB_RECIPE_ID'] ?>">
                                                <div class="col-12 required">
                                                <label class="form-label"><span><a href="<?=base_url('admin/recipes/form?id=' . $srl_info['SUB_RECIPE_ID'])?>" target="_blank"><?= $srl_info['TITLE'] ?></a></span><span class="error-msg">* Required Field!</span></label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text" class="form-control ic-vol" value="<?= $srl_info['VOLUME'] ?>">
                                                        <span class="input-group-text ic-unit_measure" data-id="<?= $srl_info['UNIT_MEASURE_ID'] ?>"><?= $srl_info['UNIT_MEASURE_LABEL'] ?></span>
                                                        <button class="btn btn-outline-danger remove-ingred" data-type="1" type="button">X</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-sm rounded-pill btn-primary mt-3 text-center action-modal-open-ingreds" id="openIngredsModal">
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
                            <select class="form-select form-select-sm rfi-type">
                                <option value="0" <?= $recipe_info['VISIBILITY'] == 0 ? 'selected' : '' ?>>Private</option>
                                <option value="1" <?= $recipe_info['VISIBILITY'] == 1 ? 'selected' : '' ?>>Public</option>
                            </select>
                        </div>

                        <div class="mt-5 required checkbox">
                            <label class="form-label">Categories<span class="error-msg">* Required Field!</span></label>
                            <?php foreach ($recipe_categories as $key => $rc_info): ?>
                                <div class="form-check mb-1">
                                    <label class="form-check-label"><?= $rc_info['LABEL'] ?></label>
                                    <input class="form-check-input rfi-category" type="checkbox" value="<?= $rc_info['ID'] ?>" <?= in_array($rc_info['ID'], $recipe_cat_list) ? 'checked' : '' ?>>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="mt-5 required">
                            <label class="form-label">Recipe Image<span class="error-msg">* Required Field!</span></label>
                            <div class="recipe_img_preview">
                                <img src="<?= base_url(isset( $recipe_img ) ? $recipe_img : 'assets/admin/img/default-img.jpg') ?>" alt="" style="width: 100%;max-height: 150px;object-fit: cover;" />
                            </div>
                            <input class="form-control form-control-sm mt-2" id="rfi-image" type="file" accept="image/*">
                        </div>

                        <div class="mt-5 required">
                            <label class="form-label">Time<span class="error-msg">* Required Field!</span></label>
                            <input type="text" class="form-control form-control-sm rfi-time" placeholder="1 hr 20 mins" value="<?= $recipe_info['PREP_TIME'] ?>">
                        </div>
                        <div class="mt-5 required">
                            <label class="form-label">Servings<span class="error-msg">* Required Field!</span></label>
                            <input type="number" class="form-control form-control-sm rfi-servings" placeholder="1" value="<?= $recipe_info['SERVINGS'] ?>">
                        </div>

                    </div>
                    <hr class="mb-0">
                    <div class="card-footer">
                        <div style="float: right;">
                            <button type="button" class="btn btn-primary action-save_recipe">
                                <span class="tf-icons bx bx-plus-circle me-2"></span><?=$recipe_info['ID'] ? 'Update' : 'Create'?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- / Content -->

    <div class="modal fade" id="modal-ingreds-list" aria-labelledby="ChooseIngredientsLabel" tabindex="-1" style="display: none;" aria-hidden="true">
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
                            <input type="text" id="searchIngreds" class="form-control" placeholder="Search..." aria-label="Search..." onkeyup="myFunction()">
                        </div>
                    </div>
                    <div class="mt-4 contain-ingred_list">
                        <!-- content here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="ingreds-action-select">
                        Select
                    </button>
                </div>
            </div>
        </div>
    </div>

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
    Recipe Successfully Created!
</div>
</div>

<!-- Content wrapper -->
<?= $this->endSection() ?>