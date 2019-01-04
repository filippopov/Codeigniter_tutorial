<html>
    <header>
        <title>Codeigniter tutorial</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() . 'assets/css/style.css'?>">
        <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    </header>
    <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= base_url('/')?>">Codeigniter tutorial</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/')?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/about')?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/posts/index')?>">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/categories')?>">Categories</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if (!$this->session->userdata('logged_in')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/users/sign_up')?>">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/users/sign_in')?>">Sign in</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/posts/create')?>">Create Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/categories/create')?>">Create Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/users/logout')?>">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div class="container">
        <?php if ($this->session->flashdata('sign_up_user')) : ?>
            <br>
            <div class="alert alert-success">
                <p><?= $this->session->flashdata('sign_up_user') ?></p>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('sign_in_user_failed')) : ?>
            <br>
            <div class="alert alert-danger">
                <p><?= $this->session->flashdata('sign_in_user_failed') ?></p>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('sign_in_user')) : ?>
            <br>
            <div class="alert alert-success">
                <p><?= $this->session->flashdata('sign_in_user') ?></p>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('logout_user')) : ?>
            <br>
            <div class="alert alert-success">
                <p><?= $this->session->flashdata('logout_user') ?></p>
            </div>
        <?php endif; ?>
