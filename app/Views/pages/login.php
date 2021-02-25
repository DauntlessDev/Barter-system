<?php // tutorial https://www.youtube.com/watch?v=P0zTdy14SZQ&list=PLYogo31AXFBNi757lPJGD98d6pFq8bDnd&index=8 ?>

<?= $this->extend('layouts/main') // located in Views/layouts/main.php ?>

<?php // Document Title ?>
<?= $this->section('title') // located in Views/layouts/main.php "renderSection" ?>
    Login
<?= $this->endSection() ?>

<?php // OPTIONAL CSS ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/login.css') // located in public/css/login.css ?>">
<?= $this->endSection() ?>

<?php // Main Content ?>
<?= $this->section('content') // located in Views/layouts/main.php "renderSection" ?>
    <h1>Login Page ⚡️</h1>

    <div>
        <?php // validation https://www.codeigniter.com/user_guide/libraries/validation.html?highlight=validate#getting-all-errors ?>
        <?= $error ?? '' ?>
        <form action="<?= route_to('login') ?>" method="POST" id="login-form">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="user0" autocomplete="off">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="password" autocomplete="new-password">
            </div>
            <button type="submit" form="login-form" value="submit">Submit</button>
        </form>
    </div>
<?= $this->endSection() ?>
