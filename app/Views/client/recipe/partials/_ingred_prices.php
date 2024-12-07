<thead>
    <tr>
        <th scope="col">Ingredient</th>
        <th scope="col">Quantity</th>
        <?php foreach ($stores_used as $key => $store_data) : ?>
            <th scope="col"><?=$store_data['STORE_NAME']?> Price</th>
        <?php endforeach; ?>
    </tr>
</thead>
<tbody>
    <?php foreach ($recipe_ingredients as $key => $ri_info) : ?>
        <tr>
            <td data-label="Ingredient"><?= $ri_info['NAME'] ?></td>
            <td data-label="Quantity"><?= $ri_info['VOLUME'] ?><?= $ri_info['UNIT_MEASURE_LABEL'] ?></td>
            <?php foreach ($stores_used as $key => $store_data) : ?>
                <th scope="col"><?=isset( $ri_info['STORE_PRICES'][$store_data['STORE_ID']]) ? $ri_info['STORE_PRICES'][$store_data['STORE_ID']] : '--'?></th>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</tbody>