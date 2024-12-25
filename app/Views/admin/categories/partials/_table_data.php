<?php foreach ($category_list as $key => $category) : ?>
    <tr>
        <td><?= $category['LABEL'] ?></td>
        <td><?= $category['DESCRIPTION'] ?></td>
        <td><?= $category['CREATOR'] ?></td>
        <td><?= $category['CREATED_AT'] ?></td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <button class="dropdown-item rcta-edit" data-id="<?= $category['ID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                    <button class="dropdown-item rcta-delete" data-id="<?= $category['ID'] ?>"><i class="bx bx-trash me-1"></i> Delete</button>
                </div>
            </div>
        </td>
    </tr>
<?php endforeach; ?>