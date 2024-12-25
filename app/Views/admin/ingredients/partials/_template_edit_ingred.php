<div class="template-edit_ingred form-create_ingredient">
    <div class="alert alert-danger alert-dismissible" role="alert" id="warningTop" style="display: none;">
        <span>Store Name Already Existing!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="required">
        <label class="form-label">Name<span class="error-msg">* Required Field!</span></label>
        <input type="text" class="form-control eii-name" value="<?= $ingredient_info['NAME'] ?>">
    </div>
    <div class="mt-3 required">
        <label for="cii_inp-name" class="form-label">Quantity<span class="error-msg">* Required Field!</span></label>
        <div class="input-group">
            <!-- <span class="input-group-text">Volume</span> -->
            <input type="text" class="form-control cii-vol" placeholder="100" value="<?= $ingredient_info['VOLUME'] ?>">
            <span class="input-group-text selected-unit"><?=$ingredient_info['UNIT_MEASURE_LABEL']?></span>
            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end unit-selector" data-selected="<?= $ingredient_info['UNIT_MEASURE_ID'] ?>">
                <?php foreach ($units_measure_list as $uml_key => $uml_data) : ?>
                    <li>
                        <a class="dropdown-item" data-id="<?= $uml_data['ID'] ?>"><?= $uml_data['LABEL'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="mt-3 required">
        <label class="form-label">Volume to Weight (1g = ?ml)<span class="error-msg">* Required Field!</span></label>
        <div class="input-group input-group-merge">
            <input type="text" class="form-control eii-weight" placeholder="20" value="<?= $ingredient_info['WEIGHT'] ?>">
            <span class="input-group-text">ml</span>
        </div>
    </div>
    <div class="mt-3 required">
        <label class="form-label">Calories<span class="error-msg">* Required Field!</span></label>
        <div class="input-group input-group-merge">
            <input type="text" class="form-control eii-cal" placeholder="2000" value="<?= $ingredient_info['CALORIES'] ?>">
            <span class="input-group-text">kcal</span>
        </div>
    </div>
    <div class="mt-3 required">
        <label class="form-label">Fat<span class="error-msg">* Required Field!</span></label>
        <div class="input-group input-group-merge">
            <input type="text" class="form-control eii-fat" placeholder="0" value="<?= $ingredient_info['FAT'] ?>">
            <span class="input-group-text">g</span>
        </div>
    </div>
    <div class="mt-3 required">
        <label class="form-label">Sugar<span class="error-msg">* Required Field!</span></label>
        <div class="input-group input-group-merge">
            <input type="text" class="form-control eii-sugar" placeholder="0" value="<?= $ingredient_info['SUGAR'] ?>">
            <span class="input-group-text">g</span>
        </div>
    </div>
    <div class="mt-3 required">
        <label class="form-label">Protein<span class="error-msg">* Required Field!</span></label>
        <div class="input-group input-group-merge">
            <input type="text" class="form-control eii-protein" placeholder="0" value="<?= $ingredient_info['PROTEIN'] ?>">
            <span class="input-group-text">g</span>
        </div>
    </div>
    <div class="mt-3 required">
        <label class="form-label">Carbs<span class="error-msg">* Required Field!</span></label>
        <div class="input-group input-group-merge">
            <input type="text" class="form-control eii-carbs" placeholder="0" value="<?= $ingredient_info['CARBS'] ?>">
            <span class="input-group-text">g</span>
        </div>
    </div>
    <div class="mt-3">
        <label for="StoreComment" class="form-label">Comment</label>
        <textarea class="form-control eii-comment" id="StoreComment" rows="5"><?= $ingredient_info['COMMENT'] ?></textarea>
    </div>

    <div class="divider mt-12">
        <div class="divider-text">Prices per Shop</div>
    </div>

    <div class="shop-prices">
        <?php foreach ($ingred_store_prices as $key => $isp_data) : ?>
            <div class="row store_row" data-id="<?= $isp_data['STORE_ID'] ?>" data-key="<?= $isp_data['ID'] ?>">
                <div class="col-12">
                    <label class="form-label"><?= $isp_data['STORE_NAME'] ?></label>
                    <div class="input-group">
                        <span class="input-group-text">Price</span>
                        <input type="text" class="form-control sr-price" placeholder="1000" value="<?= $isp_data['PRICE'] ?>">
                        <span class="input-group-text">SEK</span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>