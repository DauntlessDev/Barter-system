<?php // tutorial https://www.youtube.com/watch?v=P0zTdy14SZQ&list=PLYogo31AXFBNi757lPJGD98d6pFq8bDnd&index=8 ?>

<?= $this->extend('layouts/main') // located in Views/layouts/main.php ?>

<?php // Document Title ?>
<?= $this->section('title') // located in Views/layouts/main.php "renderSection" ?>
    User Reviews
<?= $this->endSection() ?>

<?php // OPTIONAL CSS ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/reviews.css') // located in public/css/userProfile.css ?>">
    <link rel="stylesheet" href="<?= base_url('css/reviewHistory.css') ?>" >
<?= $this->endSection() ?>

<?php // Main Content ?>
<?= $this->section('content') // located in Views/layouts/main.php "renderSection" ?>
    <div class="container">
        <div class="p-container">
            <div class="p-content">
                <?php if (session()->getFlashdata('msg') !== null): ?>
                    <div>
                        <p style='color: green; text-align: center;'><?= session()->getFlashdata('msg') ?></p>
                    </div>
                <?php endif; ?>
                <div class="p-nav-container">
                    <div class="p-nav-margin"></div>
                    <div class="p-nav-links-container">
                        <div class="p-nav-links">
                            <a class ="p-nav-link" href="<?= base_url(route_to('userProfile', $user['user_id'])) ?>">Items</a>  
                            <a class ="p-nav-links-a" href="<?= base_url(route_to('userReviews', $user['user_id'])) ?>">Reviews</a>                  
                        </div>
                    </div>
                </div>

                <div class="p-body">

                    <!-- Sidebar -->
                    <?= $this->include('components/profile/sidebar') ?>

                    <!-- Reviews Body -->
                    <?= $this->include('components/profile/reviews') ?>
                </div>

            </div>
        </div>
    </div>
<?= $this->endSection() ?>
