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
    <p style="color: red"><?= $msg ?></p> <?php // coming from $data variable in app/Controllers/Auth::signup ?>
<?= $this->endSection() ?>
