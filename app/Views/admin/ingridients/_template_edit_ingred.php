<div class="template-edit_ingred form-create_ingredient">
    <div>
        <label class="form-label">Name</label>
        <input type="text" class="form-control eii-name" value="<?=$ingredient_info['NAME']?>">
    </div>
    <div class="mt-3">
        <label class="form-label">Volume to Weight (1g = ?ml)</label>
        <div class="input-group input-group-merge">
            <input type="text" class="form-control eii-weight" placeholder="20" value="<?=$ingredient_info['WEIGHT']?>">
            <span class="input-group-text">ml</span>
        </div>
    </div>
    <div class="mt-3">
        <label class="form-label">Calories</label>
        <div class="input-group input-group-merge">
            <input type="text" class="form-control eii-cal" placeholder="2000" value="<?=$ingredient_info['CALORIES']?>">
            <span class="input-group-text">kcal</span>
        </div>
    </div>
    <div class="mt-3">
        <label class="form-label">Fat</label>
        <div class="input-group input-group-merge">
            <input type="text" class="form-control eii-fat" placeholder="0" value="<?=$ingredient_info['FAT']?>">
            <span class="input-group-text">g</span>
        </div>
    </div>
    <div class="mt-3">
        <label class="form-label">Sugar</label>
        <div class="input-group input-group-merge">
            <input type="text" class="form-control eii-sugar" placeholder="0" value="<?=$ingredient_info['SUGAR']?>">
            <span class="input-group-text">g</span>
        </div>
    </div>
    <div class="mt-3">
        <label class="form-label">Protein</label>
        <div class="input-group input-group-merge">
            <input type="text" class="form-control eii-protein" placeholder="0" value="<?=$ingredient_info['PROTEIN']?>">
            <span class="input-group-text">g</span>
        </div>
    </div>
    <div class="mt-3">
        <label class="form-label">Carbs</label>
        <div class="input-group input-group-merge">
            <input type="text" class="form-control eii-carbs" placeholder="0" value="<?=$ingredient_info['CARBS']?>">
            <span class="input-group-text">g</span>
        </div>
    </div>
    <div class="mt-3">
        <label for="StoreComment" class="form-label">Comment</label>
        <textarea class="form-control eii-comment" id="StoreComment" rows="5"><?=$ingredient_info['COMMENT']?></textarea>
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
                    <input type="text" class="form-control eii-name" placeholder="1000">
                    <span class="input-group-text">SEK</span>
                </div>
            </div>
            <div class="col-6">
                <label class="form-label">&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-text">Volume</span>
                    <input type="text" class="form-control eii-name" placeholder="100">
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
                    <input type="text" class="form-control eii-name" placeholder="1000">
                    <span class="input-group-text">SEK</span>
                </div>
            </div>
            <div class="col-6">
                <label class="form-label">&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-text">Volume</span>
                    <input type="text" class="form-control eii-name" placeholder="100">
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
                    <input type="text" class="form-control eii-name" placeholder="1000">
                    <span class="input-group-text">SEK</span>
                </div>
            </div>
            <div class="col-6">
                <label class="form-label">&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-text">Volume</span>
                    <input type="text" class="form-control eii-name" placeholder="100">
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