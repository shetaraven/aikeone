<?= $this->extend('layouts/client/main') ?>
<?= $this->section('content') ?>

<div class="upper-container">
    <h1>MY COLLECTIONS</h1>
</div>

<div class="container" style="margin-top:50px;">
    <div class="row">
    <?php if ($recipe_list) :?>
        <?php foreach ($recipe_list as $key => $recipe_info) : ?>
            <div class="col-6 col-md-3 mb-4">
                <a href="<?= base_url('/recipes/details?id=' . $recipe_info['ID']) ?>" class="custom-card1">
                    <img src="<?= $recipe_info['IMAGE'] ? base_url($recipe_info['IMAGE']) : base_url('/assets/main/images/home-banner1.jpg') ?>" class="custom-card1-image" alt="" />
                    <div class="custom-card1-overlay">
                        <div class="custom-card1-header text-center" style="width: 100%;">
                            <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg"><path /></svg> 
                            <div class="action-section">
                                <?php if ($recipe_info['FEATURED']) : ?>
                                    <span class="card-action">
                                        <i class="bi-star-fill" alt="star"></i>
                                    </span>
                                <?php endif; ?>

                                <?php if (in_array($recipe_info['ID'], $user_favs) ) : ?>
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
    <?php else :?>
        <h5 class="text-center" style="color: #d3d3d3;">Currently No Recipe in your Collections</h5>
    <?php endif; ?>
    </div>

    <?php if (isset($pager)) : ?>
        <div class="col-lg-12 col-12">
            <div class="paginate">
                <?= $pager->links('client', 'client') ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>