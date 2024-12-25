<?php foreach ($store_list as $key => $store_info) : ?>
    <tr>
        <td><?= $store_info['NAME'] ?></td>
        <td><?= $store_info['COMMENT'] ?></td>
        <td>
            <span class="badge bg-label-<?= $store_info['ACTIVE'] ? 'success' : 'primary' ?> me-1"><?= $store_info['ACTIVE'] ? 'ACTIVE' : 'INACTIVE' ?></span>
        </td>
        <td><?= $store_info['CREATOR'] ?></td>
        <td><?= $store_info['CREATED_AT'] ?></td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <button class="dropdown-item sta-edit" data-id="<?= $store_info['ID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                    <button class="dropdown-item sta-delete" data-id="<?= $store_info['ID'] ?>"><i class="bx bx-trash me-1"></i> Delete</button>
                </div>
            </div>
        </td>
    </tr>
<?php endforeach; ?>