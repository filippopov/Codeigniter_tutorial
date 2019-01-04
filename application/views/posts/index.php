<h1><?= $title ?></h1>

<?php foreach ($posts as $post): ?>
    <div class="row">
        <div class="col-md-3">
            <img class="post-image" src="<?= site_url('assets/images/posts/' . $post['post_image'])?>" alt="">
        </div>
        <div class="col-md-9">
            <h3><?= $post['title'] ?></h3>
            <small class="post-date">Posted on: <?= $post['created_at']?> In: <strong><?= ucfirst($post['name']) . ' Category' ?></strong></small><br>
            <?= word_limiter($post['body'], 50) ?><br><br>
            <p><a class="btn btn-default" href="<?= site_url('/posts/' . $post['slug'])?>">Read more</a></p>
        </div>
    </div>
    <br>
<?php endforeach; ?>
<div class="pagination-links">
    <?= $this->pagination->create_links(); ?>
</div>