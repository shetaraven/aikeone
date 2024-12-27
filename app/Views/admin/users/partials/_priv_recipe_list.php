<div>
    <div class="input-group input-group-merge">
        <span class="input-group-text"><i class="bx bx-search"></i></span>
        <input type="text" id="searchRecipe" class="form-control" placeholder="Search..." aria-label="Search..." onkeyup="myFunction()">
    </div>
</div>
<div class="mt-4">
    <div class="list-group" id="priv-recipe-list" data-uid="<?=$user_id?>">
        <?php foreach ($prl_list as $key => $recipe_info) : ?>
            <label class="list-group-item" data-prl-id="<?=isset($upr_list[$recipe_info['ID']]) ? $upr_list[$recipe_info['ID']]['ID'] : 0 ?>">
                <input class="form-check-input me-3 checkbox-priv_recipe" type="checkbox" value="<?=$recipe_info['ID']?>" <?=isset($upr_list[$recipe_info['ID']]) ? 'checked' : false ?>>
                <span><?=$recipe_info['TITLE']?></span>
            </label>
        <?php endforeach; ?>
    </div>
</div>