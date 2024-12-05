<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">
                Recipe List
                <a href="<?= base_url('admin/recipes/form') ?>" style="float: right;">
                    <button type="button" class="btn btn-primary">
                        <span class="tf-icons bx bx-plus-circle me-2"></span>Create Recipe
                    </button>
                </a>
            </h5>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>TITILE</th>
                            <th>DETAILS</th>
                            <th>VISIBILITY</th>
                            <th>CREATED BY</th>
                            <th>CREATED AT</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($recipe_list as $key => $recipe_info) : ?>
                            <tr>
                                <td><?= $recipe_info['TITLE'] ?></td>
                                <td><?= $recipe_info['DETAILS'] ?></td>
                                <td>
                                    <span class="badge bg-label-<?= $recipe_info['VISIBILITY'] ? 'success' : 'primary' ?> me-1"><?= $recipe_info['VISIBILITY'] ? 'PUBLIC' : 'PRIVATE' ?></span>
                                </td>
                                <td><?= $recipe_info['CREATOR'] ?></td>
                                <td><?= $recipe_info['CREATED_AT'] ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item rta-edit" href="<?= base_url('admin/recipes/form?id=' . $recipe_info['ID']) ?>" data-id="<?= $recipe_info['ID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item rta-delete" data-id="<?= $recipe_info['ID'] ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="paginate">
                <?= $pager->links('admin', 'admin') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>