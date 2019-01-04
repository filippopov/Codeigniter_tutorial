<h2><?= $title; ?></h2>

<ul class="list-group">
    <?php foreach ($categories as $category): ?>
        <li><a href="<?= site_url('posts/by_category/' . $category['id'])?>"><?= ucfirst($category['name']) ?></a></li>
    <?php endforeach; ?>
</ul>