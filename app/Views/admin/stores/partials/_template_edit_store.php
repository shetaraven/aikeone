<div class="template-edit_store form-create_store">
    <div class="alert alert-danger alert-dismissible" role="alert" id="warningTop" style="display: none;">
        <span>Store Name Already Existing!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="required">
        <label for="store-name" class="form-label">Store Name <span class="error-msg">* Required Field!</span></label>
        <input type="text" class="form-control esi-name" value="<?=$store_info['NAME']?>">
    </div>
    <div>
        <label for="store-comment" class="form-label">Comment</label>
        <textarea class="form-control esi-comment" rows="5"><?=$store_info['COMMENT']?></textarea>
    </div>
</div>