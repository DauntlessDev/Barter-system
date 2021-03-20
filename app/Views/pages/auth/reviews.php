<?php // tutorial https://www.youtube.com/watch?v=P0zTdy14SZQ&list=PLYogo31AXFBNi757lPJGD98d6pFq8bDnd&index=8 ?>

<?= $this->extend('layouts/main') // located in Views/layouts/main.php ?>

<?php // Document Title ?>
<?= $this->section('title') // located in Views/layouts/main.php "renderSection" ?>
    User Reviews
<?= $this->endSection() ?>

<?php // OPTIONAL CSS ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/reviews.css') // located in public/css/userProfile.css ?>">
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
                            <a class ="p-nav-links-a" href="">Reviews</a>                  
                        </div>
                    </div>
                </div>

                <div class="p-body">
                    <div class="p-sidebar">
                        <div class="p-icon-container">
                            <img src="<?= base_url(session()->get('user')['photo_url']) ?>"> <!-- add url to the user's profile picture -->
                        </div>
                        <h2><?= $user['first_name'] ?? '' ?> <?= $user['last_name'] ?? '' ?></h2>
                        <h3>@<?= $user['username'] ?? '' ?></h3>
                        <p><?= $user['address'] ?? '' ?></p>
                    </div>

                    <div class="p-items-container">
                        <div>
                            <div class="p-items-content">
                                <div class="p-items-head">
                                    <h3>Reviews</h3>
                                </div>

                                <ul class="p-reviews-body">
                                    <li class="p-reviews-box">
                                        <div class="p-review">
                                            <div class="p-review-container">
                                                <div class="p-reviewer-img-container">
                                                    <img class="p-reviewer" src="http://via.placeholder.com/300">
                                                </div>
                                                <div class="p-reviewer-info-container">
                                                    <div class="p-reviewer-info">
                                                        <div class="p-reviewer-name">
                                                            <a href="">Minatozaki Sana</a> ∙ 22 days ago
                                                        </div>
                                                        <div class="p-reviewer-ratings">
                                                            <div class="stars">
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star space"></span>
                                                                <span>0.00</span>
                                                            </div>
                                                        </div>
                                                        <p class="p-review-body">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lectus libero, eu faucibus orci posuere vitae. Duis hendrerit feugiat nunc maximus aliquam. Sed ac ipsum sit amet nunc suscipit vestibulum.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-reviews-box">
                                        <div class="p-review">
                                            <div class="p-review-container">
                                                <div class="p-reviewer-img-container">
                                                    <img class="p-reviewer" src="http://via.placeholder.com/300">
                                                </div>
                                                <div class="p-reviewer-info-container">
                                                    <div class="p-reviewer-info">
                                                        <div class="p-reviewer-name">
                                                            <a href="">Minatozaki Sana</a> ∙ 22 days ago
                                                        </div>
                                                        <div class="p-reviewer-ratings">
                                                            <div class="stars">
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star space"></span>
                                                                <span>0.00</span>
                                                            </div>
                                                        </div>
                                                        <p class="p-review-body">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lectus libero, eu faucibus orci posuere vitae. Duis hendrerit feugiat nunc maximus aliquam. Sed ac ipsum sit amet nunc suscipit vestibulum.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-reviews-box">
                                        <div class="p-review">
                                            <div class="p-review-container">
                                                <div class="p-reviewer-img-container">
                                                    <img class="p-reviewer" src="http://via.placeholder.com/300">
                                                </div>
                                                <div class="p-reviewer-info-container">
                                                    <div class="p-reviewer-info">
                                                        <div class="p-reviewer-name">
                                                            <a href="">Minatozaki Sana</a> ∙ 22 days ago
                                                        </div>
                                                        <div class="p-reviewer-ratings">
                                                            <div class="stars">
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star space"></span>
                                                                <span>0.00</span>
                                                            </div>
                                                        </div>
                                                        <p class="p-review-body">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lectus libero, eu faucibus orci posuere vitae. Duis hendrerit feugiat nunc maximus aliquam. Sed ac ipsum sit amet nunc suscipit vestibulum.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-reviews-box">
                                        <div class="p-review">
                                            <div class="p-review-container">
                                                <div class="p-reviewer-img-container">
                                                    <img class="p-reviewer" src="http://via.placeholder.com/300">
                                                </div>
                                                <div class="p-reviewer-info-container">
                                                    <div class="p-reviewer-info">
                                                        <div class="p-reviewer-name">
                                                            <a href="">Minatozaki Sana</a> ∙ 22 days ago
                                                        </div>
                                                        <div class="p-reviewer-ratings">
                                                            <div class="stars">
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star space"></span>
                                                                <span>0.00</span>
                                                            </div>
                                                        </div>
                                                        <p class="p-review-body">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lectus libero, eu faucibus orci posuere vitae. Duis hendrerit feugiat nunc maximus aliquam. Sed ac ipsum sit amet nunc suscipit vestibulum.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-reviews-box">
                                        <div class="p-review">
                                            <div class="p-review-container">
                                                <div class="p-reviewer-img-container">
                                                    <img class="p-reviewer" src="http://via.placeholder.com/300">
                                                </div>
                                                <div class="p-reviewer-info-container">
                                                    <div class="p-reviewer-info">
                                                        <div class="p-reviewer-name">
                                                            <a href="">Minatozaki Sana</a> ∙ 22 days ago
                                                        </div>
                                                        <div class="p-reviewer-ratings">
                                                            <div class="stars">
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star space"></span>
                                                                <span>0.00</span>
                                                            </div>
                                                        </div>
                                                        <p class="p-review-body">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lectus libero, eu faucibus orci posuere vitae. Duis hendrerit feugiat nunc maximus aliquam. Sed ac ipsum sit amet nunc suscipit vestibulum.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?= $this->endSection() ?>
