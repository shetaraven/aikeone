<thead>
    <tr>
        <th scope="col" style="border:none;"></th>
        <?php foreach ($stores_used as $key => $store_data) : ?>
            <th scope="col" class="store-name"><span style="font-size: 2em;color:  var(--link-hover-color);"><?=$store_data['STORE_NAME']?></span><br/>Price</th>
        <?php endforeach; ?>
    </tr>
</thead>
<tbody>
    <?php foreach ($recipe_ingredients as $key => $ri_info) : ?>
        <tr>
            <td data-label="Ingredient"><?= $ri_info['VOLUME'] ?><?= $ri_info['UNIT_MEASURE_LABEL'] ?>&nbsp;<?= $ri_info['NAME'] ?></td>
            <?php foreach ($stores_used as $key => $store_data) : ?>
                <th scope="col"><?=isset( $ri_info['STORE_PRICES'][$store_data['STORE_ID']]) ? $ri_info['STORE_PRICES'][$store_data['STORE_ID']] . ' <span class="currency">SEK</span>' : '--'?></th>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</tbody>