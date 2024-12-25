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