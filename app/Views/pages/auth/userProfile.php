<?php // tutorial https://www.youtube.com/watch?v=P0zTdy14SZQ&list=PLYogo31AXFBNi757lPJGD98d6pFq8bDnd&index=8 ?>

<?= $this->extend('layouts/main') // located in Views/layouts/main.php ?>

<?php // Document Title ?>
<?= $this->section('title') // located in Views/layouts/main.php "renderSection" ?>
    User Profile
<?= $this->endSection() ?>

<?php // OPTIONAL CSS ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/userProfile.css') // located in public/css/userProfile.css ?>">
<?= $this->endSection() ?>

<?php // Main Content ?>
<?= $this->section('content') // located in Views/layouts/main.php "renderSection" ?>
    <div class="container">
        <div class="p-container">
            <div class="p-content">
                <div class="p-nav-container">
                    <div class="p-nav-margin"></div>
                    <div class="p-nav-links-container">
                        <div class="p-nav-links">
                            <a class ="p-nav-links-a" href="#">Items</a>  
                            <a class ="p-nav-link" href="#">Reviews</a>                  
                        </div>
                    </div>
                </div>

                <div class="p-body">
                    <div class="p-sidebar">
                        <div class="p-icon-container">
                            <img src="<?= base_url(session()->get('user')['photo_url']) ?>"> <!-- add url to the user's profile picture -->
                        </div>
                        <h2><?= session()->get('user')['first_name'] ?? '' ?> <?= session()->get('user')['last_name'] ?? '' ?></h2>
                        <h3>@<?= session()->get('user')['username'] ?? '' ?></h3>
                        <p><?= session()->get('user')['address'] ?? '' ?></p>
                    </div>

                    <div class="p-items-container">
                        <div>
                            <div class="p-items-content">
                                <div class="p-items-head">
                                    <h3>Items</h3>
                                </div>

                                <div class="p-items-body">

                                    <div class="p-items-box">
                                        <div class="p-item-box-container">
                                            <a href="">
                                                <div class="p-item-img">
                                                    <span class="p-item-img-container">
                                                        <img class="img" src="http://via.placeholder.com/300">
                                                    </span>
                                                </div>

                                                <p class="item-title">Fujifilm Instax Mini 11 (White)</p>
                                                <p class="item-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. </p>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?= $this->endSection() ?>
