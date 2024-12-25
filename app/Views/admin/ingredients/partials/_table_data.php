<?php foreach ($ingredients_list as $key => $ingred_info) : ?>
    <tr>
        <td><?= $ingred_info['NAME'] ?></td>
        <td><?= $ingred_info['CREATOR'] ?></td>
        <td><?= $ingred_info['CREATED_AT'] ?></td>
        <td><?= $ingred_info['UPDATOR'] ?></td>
        <td><?= $ingred_info['UPDATED_AT'] ?></td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <button type="button" class="dropdown-item ita-edit" data-id="<?= $ingred_info['ID'] ?>"><i class="bx bx-edit-alt me-1 "></i> Edit</button>
                    <button type="button" class="dropdown-item ita-delete" data-id="<?= $ingred_info['ID'] ?>"><i class="bx bx-trash me-1"></i> Delete</button>
                </div>
            </div>
        </td>
    </tr>
<?php endforeach; ?>