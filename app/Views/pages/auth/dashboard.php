<?php // tutorial https://www.youtube.com/watch?v=P0zTdy14SZQ&list=PLYogo31AXFBNi757lPJGD98d6pFq8bDnd&index=8 ?>

<?= $this->extend('layouts/main') // located in Views/layouts/main.php ?>

<?php // Document Title ?>
<?= $this->section('title') // located in Views/layouts/main.php "renderSection" ?>
    Dashboard
<?= $this->endSection() ?>

<?php // OPTIONAL CSS ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/dashboard.css') // located in public/css/homepage.css ?>">
<?= $this->endSection() ?>

<?php // Main Content ?>
<?= $this->section('content') // located in Views/layouts/main.php "renderSection" ?>
    <h1>Dashboard 🔐</h1>
    <p>Welcome <?= session()->get('user')['username'] ?? '' ?></p>
<?= $this->endSection() ?>
