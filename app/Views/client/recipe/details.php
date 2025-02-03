<?= $this->extend('layouts/client/main') ?>
<?= $this->section('content') ?>

<div class="details-banner pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-3" style="position: relative;">
                <a href="" class="back-btn action-go_back"><i class="bi-arrow-left" style="margin-right: 5px;"></i>Back to list</a>
                <h1 class="h1" style="font-weight: 900;"><?= $recipe_info['TITLE'] ?></h1>
                <i class="bi-bookmark-heart<?= $is_favorite ? '-fill' : '' ?> bookmark-btn" alt="Bookmark" data-rid="<?= $recipe_info['ID'] ?>" data-fav="<?= $is_favorite ? 1 : 0 ?>"></i>
            </div>
        </div>
    </div>
    <div class="banner-img-section" style="background-image: url(<?= $recipe_info['IMAGE'] ? base_url($recipe_info['IMAGE']) : base_url('/assets/main/images/home-banner1.jpg') ?>);">
        <div class="container">
            <div class="row">
                <div class="col-12" style="min-height: 500px;position: relative;">
                    <div class="floating-callout">
                        <div class="flex-line mb-2">
                            <div class="icon-cont">
                                <i class="bi-tags" style="margin-right: 5px;"></i>
                            </div>
                            <div class="details-cont">
                                <p class="mb-0">Tags</p>
                                <?php foreach ($recipe_categories as $key => $rc_info) : ?>
                                    <p class="mb-0"><?= $rc_info['LABEL'] ?></p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="flex-line mb-2">
                            <div class="icon-cont">
                                <i class="bi-fire" style="margin-right: 5px;"></i>
                            </div>
                            <div class="details-cont">
                                <p class="mb-0">Calories</p>
                                <p class="mb-0">615 kcal</p>
                            </div>
                        </div>
                        <div class="flex-line mb-2">
                            <div class="icon-cont">
                                <i class="bi-stopwatch" style="margin-right: 5px;"></i>
                            </div>
                            <div class="details-cont">
                                <p class="mb-0">Time</p>
                                <p class="mb-0"><?= $recipe_info['PREP_TIME'] ?></p>
                            </div>
                        </div>
                        <div class="flex-line">
                            <div class="icon-cont">
                                <i class="bi-cup-straw" style="margin-right: 5px;"></i>
                            </div>
                            <div class="details-cont">
                                <p class="mb-0">Servings</p>
                                <p class="mb-0" id="servings-count"><?= $recipe_info['SERVINGS'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <p style="text-align: center;max-width: 700px;margin: auto;"> <?= $recipe_info['DETAILS'] ?> </p>
            </div>

            <div class="container">
                <div class="row">

                    <div class="col-md-4 col-12 mb-4 mb-lg-0">
                        <div class="ingreds-block">
                            <div class="head-block h5">
                                Ingredients:
                            </div>
                            <ul class="list-block">
                                <?php foreach ($recipe_ingredients as $key => $ringreds_info) : ?>
                                    <li><b><?= $ringreds_info['VOLUME'] ?> <?= $ringreds_info['UNIT_MEASURE_LABEL'] ?></b> <?= $ringreds_info['NAME'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="ingreds-block mt-5" id="tools-section">
                            <div class="head-block h5">
                                Tools:
                            </div>
                            <ul class="list-block">
                                <li>
                                    <a class="modal_open" data-rid="<?= $recipe_info['ID'] ?>" data-type="0" href="#" data-target="ingreds-modal">
                                        <i class="bi-calculator" style="margin-right: 5px;"></i>Ingredient Price List
                                    </a>
                                </li>
                                <li>
                                    <a class="modal_open" data-rid="<?= $recipe_info['ID'] ?>" data-type="1" href="#" data-target="calorie-modal">
                                        <i class="bi-fire" style="margin-right: 5px;"></i>Calorie List
                                    </a>
                                </li>
                                <li>
                                    <a class="modal_open" data-rid="<?= $recipe_info['ID'] ?>" data-type="2" href="#" data-target="serving-modal">
                                        <i class="bi-calculator" style="margin-right: 5px;"></i>Serving Calculator
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="container" id="ingreds-modal">
                            <div class="popup">
                                <div class="popup-inner horizontal">
                                    <div class="popup__photo">
                                        <img src="https://images.unsplash.com/photo-1515182629504-727d7753751f?q=80&w=1036&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                    </div>
                                    <div class="popup__text">
                                        <!-- <div class="title-block">
                                            <div class="sub-block">
                                                <p class="sub-title"><i class="bi-cash" style="margin-right: 5px;"></i>Select Currency:</p>
                                                <select class="selectpicker" data-size="4">
                                                    <option value="PHP">PHP</option>
                                                    <option value="SEK" selected>SEK</option>
                                                </select>
                                            </div>
                                            <div class="sub-block">
                                                <p class="sub-title"><i class="bi-calculator" style="margin-right: 5px;"></i>Total Ingredient Cost:</p>
                                                <p class="big-text">1000 PHP</p>
                                            </div>
                                        </div> -->
                                        <h3 class="text-center">Price List on our Record</h3>
                                        <p class="text-center mb-5" style="margin: auto;max-width: 700px;"><strong>Note:</strong> The prices indicated in the table are based on our own research and may vary from the actual prices at the time of purchase. Please check with the relevant providers for the most accurate and up-to-date information.</p>

                                        <div style="text-align: right;">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="convert_php">
                                                <label class="form-check-label" for="convert_php">Convert to PHP</label>
                                            </div>
                                        </div>

                                        <table class="responsive append_area">
                                            <!-- contents here -->
                                        </table>
                                    </div>
                                    <a class="popup__close" href="#">X</a>
                                </div>
                            </div>
                        </div>

                        <div class="container" id="calorie-modal">
                            <div class="popup">
                                <div class="popup-inner horizontal">
                                    <div class="popup__photo p-4" style="background-color: #e6efef;height: auto;">
                                        <!-- <img src="https://www.simplyrecipes.com/thmb/OxV-yFV0VvfSdlpdQukYOaB4VU4=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Simply-Recipes-Pyrex-Love-Letter-LEAD-02-88172516204a4fdeb5f2e7465d613bd3.jpg" alt=""> -->
                                        <h3 class="text-center">Nutritional Facts</h3>
                                        <p class="text-center mb-0" style="color: #393939;
                                        max-width: 700px;
                                        margin: auto;
                                        line-height: 18px;
                                        font-size: 13px;"><strong>Note:</strong> The nutritional values provided are based on our own calculations and may differ from those of other sources. Actual values may vary depending on portion sizes, ingredient variations, and preparation methods. Always consult a nutritionist or dietitian for precise information.</p>
                                    </div>
                                    <div class="popup__text append_area">
                                        <!-- contents here -->
                                    </div>
                                    <a class="popup__close" href="#">X</a>
                                </div>
                            </div>
                        </div>

                        <div class="container" id="serving-modal">
                            <div class="popup">
                                <div class="popup-inner horizontal">
                                    <div class="popup__photo">
                                        <img src="https://assets.clevelandclinic.org/transform/LargeFeatureImage/2b717449-8fbb-43a1-97ad-1a967322caa4/biggerPortionFoods-959837024-770x553_jpg" alt="">
                                    </div>
                                    <div class="popup__text text-center">

                                        <h3 class="text-center mb-3">Servings Calculator</h3>
                                        <p class="text-center mb-5" style="max-width: 700px;margin-left: auto;margin-right: auto;">Note: The details provided are not entirely accurate. Information may vary and requires further clarification. Adjustments or updates may be needed for accuracy.</p>

                                        <form class="servings-wrapper cf">
                                            <input type="number" placeholder="Enter new serving to calculate" required style="box-shadow: none">
                                            <button id="calculate-serv">Generate</button>
                                        </form>

                                        <table class="responsive">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Ingredient</th>
                                                    <th scope="col">Original Volume</th>
                                                    <th scope="col">Volume for <span class="no_servings">---</span> serving/s</th>
                                                </tr>
                                            </thead>
                                            <tbody class="append_area">
                                                <!-- contents here -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <a class="popup__close" href="#">X</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-8 col-12 mb-4 mb-lg-0 pl-md-5 pl-1">
                        <h4 class="mb-3 text-center">Recipe Steps</h4>
                        <div class="timeline-container" id="single-layout">
                            <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                <div class="list-progress" style="height: calc(100% - (100%/5) + 40px);">
                                    <div class="inner"></div>
                                </div>

                                <?php foreach ($recipe_instructions as $key => $rinst_info) : ?>
                                    <li>
                                        <p><?= $rinst_info['DESCRIPTION'] ?></p>
                                        <div class="icon-holder">
                                            <span><?= $rinst_info['ORDER'] ?></span>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!-- <div class="accordion" id="multiple-layout" style="display: none;">
                            <div class="accordion-item" style="border: none;">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: var(--primary-color);font-weight: 900;border-radius: 50px;">
                                        Part 1 : Lorem Ipsum Doler Simut
                                    </button>
                                </h2>

                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#multiple-layout">
                                    <div class="accordion-body">
                                        <p><span style="color: #454545;font-weight: 900;font-family: 'Montserrat';font-size: 14px;">Step 1: </span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint animi necessitatibus aperiam repudiandae
                                            nam omnis est vel quo, nihil repellat quia velit error modi earum similique odit labore.Doloremque, repudiandae?
                                        </p>
                                        <p><span style="color: #454545;font-weight: 900;font-family: 'Montserrat';font-size: 14px;">Step 2: </span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint animi necessitatibus aperiam repudiandae
                                            nam omnis est vel quo, nihil repellat quia velit error modi earum similique odit labore.Doloremque, repudiandae?
                                        </p>
                                        <p><span style="color: #454545;font-weight: 900;font-family: 'Montserrat';font-size: 14px;">Step 3: </span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint animi necessitatibus aperiam repudiandae
                                            nam omnis est vel quo, nihil repellat quia velit error modi earum similique odit labore.Doloremque, repudiandae?
                                        </p>
                                        <p><span style="color: #454545;font-weight: 900;font-family: 'Montserrat';font-size: 14px;">Step 4: </span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint animi necessitatibus aperiam repudiandae
                                            nam omnis est vel quo, nihil repellat quia velit error modi earum similique odit labore.Doloremque, repudiandae?
                                        </p>
                                        <p><span style="color: #454545;font-weight: 900;font-family: 'Montserrat';font-size: 14px;">Step 5: </span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint animi necessitatibus aperiam repudiandae
                                            nam omnis est vel quo, nihil repellat quia velit error modi earum similique odit labore.Doloremque, repudiandae?
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" style="border: none;">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: var(--primary-color);font-weight: 900;border-radius: 50px;">
                                        Part 2 : Lorem Ipsum Doler Simut
                                    </button>
                                </h2>

                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#multiple-layout">
                                    <div class="accordion-body">
                                        <p><span style="color: #454545;font-weight: 900;font-family: 'Montserrat';font-size: 14px;">Step 1: </span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint animi necessitatibus aperiam repudiandae
                                            nam omnis est vel quo, nihil repellat quia velit error modi earum similique odit labore.Doloremque, repudiandae?
                                        </p>
                                        <p><span style="color: #454545;font-weight: 900;font-family: 'Montserrat';font-size: 14px;">Step 2: </span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint animi necessitatibus aperiam repudiandae
                                            nam omnis est vel quo, nihil repellat quia velit error modi earum similique odit labore.Doloremque, repudiandae?
                                        </p>
                                        <p><span style="color: #454545;font-weight: 900;font-family: 'Montserrat';font-size: 14px;">Step 3: </span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint animi necessitatibus aperiam repudiandae
                                            nam omnis est vel quo, nihil repellat quia velit error modi earum similique odit labore.Doloremque, repudiandae?
                                        </p>
                                        <p><span style="color: #454545;font-weight: 900;font-family: 'Montserrat';font-size: 14px;">Step 4: </span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint animi necessitatibus aperiam repudiandae
                                            nam omnis est vel quo, nihil repellat quia velit error modi earum similique odit labore.Doloremque, repudiandae?
                                        </p>
                                        <p><span style="color: #454545;font-weight: 900;font-family: 'Montserrat';font-size: 14px;">Step 5: </span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint animi necessitatibus aperiam repudiandae
                                            nam omnis est vel quo, nihil repellat quia velit error modi earum similique odit labore.Doloremque, repudiandae?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                </div>
            </div>

            <div class="rotd">
                <div class="mg">
                    <div class="clr"></div>
                    <div class="group">
                        <span>Featured</span>
                    </div>
                </div>
                <div class="av" style="background-image: url(<?= base_url('/assets/main/images/home-banner1.jpg') ?>);"></div>
                <div class="info">
                    <deets>
                        Recipe of the Day!
                    </deets>
                    <name>Recipe Name</name>
                </div>
                <a class="plot" title="plot with jinkyu" href="/">
                    View Recipe →
                </a>
            </div>

        </div>
    </div>
</div>

<?php if (!empty($recipe_categories)) : ?>
    <section class="py-5" style="background-color: #f2f2f2;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="text-blue text-center">Some Related Recipes</h5>
                    <ul class="nav nav-tabs custom-tabs" id="myTab" role="tablist">
                        <?php foreach ($recipe_categories as $key => $category_info) : ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?= $key == 0 ? 'active' : '' ?> rand_category-tab" type="button" data-id="<?= $category_info['CATEGORY_ID'] ?>"><?= $category_info['LABEL'] ?></button>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content mb-4 rand_category-recipes" style="background: transparent;">
                        <div class="tab-pane fade show active" id="Category1" role="tabpanel" tabindex="0">
                            <!-- contents here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<button class="custom_share" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Share Recipe&nbsp;&nbsp;<i class="bi-share"></i></button>

<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header pt-5 pb-0" style="justify-content: center;">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel" style="font-family: system-ui; color: #404948;">Share This Recipe Now!</h5>
        <button type="button" class="btn-close custom_share" data-bs-dismiss="offcanvas" aria-label="Close">Share Recipe&nbsp;&nbsp;<i class="bi-share"></i></button>
    </div>
    <div class="offcanvas-body small pt-1" style="display: flex;align-items: center;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-1"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url() . 'recipes/detailsid=' . $recipe_info['ID'] ?>" style="width: 100%;background-color: #316FF6; color: #fff;text-align: center;padding: 10px 10px;font-size: 1.5em;border-radius: 6px;"><i class="bi-facebook"></i>&nbsp;FACEBOOK</a></div>
                <div class="col-md-3 mb-1"><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?= base_url('recipes/detailsid=' . $recipe_info['ID']) ?>&media=<?= $recipe_info['IMAGE'] ? base_url($recipe_info['IMAGE']) : base_url('/assets/main/images/home-banner1.jpg') ?>" style="width: 100%;background-color: #bd081c; color: #fff;text-align: center;padding: 10px 10px;font-size: 1.5em;border-radius: 6px;"><i class="bi-pinterest"></i>&nbsp;PINTEREST</a></div>
                <div class="col-md-3 mb-1"><a target="_blank" href="https://twitter.com/intent/tweet?text=<?= base_url() . 'recipes/detailsid=' . $recipe_info['ID'] ?>" style="width: 100%;background-color: #1da1f2; color: #fff;text-align: center;padding: 10px 10px;font-size: 1.5em;border-radius: 6px;"><i class="bi-twitter"></i>&nbsp;TWITTER</a></div>
                <div class="col-md-3"><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?= base_url() . 'recipes/detailsid=' . $recipe_info['ID'] ?>" style="width: 100%;background-color: #0077b5; color: #fff;text-align: center;padding: 10px 10px;font-size: 1.5em;border-radius: 6px;"><i class="bi-linkedin"></i>&nbsp;LINKED IN</a></div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>