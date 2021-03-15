<?= $this->extend('layouts/main') ?>

<?php // Document Title ?>
<?= $this->section('title') ?>
    Item
<?= $this->endSection() ?>

<?php // CSS ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/item.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?= $this->endSection() ?>

<?php // Main Content ?>
<?= $this->section('content') ?>
    <?= $this->include('components/item/index') ?>
<?= $this->endSection() ?>
