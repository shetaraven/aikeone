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

<section class="explore-section section-padding" id="section_2">
    <div class="container">
        <div class="row">
            <!-- <div class="col-12 text-center">
                <h2 class="mb-4">Featured Recipes</h1>
            </div> -->
            <div class="col-12 negative-margin" style="margin-top: -120px;">
                <div class="row">
                    <div class="col-md-4 col-sm-12 mb-4 mb-lg-0">
                        <div class="custom-block bg-white shadow-lg">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content">
                                    <span class="tag text-white"><i class="bi-star"></i> Featured Recipe</span>
                                    <h5 class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                    <!-- <span class="badge bg-design rounded-pill ms-auto">14</span> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 mb-4 mb-lg-0">
                        <div class="custom-block bg-white shadow-lg">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img2.jpg" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content">
                                    <span class="tag text-white"><i class="bi-star"></i> Featured Recipe</span>
                                    <h5 class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                    <!-- <span class="badge bg-design rounded-pill ms-auto">14</span> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 mb-lg-0">
                        <div class="custom-block bg-white shadow-lg">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img3.jpg" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content">
                                    <span class="tag text-white"><i class="bi-star"></i> Featured Recipe</span>
                                    <h5 class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                    <!-- <span class="badge bg-design rounded-pill ms-auto">14</span> -->
                                </div>
                            </a>
                        </div>
                    </div>
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
                    <div class="col-md-6 rotd-img" style="background-image: url(assets/main/images/recipes/recipe-img1.jpg);background-size: cover;min-height: 400px;background-position: center;border-radius: 10px;"></div>
                    <div class="col-md-6" style="align-self: center;">
                        <h5 class="text-blue ps-md-5">RECIPE OF THE DAY</h5>
                        <h3 class="ps-md-5">Homemade marshmallows with sugar powder.</h3>
                        <p class="ps-md-5">Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from
                            it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                        <a href="#" class="btn custom-btn ms-md-5">Check out Recipe</a>
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
                <h5 class="text-blue mb-3 pl-3">Top 10 Recipes</h5>
                <div class="slick-carousel">
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <h5 class="mb-2 custom-icon text-white">
                                        <span class="tag text-white mb-0 mr-2" style="vertical-align: bottom;background-color: #F9A826!important;">1</span>Baked Ala mode
                                    </h5>
                                    <p class="mb-0 text-white"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <h5 class="mb-2 custom-icon text-white"><span class="tag text-white mb-0 mr-2" style="vertical-align: bottom;background-color: #F9A826!important;">2</span>Baked Ala mode</h5>
                                    <p class="mb-0 text-white"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <h5 class="mb-2 custom-icon text-white"><span class="tag text-white mb-0 mr-2" style="vertical-align: bottom;background-color: #F9A826!important;">3</span>Baked Ala mode</h5>
                                    <p class="mb-0 text-white"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <h5 class="mb-2 custom-icon text-white">
                                        <span class="tag text-white mb-0 mr-2" style="vertical-align: bottom;background-color: #F9A826!important;">4</span>Baked Ala mode</h5>
                                    <p class="mb-0 text-white"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <h5 class="mb-2 custom-icon text-white"><span class="tag text-white mb-0 mr-2" style="vertical-align: bottom;background-color: #F9A826!important;">5</span>Baked Ala mode</h5>
                                    <p class="mb-0 text-white"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h5 class="text-blue mb-3 pl-3">Recommended Recipes</h5>
                <div class="slick-carousel">
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <span class="tag text-white" style="background-color: #00B0FF!important;"><i class="bi-check"></i> Highly Recommended</span>
                                    <h5 class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <span class="tag text-white" style="background-color: #00B0FF!important;"><i class="bi-check"></i> Highly Recommended</span>
                                    <h5 class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <span class="tag text-white" style="background-color: #00B0FF!important;"><i class="bi-check"></i> Highly Recommended</span>
                                    <h5 class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <span class="tag text-white" style="background-color: #00B0FF!important;"><i class="bi-check"></i> Highly Recommended</span>
                                    <h5 class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <span class="tag text-white" style="background-color: #00B0FF!important;"><i class="bi-check"></i> Highly Recommended</span>
                                    <h5 class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h5 class="text-blue mb-3 pl-3">Recently Opened Recipes</h5>
                <div class="slick-carousel-recent">
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" style="height: 250px;" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <h5 style="font-size: 16px;" class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white" style="font-size: 12px;"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" style="height: 250px;" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <h5 style="font-size: 16px;" class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white" style="font-size: 12px;"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" style="height: 250px;" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <h5 style="font-size: 16px;" class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white" style="font-size: 12px;"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" style="height: 250px;" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <h5 style="font-size: 16px;" class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white" style="font-size: 12px;"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" style="height: 250px;" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <h5 style="font-size: 16px;" class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white" style="font-size: 12px;"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" style="height: 250px;" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <h5 style="font-size: 16px;" class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white" style="font-size: 12px;"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" style="height: 250px;" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <h5 style="font-size: 16px;" class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white" style="font-size: 12px;"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" style="height: 250px;" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <h5 style="font-size: 16px;" class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white" style="font-size: 12px;"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="slick-carousel-item px-3">
                        <div class="custom-block bg-white">
                            <a href="topics-detail.html">
                                <img src="assets/main/images/recipes/recipe-img1.jpg" style="height: 250px;" class="custom-block-image img-fluid" alt="">
                                <div class="recipe-content px-3">
                                    <h5 style="font-size: 16px;" class="mb-2 custom-icon text-white">Baked Ala mode</h5>
                                    <p class="mb-0 text-white" style="font-size: 12px;"><i class="bi-clock"></i> 1 Hour and 30 Mins</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>