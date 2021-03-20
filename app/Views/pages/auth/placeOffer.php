<?= $this->extend('layouts/main') ?>

<?php // Document Title ?>
<?= $this->section('title') ?>
    Place Offer
<?= $this->endSection() ?>

<?php // CSS ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/offer.css') ?>">
<?= $this->endSection() ?>

<?php // Main Content ?>
<?= $this->section('content') ?>
    <?= $this->include('components/offer/place') ?>
<?= $this->endSection() ?>
