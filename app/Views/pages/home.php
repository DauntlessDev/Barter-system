
<?= $this->extend('layouts/home') ?>

<?php // Document Title ?>
<?= $this->section('title') ?>
    Trade-Off
<?= $this->endSection() ?>

<?php // CSS ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href='css/home.css'>
<?= $this->endSection() ?>

<?php // Main Content ?>
<?= $this->section('content')  ?>   
    <?= $this->include('partials/home_content') ?>
<?= $this->endSection() ?>
