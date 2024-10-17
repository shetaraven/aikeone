<?= $this->include('layouts/header') ?>

<!-- Render the dynamic content from different pages -->
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="index.html" class="app-brand-link">
                    <img src="<?= base_url('assets/admin/img/aikeone-logo.svg') ?>" class="official-logo" style="width: 25px;" />
                    <span class="app-brand-text demo menu-text fw-bold ms-2">AikeOne</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item active open">
                    <a href="index.html" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-smile"></i>
                        <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                    </a>
                </li>

                <!-- Recipe Creator Tool -->
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">RECIPE TOOLS</span>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-food-menu"></i>
                        <div class="text-truncate" data-i18n="Layouts">Recipes</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="recipes.html" class="menu-link">
                                <div class="text-truncate" data-i18n="Without menu">Recipe List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="create-recipe.html" class="menu-link">
                                <div class="text-truncate" data-i18n="Without navbar">Create New Recipe</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Ingredient Creator Tools -->
                <li class="menu-header small text-uppercase"><span class="menu-header-text">INGREDIENT TOOLS</span></li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-baguette"></i>
                        <div class="text-truncate" data-i18n="Layouts">Ingredients</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="ingredients.html" class="menu-link">
                                <div class="text-truncate" data-i18n="Without menu">Ingredient List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="create-ingredients.html" class="menu-link">
                                <div class="text-truncate" data-i18n="Without navbar">Create New Ingredient</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-store"></i>
                        <div class="text-truncate" data-i18n="Layouts">Stores</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="stores.html" class="menu-link">
                                <div class="text-truncate" data-i18n="Without menu">Store List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="create-stores.html" class="menu-link">
                                <div class="text-truncate" data-i18n="Without navbar">Create New Store</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- USERS -->
                <li class="menu-header small text-uppercase"><span class="menu-header-text">USERS</span></li>
                <li class="menu-item">
                    <a href="users.html" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user-check"></i>
                        <div class="text-truncate" data-i18n="Dashboards">User List</div>
                    </a>
                </li>

                <!-- Misc -->
                <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
                <li class="menu-item">
                    <a href="contact-us.html" target="_blank" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-support"></i>
                        <div class="text-truncate" data-i18n="Support">Support</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="html/index.html" target="_blank" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-wrench"></i>
                        <div class="text-truncate" data-i18n="Support">Documentation</div>
                    </a>
                </li>
            </ul>
        </aside>
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                        <i class="bx bx-menu bx-md"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <i class="bx bx-search bx-md"></i>
                            <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search..." />
                        </div>
                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="<?= base_url('assets/admin/img/avatars/1.png') ?>" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar avatar-online">
                                                <img src="<?= base_url('assets/admin/img/avatars/1.png') ?>" alt class="w-px-40 h-auto rounded-circle" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">John Doe</h6>
                                            <small class="text-muted">Admin</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider my-1"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->

<?= $this->renderSection('content') ?>

<?= $this->include('layouts/footer') ?>