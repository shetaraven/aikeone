<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(5);
?>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
    <ul class="pagination justify-content-center m-10">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item first">
                <a class="page-link" href="<?= $pager->getFirst() ?>">
                    <i class="tf-icon bx bx-chevrons-left bx-sm"></i>
                </a>
            </li>

            <li class="page-item prev">
                <a class="page-link" href="<?= $pager->getPrevious() ?>">
                    <i class="tf-icon bx bx-chevron-left bx-sm"></i>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li class="page-item next">
                <a class="page-link" href="<?= $pager->getNext() ?>">
                    <i class="tf-icon bx bx-chevron-right bx-sm"></i>
                </a>
            </li>

            <li class="page-item last">
                <a class="page-link" href="<?= $pager->getLast() ?>">
                    <i class="tf-icon bx bx-chevrons-right bx-sm"></i>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>