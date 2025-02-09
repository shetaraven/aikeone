<?php foreach ($featured_list as $key => $featured_info) : ?>
    <li class="d-flex align-items-center mb-6">
        <div class="avatar flex-shrink-0 me-3">
            <img src="<?= $featured_info['IMAGE'] ? base_url($featured_info['IMAGE']) : base_url('/assets/main/images/home-banner1.jpg') ?>" style="width: 40px;height: 40px;object-fit: cover;" alt="User" class="rounded" />
        </div>
        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
            <div class="me-2">
                <small class="d-block"><?= $featured_info['TITLE'] ?></small>
                <h6 class="fw-normal mb-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?= mb_strimwidth($featured_info['DETAILS'], 0, 40, "...") ?></h6>
            </div>
            <div class="user-progress">
                <div class="dropdown">
                    <button class="btn text-muted p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded bx-lg"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                        <a class="dropdown-item btn-change_featured" href="javascript:void(0);" data-rid="<?= $featured_info['ID'] ?>" data-order="<?= $featured_info['FEATURED'] ?>">Change Featured</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php endforeach; ?>