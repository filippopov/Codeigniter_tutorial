<?= validation_errors() ?>
<?= form_open_multipart('users/sign_up'); ?>
<fieldset>
    <legend><?= $title ?></legend>
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-12">
            <input type="text" class="form-control-plaintext" id="name" placeholder="Username" name="name">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-12">
            <input type="email" class="form-control-plaintext" id="email" placeholder="Email" name="email">
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-12">
            <input type="password" class="form-control-plaintext" id="password" placeholder="Password" name="password">
        </div>
    </div>
    <div class="form-group row">
        <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
        <div class="col-sm-12">
            <input type="password" class="form-control-plaintext" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Sign up</button>
</fieldset>
<?= form_close()?>
