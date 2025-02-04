<?= $this->extend('layouts/client/main') ?>
<?= $this->section('content') ?>

<div class="upper-container">
    <div class="center-container">
        <h1>ALL RECIPES</h1>
        <div class="custom-search">
            <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                <div class="input-group input-group-lg">
                    <span class="input-group-text bi-search" id="basic-addon1">
                    </span>
                    <input name="search" type="search" class="form-control inp-search_recipe" id="keyword" value="<?= isset($search_val) ? $search_val :  '' ?>" placeholder="Search for a Recipe Title ..." aria-label="Search" data-url="/recipes">
                    <button type="submit" class="form-control action-search">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container" style="margin-top:50px;">
    <div class="row">
        <?php foreach ($recipe_list as $key => $recipe_info) : ?>
            <div class="col-6 col-md-3 mb-4">
                <a href="<?= base_url('/recipes/details?id=' . $recipe_info['ID']) ?>" class="custom-card1">
                    <img src="<?= $recipe_info['IMAGE'] ? base_url($recipe_info['IMAGE']) : base_url('/assets/main/images/home-banner1.jpg') ?>" class="custom-card1-image" alt="" />
                    <div class="custom-card1-overlay">
                        <div class="custom-card1-header text-center" style="width: 100%;">
                            <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                <path />
                            </svg>
                            <div class="action-section">
                                <?php if ($recipe_info['FEATURED']) : ?>
                                    <span class="card-action">
                                        <i class="bi-star-fill" alt="star"></i>
                                    </span>
                                <?php endif; ?>

                                <?php if (in_array($recipe_info['ID'], $user_favs)) : ?>
                                    <span class="card-action">
                                        <i class="bi-bookmark-heart-fill bookmark-btn" alt="Bookmark"></i>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="custom-card1-header-text" style="line-height: 20px;width: 100%;">
                                <h3 class="custom-card1-title mb-0"><?= $recipe_info['TITLE'] ?></h3>
                                <span class="custom-card1-status"><span><i class="bi-clock"></i>&nbsp;<?= $recipe_info['PREP_TIME'] ?></span></span>
                            </div>
                        </div>
                        <p class="custom-card1-description"><?= $recipe_info['DETAILS'] ?></p>
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