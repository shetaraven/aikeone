<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(3);
?>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
    <ul class="pagination justify-content-center m-10">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item first">
                <a class="page-link default" href="<?= $pager->getFirst() ?>">
                    First
                </a>
            </li>

            <li class="page-item prev">
                <a class="page-link" href="<?= $pager->getPrevious() ?>">
                    Prev
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
                    Next
                </a>
            </li>

            <li class="page-item last">
                <a class="page-link default" href="<?= $pager->getLast() ?>">
                    Last
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>