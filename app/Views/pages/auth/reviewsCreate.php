<?= $this->extend('layouts/main') ?>

<?php // Document Title ?>
<?= $this->section('title') ?>
    Create Review
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
            <a style="text-decoration: underline" href="<?= route_to('userReviews', $user['user_id']) ?>">Go back</a>
            <h1>Create Review</h1>
                <?= $this->include('components/partials/_feedback') ?>
                <div class="content-rate">
                    <form class="rev-box" action="<?= route_to('reviewsCreate', $user['user_id']) ?>" method="POST">
                        <?= $this->include('components/partials/_reviewFields') ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
