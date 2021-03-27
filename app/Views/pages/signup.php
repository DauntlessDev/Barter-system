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
                <?= $this->include('components/partials/_feedback') ?>
            </div>

            <div>
                <form class="form" action="<?= route_to('signup') ?>" method="POST" id="signup-form" enctype="multipart/form-data">
                    <div class="user-box">
                        <input type="file" name="profile_image" id="profile_image">
                        <label for="profile_image">Profile image</label>
                    </div>
                    <?= $this->include('components/partials/_userFields') ?>
                    <button class="button" type="submit" form="signup-form" value="submit">Sign up</button>

                    <p align="center">Have an account? <a href="<?= route_to('login') ?>">Log in now</a></p>

                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
