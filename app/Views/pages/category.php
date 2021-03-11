<?= $this->extend('layouts/main') ?>

<?php // Document Title ?>
<?= $this->section('title') ?>
    Trade-Off
<?= $this->endSection() ?>

<?php // CSS ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/home.css') ?>">
<?= $this->endSection() ?>

<?php // Main Content ?>
<?= $this->section('content') ?>
    <?= $this->include('components/home/category_page') ?>
<?= $this->endSection() ?>
