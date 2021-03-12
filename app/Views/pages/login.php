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
    <div class="form-container">
        <div class="form-box">
            <h1>Login</h1>

            <form class="form" action="<?= route_to('login') ?>" method="POST" id="login-form">
                <div class="validation-box">

                <?php // more on flashdata https://codeigniter.com/user_guide/libraries/sessions.html#flashdata?>
                <?php if (session()->getFlashdata('msg') !== null): ?>
                <div>
                    <p style='color: green'><?= session()->getFlashdata('msg') ?></p>
                </div>
                <?php endif; ?>

                <?php // validation https://www.codeigniter.com/user_guide/libraries/validation.html?highlight=validate#customizing-error-display ?>
                <?= isset($validation) ? $validation->listErrors('user_errors') : '' ?>

                </div>
                
                <div class="user-box">
                    <input type="text" name="username" id="username" value="janedoe" autocomplete="off" required>
                    <label for="username">Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" id="password" value="12345678" autocomplete="new-password" required>
                    <label for="password">Password</label>
                </div>
                <div class="user-box">
                    <button class="button" type="submit" form="login-form" value="submit">Login</button>
                </div>

                <p align="center">Don't have an account? <a href="<?= route_to('signup') ?>">Sign up</a></p>

            </form>

        </div>
    </div>
</div>
<?= $this->endSection() ?>
