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
                <td scope="col" data-label="<?=$store_data['STORE_NAME'].' PRICE' ?>"><?=isset( $ri_info['STORE_PRICES'][$store_data['STORE_ID']]) ? '<span class="sek_price">' . $ri_info['STORE_PRICES'][$store_data['STORE_ID']] . ' SEK</span><span class="php_price" style="display:none;">' . round($ri_info['STORE_PRICES'][$store_data['STORE_ID']] * $exchange_rate['VALUE'],2) . ' PHP</span>' : '--'?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</tbody>
