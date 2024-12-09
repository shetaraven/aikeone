<div>
    <label class="form-label">Name</label>
    <input type="text" class="form-control" disabled value="<?=$user_info['GIVEN_NAME'] . " " . $user_info['FAMILY_NAME']?>">
</div>
<div class="mt-3">
    <label class="form-label">Email</label>
    <input type="text" class="form-control" disabled value="<?=$user_info['EMAIL']?>">
</div>
<div class="mt-3">
    <label for="select-user_type" class="form-label">User Type</label>
    <select class="form-select" id="select-user_type" aria-label="Default select example">
        <option selected="">Choose</option>
        <?php foreach ($user_types as $key => $ut_info) : ?>
            <option class="sut-option" value="<?= $ut_info['ID'] ?>" <?=$user_info['USER_TYPE_ID'] == $ut_info['ID'] ? 'selected' : ''?>><?= $ut_info['LABEL'] ?></option>
        <?php endforeach; ?>
    </select>
</div>