<div class="row">
    <div class="col-md-4 mb-4">
        <div class="box p-3 text-center" style="border: solid 2px #dcdedf;background: #e6efef85;">
            <p class="small mb-0" style="color: #000;">Total Calories:</p>
            <p style="font-size: 2em;color: #000;" class="mb-0"><?= $TotalRef['CALORIE'] ?><span style="font-size: 12px;">Kcal</span></p>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="box p-3 text-center" style="border: solid 2px #dcdedf;background: #e6efef85;">
            <p class="small mb-0" style="color: #000;">Total Fat:</p>
            <p style="font-size: 2em;color: #000;" class="mb-0"><?= $TotalRef['FAT'] ?><span style="font-size: 12px;">g</span></p>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="box p-3 text-center" style="border: solid 2px #dcdedf;background: #e6efef85;">
            <p class="small mb-0" style="color: #000;">Total Sugar:</p>
            <p style="font-size: 2em;color: #000;" class="mb-0"><?= $TotalRef['SUGAR'] ?><span style="font-size: 12px;">g</span></p>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="box p-3 text-center" style="border: solid 2px #dcdedf;background: #e6efef85;">
            <p class="small mb-0" style="color: #000;">Total Protein:</p>
            <p style="font-size: 2em;color: #000;" class="mb-0"><?= $TotalRef['PROTEIN'] ?><span style="font-size: 12px;">g</span></p>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="box p-3 text-center" style="border: solid 2px #dcdedf;background: #e6efef85;">
            <p class="small mb-0" style="color: #000;">Total Carbs:</p>
            <p style="font-size: 2em;color: #000;" class="mb-0"><?= $TotalRef['CARBS'] ?><span style="font-size: 12px;">g</span></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box p-3 text-center" style="border: solid 2px #dcdedf;background: #e6efef85;">
            <p class="small mb-0" style="color: #000;">Servings:</p>
            <p style="font-size: 2em;color: #000;" class="mb-0"><span id="nutriServings"></span></p>
        </div>
    </div>
</div>


<div class="accordion">
    <?php foreach ($recipe_ingredients as $key => $ri_info) : ?>
        <div class="accordion-item" style="border: none;">
            <h2 class="accordion-header" id="heading-<?=$key?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?=$key?>" aria-expanded="false" aria-controls="collapse-<?=$key?>" style="color: var(--primary-color);font-weight: 900;border-radius: 50px;">
                    <?=$ri_info['NAME']?>
                </button>
            </h2>

            <div id="collapse-<?=$key?>" class="accordion-collapse collapse" aria-labelledby="heading-<?=$key?>" data-bs-parent="#multiple-layout">
                <div class="accordion-body">
                    <div class="card p-4" style="border: solid 2px #d3d3d3;">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-2"><span style="font-weight: 900;font-family: sans-serif;">Calories: </span> <?= $ri_info['CALORIE'] ?> Kcal</div>
                            <div class="col-12 col-md-6 mb-2"><span style="font-weight: 900;font-family: sans-serif;">Fat: </span> <?= $ri_info['FAT'] ?> g</div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-2"><span style="font-weight: 900;font-family: sans-serif;">Sugar: </span> <?= $ri_info['SUGAR'] ?> g</div>
                            <div class="col-12 col-md-6 mb-2"><span style="font-weight: 900;font-family: sans-serif;">Protien: </span> <?= $ri_info['PROTEIN'] ?> g</div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6"><span style="font-weight: 900;font-family: sans-serif;">Carbs: </span> <?= $ri_info['CARBS'] ?> g</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>