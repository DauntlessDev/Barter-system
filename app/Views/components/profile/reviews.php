<div class="p-items-container">
    <div>
        <div class="p-items-content">
            <div class="p-items-head">
                <h3>Reviews for @<?= $user['username'] ?? '' ?></h3>
                <div class="p-edit-review">
                    <button class="button">Add</button>
                </div>
            </div>

            <ul class="p-reviews-body">

                <?php foreach($reviews as $review): ?>
                    <li class="p-reviews-box">
                        <div class="p-review">
                            <div class="p-review-container">
                                <div class="p-reviewer-img-container">
                                    <img class="p-reviewer" src="<?= base_url($review['photo_url']) ?>"> 
                                </div>
                                <div class="p-reviewer-info-container">
                                    <div class="p-reviewer-info">
                                        <div class="p-reviewer-name">
                                            <div>
                                            <a href="<?= base_url(route_to('userProfile', $review['reviewer_uid'])) ?>">
                                                <?= $review['username'] ?? '' ?> 
                                            </a> ∙ <?= time_elapsed_string($review['created_at']) ?>
                                            </div>
                                            <div>
                                                <a href="<?= route_to('reviewsEdit', session()->get('user')['user_id']) ?>">edit</a> &nbsp; <a href="#" style="color: red;">delete</a>
                                                <!-- to be checked if the user owns this -->
                                            </div>
                                        </div>
                                        <div class="p-reviewer-ratings">
                                            <div class="stars">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star space"></span>
                                                <span><?= $review['rating'] ?></span>
                                            </div>
                                        </div>
                                        <p class="p-review-body">
                                            <?= $review['content'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>

            </ul>
            
        </div>
    </div>
</div>