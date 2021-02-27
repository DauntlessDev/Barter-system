<?php // tutorial https://www.youtube.com/watch?v=P0zTdy14SZQ&list=PLYogo31AXFBNi757lPJGD98d6pFq8bDnd&index=8 ?>

<?= $this->extend('layouts/main') // located in Views/layouts/main.php ?>

<?php // Document Title ?>
<?= $this->section('title') // located in Views/layouts/main.php "renderSection" ?>
    Sign up
<?= $this->endSection() ?>

<?php // OPTIONAL CSS (you can also omit this completely) ?>
<?php // $this->section('css') ?>

<?php // $this->endSection() ?>

<?php // Main Content ?>
<?= $this->section('content') // located in Views/layouts/main.php "renderSection" ?>
    <h1>Sign up Page 🌊</h1>
    <!-- <p style="color: red"><?= $msg ?></p> <?php // coming from $data variable in app/Controllers/Auth::signup ?> -->
    <div>
        <form action="<?= route_to('signup') ?>" method="POST" id="signup-form">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="user0" autocomplete="off">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="password" autocomplete="new-password">
            </div>
            <button type="submit" form="signup-form" value="submit">Submit</button>
        </form>
    </div>
<?= $this->endSection() ?>
