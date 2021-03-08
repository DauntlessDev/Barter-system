<?php // tutorial https://www.youtube.com/watch?v=P0zTdy14SZQ&list=PLYogo31AXFBNi757lPJGD98d6pFq8bDnd&index=8 ?>

<?= $this->extend('layouts/main') // located in Views/layouts/main.php ?>

<?php // Document Title ?>
<?= $this->section('title') // located in Views/layouts/main.php "renderSection" ?>
    Edit User Profile
<?= $this->endSection() ?>

<?php // OPTIONAL CSS ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/userProfileEdit.css') // located in public/css/userProfile.css ?>">
<?= $this->endSection() ?>

<?php // Main Content ?>
<?= $this->section('content') // located in Views/layouts/main.php "renderSection" ?>
    <?= $this->include('components/userProfileEdit/index.php') ?>
<?= $this->endSection() ?>
