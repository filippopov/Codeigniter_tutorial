<?= validation_errors() ?>
<?= form_open_multipart('categories/create'); ?>
    <fieldset>
        <legend><?= $title ?></legend>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-12">
                <input type="text" class="form-control-plaintext" id="name" placeholder="Category name" name="name">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </fieldset>
<?= form_close()?>