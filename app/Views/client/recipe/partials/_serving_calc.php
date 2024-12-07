<?php foreach ($recipe_ingredients as $key => $ri_info) : ?>
    <tr>
        <td data-label="Ingredient"><?=$ri_info['NAME']?></td>
        <td data-label="Original Volume"><?=$ri_info['VOLUME']?><?=$ri_info['UNIT_MEASURE_LABEL']?></td>
        <td data-label="Volume"><?=$ri_info['VOLUME']?><?=$ri_info['UNIT_MEASURE_LABEL']?></td>
    </tr>
<?php endforeach; ?>