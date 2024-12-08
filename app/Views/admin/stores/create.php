<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>
<div class="content-wrapper form-create_store">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">
                Create New Store
            </h5>

            <div class="card-body">
                <div class="mb-3">
                    <label for="csi-name" class="form-label">Store Name</label>
                    <input type="text" class="form-control" id="csi-name">
                </div>
                <div>
                    <label for="csi-comment" class="form-label">Comment</label>
                    <textarea class="form-control" id="csi-comment" rows="5"></textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="button" class="btn btn-primary cs_action-create">
                    <span class="tf-icons bx bx-plus-circle me-2"></span>Create Store
                </button>
            </div>
        </div>
    </div>
    <div class="content-backdrop fade"></div>

</div>

<div class="bs-toast toast fade bg-primary" id="success-alert" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed;right: 3%;bottom:3%;">
<div class="toast-header">
    <i class="bx bx-bell me-2"></i>
    <div class="me-auto fw-medium">Success</div>
    <!-- <small>11 mins ago</small> -->
    <!-- <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button> -->
</div>
<div class="toast-body">
    Store Successfully Created!
</div>
</div>
<?= $this->endSection() ?>