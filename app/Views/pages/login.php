<?php // tutorial https://www.youtube.com/watch?v=P0zTdy14SZQ&list=PLYogo31AXFBNi757lPJGD98d6pFq8bDnd&index=8 ?>

<?= $this->extend('layouts/main') // located in Views/layouts/main.php ?>

<?php // Document Title ?>
<?= $this->section('title') // located in Views/layouts/main.php "renderSection" ?>
    Login
<?= $this->endSection() ?>

<?php // CSS ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/login.css') // located in public/css ?>">
<?= $this->endSection() ?>

<?php // Main Content ?>
<?= $this->section('content') // located in Views/layouts/main.php "renderSection" ?>
    <div class="container">
        <h1>Login Page ⚡️</h1>

        <?php // more on flashdata https://codeigniter.com/user_guide/libraries/sessions.html#flashdata?>
        <?php if (session()->getFlashdata('msg') !== null): ?>
        <div>
            <p style='color: green'><?= session()->getFlashdata('msg') ?></p>
        </div>
        <?php endif; ?>

        <?php // validation https://www.codeigniter.com/user_guide/libraries/validation.html?highlight=validate#customizing-error-display ?>
        <?= isset($validation) ? $validation->listErrors('user_errors') : '' ?>

        <div>
            <form class="form" action="<?= route_to('login') // located in app/Config/Routes.php ?>" method="POST" id="login-form">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" value="janedoe" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" value="12345678" autocomplete="new-password" required>
                </div>
                <button class="btn btn-primary" type="submit" form="login-form" value="submit">Login</button>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>
