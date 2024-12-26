<?php foreach ($recipe_ingredients as $key => $ri_info) : ?>
    <tr>
        <td data-label="Ingredient"><?=$ri_info['NAME']?></td>
        <td data-label="Original Volume"><span class="curr_volume"><?=$ri_info['VOLUME']?></span>&nbsp;<span class="curr_unit"><?=$ri_info['UNIT_MEASURE_LABEL']?></span></td>
        <td data-label="Volume"><span class="curr_cal_val">---</span></td>
    </tr>
<?php endforeach; ?>