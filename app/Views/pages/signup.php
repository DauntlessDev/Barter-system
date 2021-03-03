<?php // tutorial https://www.youtube.com/watch?v=P0zTdy14SZQ&list=PLYogo31AXFBNi757lPJGD98d6pFq8bDnd&index=8 ?>

<?= $this->extend('layouts/main') // located in Views/layouts/main.php ?>

<?php // Document Title ?>
<?= $this->section('title') // located in Views/layouts/main.php "renderSection" ?>
    Sign up
<?= $this->endSection() ?>

<?php $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/signup.css') // located in public/css ?>">
<?php $this->endSection() ?>

<?php // Main Content ?>
<?= $this->section('content') // located in Views/layouts/main.php "renderSection" ?>
    <h1>Sign up Page 🌊</h1>

    <?php // validation https://www.codeigniter.com/user_guide/libraries/validation.html?highlight=validate#customizing-error-display ?>
    <?= isset($validation) ? $validation->listErrors('user_errors') : '' ?>

    <div>
        <form class="form" action="<?= route_to('signup') // located in app/Config/Routes.php ?>" method="POST" id="signup-form">
            <?= $this->include('components/partials/_userFields') ?>
            <button class="btn btn-primary" type="submit" form="signup-form" value="submit">Sign up</button>
        </form>
    </div>
<?= $this->endSection() ?>
