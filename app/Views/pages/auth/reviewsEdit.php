<?= $this->extend('layouts/main') ?>

<?php // Document Title ?>
<?= $this->section('title') ?>
    Edit Review
<?= $this->endSection() ?>

<?php // CSS ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/reviewsEdit.css') ?>">
<?= $this->endSection() ?>

<?php // Main Content ?>
<?= $this->section('content') ?>
    <div class="container">
        <div class="p-container">
            <div class="content">
                <?= $this->include('components/reviews/reviewsEdit') ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
