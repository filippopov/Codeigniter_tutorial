<h2><?= $post['title'] ?></h2>
<small class="post-date">Posted on: <?= $post['created_at']?></small><br>

<img style="width: 100px" src="<?= site_url('assets/images/posts/' . $post['post_image'])?>" alt="">
<p class="post-body">
    <?= $post['body']?>
</p>

<?php if (isset($this->session->userdata['user_id']) && $this->session->userdata['user_id'] === $post['user_id']) : ?>
    <a href="<?= site_url('posts/edit/' . $post['slug'])?>" class="btn btn-default float-left">Edit</a>
    <?= form_open('posts/delete/' . $post['id']); ?>
        <input type="submit" value="Delete" class="btn btn-danger">
    <?= form_close(); ?>
<?php endif; ?>
<hr>
<h4>Comments</h4>
<?php foreach ($comments as $comment) : ?>
    <div class="well">
        <div>From: <strong><?= $comment['name']?></strong></div>
        <p><?= $comment['body'] ?></p>
    </div>
<?php endforeach; ?>
<hr>

<?php if (isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']) : ?>
    <h4>Add Comment</h4>
    <?= validation_errors() ?>
    <?= form_open('comments/create/' . $post['slug']); ?>
    <fieldset>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-12">
                <input type="text" class="form-control-plaintext" id="name" placeholder="Your Name" name="name">
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-12">
                <input type="email" class="form-control-plaintext" id="email" placeholder="Your Email" name="email">
            </div>
        </div>

        <div class="form-group">
            <label for="editor1">Comment</label>
            <textarea class="form-control" id="editor1" rows="3" name="body"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Comment</button>
    </fieldset>
    <?= form_close()?>
<?php endif; ?>
