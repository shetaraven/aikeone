<?= $this->extend('layouts/client/main') ?>
<?= $this->section('content') ?>

<div class="upper-container">
    <h1>ALL RECIPES</h1>
</div>

<div class="container" style="margin-top:50px;">
    <div class="row">
        <?php foreach ($recipe_list as $key => $recipe_info) : ?>
            <div class="col-md-3 mb-4">
                <a href="<?= base_url('/recipes/details?id=' . $recipe_info['ID']) ?>" class="recipe-link">
                    <div class="card-sl">
                        <div class="card-image">
                            <?php if ($recipe_info['IMAGE']) : ?>
                                <img src="<?= base_url($recipe_info['IMAGE']) ?>" />
                            <?php else: ?>
                                <img src="<?= base_url('/assets/main/images/home-banner1.jpg') ?>" />
                            <?php endif; ?>
                        </div>
                        <!-- <span class="card-action"><i class="bi-bookmark-heart bookmark-btn" alt="Bookmark"></i></span> -->
                        <div class="card-heading">
                            <?= $recipe_info['TITLE'] ?>
                        </div>
                        <div class="card-text pt-0">
                            <i class="bi-clock clock-btn" alt="clock">&nbsp;<?= $recipe_info['PREP_TIME'] ?></i>
                        </div>
                        <!-- <a href="#" class="card-button"> View Recipe</a> -->
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="col-lg-12 col-12">
    <div class="paginate">
        <?= $pager->links('client', 'client') ?>
    </div>
</div>

<?= $this->endSection() ?>