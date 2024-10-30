<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>
<div class="content-wrapper form-create_store">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">
                Create New Store
            </h5>

            <div class="card-body">
                <div>
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
<?= $this->endSection() ?>