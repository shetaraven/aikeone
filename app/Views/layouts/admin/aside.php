<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <img src="<?= base_url('assets/admin/img/aikeone-logo.svg') ?>" class="official-logo" style="width: 25px;" />
            <span class="app-brand-text demo menu-text fw-bold ms-2">Recette <span>by Storm</span></span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <?php foreach ($menu_list as $key => $group_data) : ?>
            <li class="menu-header small text-uppercase"><span class="menu-header-text"><?= $group_data['group_name'] ?></span></li>
            <?php if (! empty($group_data['menu_list'])) : ?>
                <?php foreach ($group_data['menu_list'] as $ml_key => $menu_data) : ?>
                    <?php if (! empty($menu_data['CHILDREN'])) : ?>
                        <li class="menu-item <?=$menu_data['ACTIVE'] ? 'active open' : ''?>">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx <?= $menu_data['ICON'] ?>"></i>
                                <div class="text-truncate" data-i18n="Layouts"><?= $menu_data['NAME'] ?></div>
                            </a>
                            <ul class="menu-sub">
                                <?php foreach ($menu_data['CHILDREN'] as $ml_key => $child_data) : ?>
                                    <li class="menu-item <?=$child_data['ACTIVE'] ? 'active' : ''?>">
                                        <a href="<?= base_url($menu_data['ROUTE'] . $child_data['ROUTE']) ?>" class="menu-link">
                                            <div class="text-truncate" data-i18n="Without menu"><?= $child_data['NAME'] ?></div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php else : ?>
                        <!-- <li class="menu-item active open"> -->
                        <li class="menu-item <?=$menu_data['ACTIVE'] ? 'active open' : ''?>">
                            <a href="<?= base_url($menu_data['ROUTE']) ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx <?= $menu_data['ICON'] ?>"></i>
                                <div class="text-truncate" data-i18n="Dashboards"><?= $menu_data['NAME'] ?></div>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</aside>
<!-- Menu -->