<div>
    <div class="input-group input-group-merge">
        <span class="input-group-text"><i class="bx bx-search"></i></span>
        <input type="text" id="searchRecipe" class="form-control" placeholder="Search..." aria-label="Search..." onkeyup="myFunction()">
    </div>
</div>
<div class="mt-4">
    <div class="list-group" id="recipe-user-featured-list" data-uid="<?=$user_id?>">
        <?php foreach ($prl_list as $key => $recipe_info) : ?>
            <label class="list-group-item" data-prl-id="<?=isset($ruf_list[$recipe_info['ID']]) ? $ruf_list[$recipe_info['ID']]['ID'] : 0 ?>">
                <input class="form-check-input me-3 checkbox-recipe_user_featured" type="checkbox" value="<?=$recipe_info['ID']?>" <?=isset($ruf_list[$recipe_info['ID']]) ? 'checked' : false ?>>
                <span><?=$recipe_info['TITLE']?></span>
            </label>
        <?php endforeach; ?>
    </div>
</div>