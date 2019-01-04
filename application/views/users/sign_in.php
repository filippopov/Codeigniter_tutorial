<?= validation_errors() ?>
<?= form_open_multipart('users/sign_in'); ?>
    <fieldset>
        <legend><?= $title ?></legend>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-12">
                <input type="text" class="form-control-plaintext" id="name" placeholder="Username" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-12">
                <input type="password" class="form-control-plaintext" id="password" placeholder="Password" name="password">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Sign in</button>
    </fieldset>
<?= form_close()?>