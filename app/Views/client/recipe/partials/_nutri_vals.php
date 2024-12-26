<div class="row">
    <div class="col-md-4 mb-4">
        <div class="box p-3 text-center" style="border: solid 2px #dcdedf;">
            <p class="small mb-0" style="color: #000;">Total Calories:</p>
            <p style="font-size: 2em;color: #000;" class="mb-0">000</p>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="box p-3 text-center" style="border: solid 2px #dcdedf;">
            <p class="small mb-0" style="color: #000;">Total Fat:</p>
            <p style="font-size: 2em;color: #000;" class="mb-0">000</p>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="box p-3 text-center" style="border: solid 2px #dcdedf;">
            <p class="small mb-0" style="color: #000;">Total Sugar:</p>
            <p style="font-size: 2em;color: #000;" class="mb-0">000</p>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="box p-3 text-center" style="border: solid 2px #dcdedf;">
            <p class="small mb-0" style="color: #000;">Total Protien:</p>
            <p style="font-size: 2em;color: #000;" class="mb-0">000</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box p-3 text-center" style="border: solid 2px #dcdedf;">
            <p class="small mb-0" style="color: #000;">Total Carbs:</p>
            <p style="font-size: 2em;color: #000;" class="mb-0">000</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box p-3 text-center" style="border: solid 2px #dcdedf;">
            <p class="small mb-0" style="color: #000;">Servings:</p>
            <p style="font-size: 2em;color: #000;" class="mb-0">000</p>
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
                            <div class="col-12 col-md-6 mb-2"><span style="font-weight: 900;font-family: sans-serif;">Calories: </span></div>
                            <div class="col-12 col-md-6 mb-2"><span style="font-weight: 900;font-family: sans-serif;">Fat: </span></div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-2"><span style="font-weight: 900;font-family: sans-serif;">Sugar: </span></div>
                            <div class="col-12 col-md-6 mb-2"><span style="font-weight: 900;font-family: sans-serif;">Protien: </span></div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6"><span style="font-weight: 900;font-family: sans-serif;">Carbs: </span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>