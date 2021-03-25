<div class="p-items-container">
    <div>
        <div class="p-items-content">
            <div class="p-items-head">
                <h3>Reviews for @<?= $user['username'] ?? '' ?></h3>
                <div class="p-edit-review">
                    <?php if($AddButton['status']): ?>
                        <button class="button" onclick="window.location = '<?= route_to('reviewsCreate', $user['user_id']) ?>'">Add</button>
                    <?php else: ?>
                        <button class="button disabled" title="<?= $AddButton['msg'] ?>" disabled>Add</button>
                    <?php endif; ?>
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
                                            <?php if(session()->get('user') !== null): ?>
                                                <?php if(session()->get('user')['user_id'] === $review['reviewer_uid']): ?>
                                                    <div>
                                                        <a href="<?= route_to('reviewsEdit', $user['user_id']) ?>">edit</a>
                                                        &nbsp;
                                                        <a href="<?= route_to('reviewsDelete', $user['user_id']) ?>" style="color: red;">delete</a>
                                                        <!-- to be checked if the user owns this -->
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
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