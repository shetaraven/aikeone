<?= $this->extend('layouts/client/main') ?>
<?= $this->section('content') ?>

<div class="home-banner-main" style="position: relative;">
    <div class="home-slider owl-carousel js-fullheight">
        <div class="slider-item js-fullheight" style="background-image:url(assets/main/images/home-banner1.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 text-center">
                            <h1 class="mb-3">Discover</h1>
                            <h2>New Recipes</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item js-fullheight" style="background-image:url(assets/main/images/home-banner3.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 text-center">
                            <h1 class="mb-3">Learn</h1>
                            <h2>From a Vast Collection</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item js-fullheight" style="background-image:url(assets/main/images/home-banner2.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 text-center">
                            <h1 class="mb-3">Enjoy</h1>
                            <h2>the Process</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom-search">
        <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
            <div class="input-group input-group-lg">
                <span class="input-group-text bi-search" id="basic-addon1">
                </span>
                <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Search for a Recipe Title ..." aria-label="Search">
                <button type="submit" class="form-control">Search</button>
            </div>
        </form>
    </div>
</div>

<section class="explore-section section-padding" id="section_2" style="background: #f2f2f2;padding-bottom:50px;">
    <div class="container">
        <div class="row">
            <!-- <div class="col-12 text-center">
                <h2 class="mb-4">Featured Recipes</h1>
            </div> -->
            <div class="col-12 negative-margin">
                <div class="row">
                    <?php foreach ($featured_list as $key => $recipe_info) : ?>
                        <div class="col-md-4 col-sm-12 mb-4 mb-lg-0">
                            <div class="featured-card">
                                <div class="featured-card-content">
                                    <span class="featured-label"><i class="bi-star-fill"></i> Featured Recipe</span>
                                    <h3 class="featured-card-title">
                                        <?= $recipe_info['TITLE'] ?>
                                    </h3>
                                    <p class="featured-card-text">
                                        <span><i class="bi-clock"></i>&nbsp;<?= $recipe_info['PREP_TIME'] ?></span>
                                    </p>
                                    <a href="<?= base_url('/recipes/details?id=' . $recipe_info['ID']) ?>" class="featured-card-link">
                                        <span>Check Recipe</span>
                                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="featured-card-extra">
                                    <div class="wrapper">
                                        <p><?= $recipe_info['DETAILS'] ?></p>
                                    </div>
                                </div>
                                <img src="<?= $recipe_info['IMAGE'] ? base_url($recipe_info['IMAGE']) : base_url('/assets/main/images/home-banner1.jpg') ?>" alt="">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="section-padding" id="section_3" style="background-color: #f2f2f2;">
    <div class="container">
        <div class="row">
            <!-- <div class="col-12 text-center">
                <h2 class="mb-4">Featured Recipes</h1>
            </div> -->
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6 rotd-img" style="background-image: url(<?= $rotd_info['IMAGE'] != '' ? $rotd_info['IMAGE'] : '/assets/main/images/home-banner1.jpg' ?>);background-size: cover;min-height: 400px;background-position: center;border-radius: 10px;"></div>
                    <div class="col-md-6" style="align-self: center;">
                        <h5 class="text-blue ps-md-5">RECIPE OF THE DAY</h5>
                        <h3 class="ps-md-5"><?= $rotd_info['TITLE'] ?></h3>
                        <p class="ps-md-5"><?= $rotd_info['DETAILS'] ?></p>
                        <a href="<?= base_url('/recipes/details?id=' . $rotd_info['ID']) ?>" class="btn custom-btn ms-md-5">Check out Recipe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h5 class="text-blue mb-3 pl-3 text-center">Top 10 Recipes</h5>
                <div class="slick-carousel">
                    <?php foreach ($mv_list as $key => $recipe_info) : ?>
                        <div class="slick-carousel-item px-3">
                            <a href="" class="custom-card1">
                                <img src="<?= $recipe_info['IMAGE'] ? base_url($recipe_info['IMAGE']) : base_url('/assets/main/images/home-banner1.jpg') ?>" class="custom-card1-image" alt="" />
                                <div class="custom-card1-overlay">
                                    <div class="custom-card1-header">
                                        <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                            <path />
                                        </svg>
                                        <span class="counter"><?= $key + 1 ?></span>
                                        <div class="custom-card1-header-text">
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
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5 class="text-blue mb-3 pl-3 text-center">Recommended Recipes</h5>
                <div class="slick-carousel">
                    <div class="slick-carousel-item px-3">
                        <a href="" class="custom-card1">
                            <img src="/assets/main/images/home-banner1.jpg" class="custom-card1-image" alt="" />
                            <div class="custom-card1-overlay">
                                <div class="custom-card1-header text-center" style="width: 100%;">
                                    <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="custom-card1-header-text" style="line-height: 20px;width: 100%;">
                                        <span class="tag text-white" style="background-color: #00B0FF!important;"><i class="bi-check"></i> Highly Recommended</span>
                                        <h3 class="custom-card1-title mb-0">Baked Ala mode</h3>
                                        <span class="custom-card1-status"><span><i class="bi-clock"></i>&nbsp;1 Hr and 30 Mins</span></span>
                                    </div>
                                </div>
                                <p class="custom-card1-description">Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                            </div>
                        </a>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <a href="" class="custom-card1">
                            <img src="/assets/main/images/home-banner1.jpg" class="custom-card1-image" alt="" />
                            <div class="custom-card1-overlay">
                                <div class="custom-card1-header text-center" style="width: 100%;">
                                    <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="custom-card1-header-text" style="line-height: 20px;width: 100%;">
                                        <span class="tag text-white" style="background-color: #00B0FF!important;"><i class="bi-check"></i> Highly Recommended</span>
                                        <h3 class="custom-card1-title mb-0">Baked Ala mode</h3>
                                        <span class="custom-card1-status"><span><i class="bi-clock"></i>&nbsp;1 Hr and 30 Mins</span></span>
                                    </div>
                                </div>
                                <p class="custom-card1-description">Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                            </div>
                        </a>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <a href="" class="custom-card1">
                            <img src="/assets/main/images/home-banner1.jpg" class="custom-card1-image" alt="" />
                            <div class="custom-card1-overlay">
                                <div class="custom-card1-header text-center" style="width: 100%;">
                                    <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="custom-card1-header-text" style="line-height: 20px;width: 100%;">
                                        <span class="tag text-white" style="background-color: #00B0FF!important;"><i class="bi-check"></i> Highly Recommended</span>
                                        <h3 class="custom-card1-title mb-0">Baked Ala mode</h3>
                                        <span class="custom-card1-status"><span><i class="bi-clock"></i>&nbsp;1 Hr and 30 Mins</span></span>
                                    </div>
                                </div>
                                <p class="custom-card1-description">Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                            </div>
                        </a>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <a href="" class="custom-card1">
                            <img src="/assets/main/images/home-banner1.jpg" class="custom-card1-image" alt="" />
                            <div class="custom-card1-overlay">
                                <div class="custom-card1-header text-center" style="width: 100%;">
                                    <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="custom-card1-header-text" style="line-height: 20px;width: 100%;">
                                        <span class="tag text-white" style="background-color: #00B0FF!important;"><i class="bi-check"></i> Highly Recommended</span>
                                        <h3 class="custom-card1-title mb-0">Baked Ala mode</h3>
                                        <span class="custom-card1-status"><span><i class="bi-clock"></i>&nbsp;1 Hr and 30 Mins</span></span>
                                    </div>
                                </div>
                                <p class="custom-card1-description">Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                            </div>
                        </a>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <a href="" class="custom-card1">
                            <img src="/assets/main/images/home-banner1.jpg" class="custom-card1-image" alt="" />
                            <div class="custom-card1-overlay">
                                <div class="custom-card1-header text-center" style="width: 100%;">
                                    <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="custom-card1-header-text" style="line-height: 20px;width: 100%;">
                                        <span class="tag text-white" style="background-color: #00B0FF!important;"><i class="bi-check"></i> Highly Recommended</span>
                                        <h3 class="custom-card1-title mb-0">Baked Ala mode</h3>
                                        <span class="custom-card1-status"><span><i class="bi-clock"></i>&nbsp;1 Hr and 30 Mins</span></span>
                                    </div>
                                </div>
                                <p class="custom-card1-description">Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h5 class="text-blue mb-3 pl-3 text-center">Recently Opened Recipes</h5>
                <div class="slick-carousel-recent">
                    <div class="slick-carousel-item px-3">
                        <a href="" class="custom-card1">
                            <img src="/assets/main/images/home-banner1.jpg" class="custom-card1-image" alt="" />
                            <div class="custom-card1-overlay">
                                <div class="custom-card1-header text-center" style="width: 100%;">
                                    <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="custom-card1-header-text" style="line-height: 20px;width: 100%;">
                                        <h3 class="custom-card1-title mb-0">Baked Ala mode</h3>
                                        <span class="custom-card1-status"><span><i class="bi-clock"></i>&nbsp;1 Hr and 30 Mins</span></span>
                                    </div>
                                </div>
                                <p class="custom-card1-description">Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                            </div>
                        </a>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <a href="" class="custom-card1">
                            <img src="/assets/main/images/home-banner1.jpg" class="custom-card1-image" alt="" />
                            <div class="custom-card1-overlay">
                                <div class="custom-card1-header text-center" style="width: 100%;">
                                    <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="custom-card1-header-text" style="line-height: 20px;width: 100%;">
                                        <h3 class="custom-card1-title mb-0">Baked Ala mode</h3>
                                        <span class="custom-card1-status"><span><i class="bi-clock"></i>&nbsp;1 Hr and 30 Mins</span></span>
                                    </div>
                                </div>
                                <p class="custom-card1-description">Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                            </div>
                        </a>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <a href="" class="custom-card1">
                            <img src="/assets/main/images/home-banner1.jpg" class="custom-card1-image" alt="" />
                            <div class="custom-card1-overlay">
                                <div class="custom-card1-header text-center" style="width: 100%;">
                                    <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="custom-card1-header-text" style="line-height: 20px;width: 100%;">
                                        <h3 class="custom-card1-title mb-0">Baked Ala mode</h3>
                                        <span class="custom-card1-status"><span><i class="bi-clock"></i>&nbsp;1 Hr and 30 Mins</span></span>
                                    </div>
                                </div>
                                <p class="custom-card1-description">Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                            </div>
                        </a>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <a href="" class="custom-card1">
                            <img src="/assets/main/images/home-banner1.jpg" class="custom-card1-image" alt="" />
                            <div class="custom-card1-overlay">
                                <div class="custom-card1-header text-center" style="width: 100%;">
                                    <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="custom-card1-header-text" style="line-height: 20px;width: 100%;">
                                        <h3 class="custom-card1-title mb-0">Baked Ala mode</h3>
                                        <span class="custom-card1-status"><span><i class="bi-clock"></i>&nbsp;1 Hr and 30 Mins</span></span>
                                    </div>
                                </div>
                                <p class="custom-card1-description">Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                            </div>
                        </a>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <a href="" class="custom-card1">
                            <img src="/assets/main/images/home-banner1.jpg" class="custom-card1-image" alt="" />
                            <div class="custom-card1-overlay">
                                <div class="custom-card1-header text-center" style="width: 100%;">
                                    <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="custom-card1-header-text" style="line-height: 20px;width: 100%;">
                                        <h3 class="custom-card1-title mb-0">Baked Ala mode</h3>
                                        <span class="custom-card1-status"><span><i class="bi-clock"></i>&nbsp;1 Hr and 30 Mins</span></span>
                                    </div>
                                </div>
                                <p class="custom-card1-description">Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                            </div>
                        </a>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <a href="" class="custom-card1">
                            <img src="/assets/main/images/home-banner1.jpg" class="custom-card1-image" alt="" />
                            <div class="custom-card1-overlay">
                                <div class="custom-card1-header text-center" style="width: 100%;">
                                    <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="custom-card1-header-text" style="line-height: 20px;width: 100%;">
                                        <h3 class="custom-card1-title mb-0">Baked Ala mode</h3>
                                        <span class="custom-card1-status"><span><i class="bi-clock"></i>&nbsp;1 Hr and 30 Mins</span></span>
                                    </div>
                                </div>
                                <p class="custom-card1-description">Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                            </div>
                        </a>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <a href="" class="custom-card1">
                            <img src="/assets/main/images/home-banner1.jpg" class="custom-card1-image" alt="" />
                            <div class="custom-card1-overlay">
                                <div class="custom-card1-header text-center" style="width: 100%;">
                                    <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="custom-card1-header-text" style="line-height: 20px;width: 100%;">
                                        <span class="tag text-white" style="background-color: #00B0FF!important;"><i class="bi-check"></i> Highly Recommended</span>
                                        <h3 class="custom-card1-title mb-0">Baked Ala mode</h3>
                                        <span class="custom-card1-status"><span><i class="bi-clock"></i>&nbsp;1 Hr and 30 Mins</span></span>
                                    </div>
                                </div>
                                <p class="custom-card1-description">Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                            </div>
                        </a>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <a href="" class="custom-card1">
                            <img src="/assets/main/images/home-banner1.jpg" class="custom-card1-image" alt="" />
                            <div class="custom-card1-overlay">
                                <div class="custom-card1-header text-center" style="width: 100%;">
                                    <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="custom-card1-header-text" style="line-height: 20px;width: 100%;">
                                        <span class="tag text-white" style="background-color: #00B0FF!important;"><i class="bi-check"></i> Highly Recommended</span>
                                        <h3 class="custom-card1-title mb-0">Baked Ala mode</h3>
                                        <span class="custom-card1-status"><span><i class="bi-clock"></i>&nbsp;1 Hr and 30 Mins</span></span>
                                    </div>
                                </div>
                                <p class="custom-card1-description">Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                            </div>
                        </a>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <a href="" class="custom-card1">
                            <img src="/assets/main/images/home-banner1.jpg" class="custom-card1-image" alt="" />
                            <div class="custom-card1-overlay">
                                <div class="custom-card1-header text-center" style="width: 100%;">
                                    <svg class="custom-card1-arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="custom-card1-header-text" style="line-height: 20px;width: 100%;">
                                        <span class="tag text-white" style="background-color: #00B0FF!important;"><i class="bi-check"></i> Highly Recommended</span>
                                        <h3 class="custom-card1-title mb-0">Baked Ala mode</h3>
                                        <span class="custom-card1-status"><span><i class="bi-clock"></i>&nbsp;1 Hr and 30 Mins</span></span>
                                    </div>
                                </div>
                                <p class="custom-card1-description">Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding" style="background-color: #f2f2f2;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5 class="text-blue text-center">Check Out Other Recipes</h5>
                <ul class="nav nav-tabs custom-tabs" id="myTab" role="tablist">
                    <?php foreach ($random_categs as $key => $category_info) : ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?= $key == 0 ? 'active' : '' ?> rand_category-tab" type="button" data-id="<?= $category_info['ID'] ?>"><?= $category_info['LABEL'] ?></button>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content mb-4 rand_category-recipes" style="background: transparent;">
                    <div class="tab-pane fade show active" id="Category1" role="tabpanel" tabindex="0">
                        <!-- contents here -->
                    </div>
                </div>
                <div class="text-center mt-5">
                    <a href="<?= base_url('/recipes') ?>" class="btn custom-btn">View All Recipe</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>