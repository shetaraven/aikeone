<div class="list-group" id="ingreds-list">
    <?php foreach ($ingredients_list as $key => $il_info) : ?>
        <label class="list-group-item">
            <input class="form-check-input me-3 checkbox-ingred" type="checkbox" data-id="<?= $il_info['ID'] ?>" data-type="0"> <span><?= $il_info['NAME'] ?></span>
        </label>
    <?php endforeach; ?>
</div>