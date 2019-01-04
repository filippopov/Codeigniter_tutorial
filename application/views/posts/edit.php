<?= validation_errors() ?>
<?= form_open('posts/edit/' . $post['slug']); ?>
    <fieldset>
        <legend><?= $title ?></legend>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-12">
                <input type="text" class="form-control-plaintext" id="title" placeholder="Post title" name="title" value="<?= $post['title']?>">
            </div>
        </div>

        <div class="form-group">
            <label for="editor1">Post</label>
            <textarea class="form-control" id="editor1" placeholder="Post body" rows="3" name="body"><?= $post['body']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category">
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>" <?php echo ($post['category_id'] == $category['id']) ? 'selected' : ''; ?>><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </fieldset>
<?= form_close()?>