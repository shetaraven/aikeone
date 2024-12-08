<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Recette by Storm <?= '| ' . $title ?? 'Set Title' ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="/assets/main/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/main/css/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/main/css/style.css">
    <link href="/assets/main/css/page.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">

    <!-- css here -->
    <?php if (!empty($css)) : ?>
        <?php foreach ($css as $key => $path) : ?>
            <link rel="stylesheet" href="<?= base_url($path) ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body id="top">

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url() ?>">
                    <img src="/assets/admin/img/aikeone-logo.svg" class="official-logo" style="width: 25px;filter: invert();" />
                    <span class="header-logo">Recette <span>by Storm</span></span>
                </a>

                <div class="d-lg-none ms-auto">
                    <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="<?= base_url() ?>">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="<?= base_url('recipes') ?>">All Recipes</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="<?= base_url('profile/collections') ?>">Collections</a>
                        </li>

                        <?php if (session()->get('USER_TYPE_ID') == 1) : ?>
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="<?= base_url('admin') ?>">Dashboard</a>
                            </li>
                        <?php endif; ?>
                    </ul>

                    <div class="d-none d-lg-block dropdown">
                        <?php if (session()->get('GOOGLE_ID')) : ?>
                            <div class="d-flex">
                                <div class="avatar avatar-online">
                                    <img src="<?= session()->get('IMAGE') ?>" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </div>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                                        <i class="bx bx-power-off bx-md me-3"></i><span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        <?php else: ?>
                            <a href="#top" class="navbar-icon bi-person smoothscroll dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('auth/login') ?>">
                                        <i class="bx bx-power-off bx-md me-3"></i><span>Login</span>
                                    </a>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </nav>