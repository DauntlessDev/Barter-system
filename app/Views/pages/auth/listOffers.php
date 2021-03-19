<?= $this->extend('layouts/main') ?>

<?php // Document Title ?>
<?= $this->section('title') ?>
    Offers
<?= $this->endSection() ?>

<?php // CSS ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/listOffers.css') ?>">
<?= $this->endSection() ?>

<?php // Main Content ?>
<?= $this->section('content') ?>
    <?= $this->include('components/offer/listoffers') ?>
<?= $this->endSection() ?>
