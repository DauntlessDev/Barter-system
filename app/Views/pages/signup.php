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
    <div class="container">
        <div class="form-box">
            <h1>Sign-up</h1>

            <div class="validation-box">
                <?php // validation https://www.codeigniter.com/user_guide/libraries/validation.html?highlight=validate#customizing-error-display ?>
                <?= isset($validation) ? $validation->listErrors('user_errors') : '' ?>
            </div>

            <div>
                <form class="form" action="<?= route_to('signup') ?>" method="POST" id="signup-form" enctype="multipart/form-data">
                    <?= $this->include('components/partials/_userFields') ?>
                    <button class="button" type="submit" form="signup-form" value="submit">Sign up</button>
                
                    <p align="center">Have an account? <a href="<?= route_to('login') ?>">Log in now</a></p>
                
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
