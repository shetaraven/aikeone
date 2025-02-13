<?= $this->include('layouts/admin/header') ?>

<?= $this->include('layouts/admin/aside') ?>

<!-- Render the dynamic content from different pages -->
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
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
                    <!-- <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <i class="bx bx-search bx-md"></i>
                            <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search..." />
                        </div>
                    </div> -->
                    <!-- /Search -->
                    <h5 class="mb-0"><?= $title ?></h5>

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="<?=session()->get('IMAGE')?>" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <div class="d-flex p-3">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar avatar-online">
                                                <img src="<?=session()->get('IMAGE')?>" alt class="w-px-40 h-auto rounded-circle" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0"><?=session()->get('GIVEN_NAME')?></h6>
                                            <small class="text-muted"><?=session()->get('USER_TYPE_LABEL')?></small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider my-1"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?=base_url('auth/logout')?>">
                                        <i class="bx bx-power-off bx-md me-3"></i><span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- / Navbar -->

            <?= $this->renderSection('content') ?>

            <footer class="footer bg-light" style="width: 86%;margin: 0 auto 20px;border-radius: 10px;background: #f9f6f5!important;">
                <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-4">
                    <div>
                        &copy; <?= date('Y') ?> Recette by Storm. All rights reserved.
                    </div>
                    <div>
                        <a href="<?=base_url('auth/logout')?>" class="btn btn-sm btn-outline-danger"><i class="bx bx-log-out-circle me-1"></i>Logout</a>
                    </div>
                </div>
            </footer>
        </div>

    </div>
</div>


<?= $this->include('layouts/admin/footer') ?>