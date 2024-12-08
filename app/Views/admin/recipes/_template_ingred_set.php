<?php foreach ($ingredients_list as $key => $i_info) : ?>
    <label class="list-group-item ingred-row">
        <div class="row mb-3 ingreds-container" data-id="<?= $i_info['ID'] ?>">
            <div class="col-12">
                <label class="form-label"><?= $i_info['NAME'] ?></label>
                <div class="input-group input-group-merge">
                    <input type="text" class="form-control ic-vol">
                    <span class="input-group-text ic-unit_measure" data-id="<?= $i_info['UNIT_MEASURE_ID'] ?>"><?= $i_info['UNIT_MEASURE_LABEL'] ?></span>
                    <button class="btn btn-outline-danger remove-ingred" data-id="idhere" type="button">X</button>
                </div>
            </div>
        </div>
    </label>
<?php endforeach; ?>