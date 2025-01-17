<div class="row">
    <?php if (! empty($recipe_list)) : ?>
        <?php foreach ($recipe_list as $key => $recipe_info) : ?>
            <div class="col-6 col-md-3 mt-4">
                <div class="custom-card2">
                    <img src="<?= $recipe_info['IMAGE'] ? base_url($recipe_info['IMAGE']) : base_url('/assets/main/images/home-banner1.jpg') ?>" alt="">
                    <div class="custom-card2-content">
                        <h2>
                            <?= $recipe_info['TITLE'] ?>
                        </h2>

                        <p>
                            <span><i class="bi-clock"></i>&nbsp;<?= $recipe_info['PREP_TIME'] ?></span><br>
                            <?= $recipe_info['DETAILS'] ?>
                        </p>
                        <a href="<?= base_url('/recipes/details?id=' . $recipe_info['ID']) ?>" class="button featured-card-link">
                            <span>Check Recipe</span>
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="col-6 col-md-3 mt-4">
            <div class="custom-card2">
                <img src="<?= base_url('/assets/main/images/home-banner1.jpg') ?>" alt="">
                <div class="custom-card2-content">
                    <h2>
                        Serving soon!
                    </h2>

                    <p>
                        Formulating new recipes for this category! Check it out later!
                    </p>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>