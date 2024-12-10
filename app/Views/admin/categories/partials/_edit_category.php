<div class="template-edit_rc form-edit_rc">
    <div class="alert alert-danger alert-dismissible" role="alert" id="warningTop" style="display: none;">
        <span>Store Name Already Existing!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="required">
        <label for="store-label" class="form-label">Label<span class="error-msg">* Required Field!</span></label>
        <input type="text" class="form-control erci-label" value="<?= $rc_info['LABEL'] ?>">
    </div>
    <div>
        <label for="store-description" class="form-label">Description</label>
        <textarea class="form-control erci-description" rows="5"><?= $rc_info['DESCRIPTION'] ?></textarea>
    </div>
</div>