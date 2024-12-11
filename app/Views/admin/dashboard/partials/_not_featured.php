<div>
    <div class="input-group input-group-merge">
        <span class="input-group-text"><i class="bx bx-search"></i></span>
        <input type="text" id="searchRecipe" class="form-control" placeholder="Search..." aria-label="Search..." onkeyup="myFunction()">
    </div>
</div>
<div class="mt-4">
    <div class="list-group" id="recipe-list">
        <?php foreach ($recipe_list as $key => $recipe_info) : ?>
            <label class="list-group-item to_feature">
                <input class="form-check-input me-3" type="checkbox" value="<?=$recipe_info['ID']?>">
                <span><?=$recipe_info['TITLE']?></span>
            </label>
        <?php endforeach; ?>
    </div>
</div>