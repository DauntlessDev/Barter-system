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
                    <li class="p-reviews-box" >
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
                                             <p class="history" style="color: blue; cursor:pointer;" data-modal-target="#modal" >history</a>
                                            <?php if(session()->get('user') !== null): ?>
                                                <?php if(session()->get('user')['user_id'] === $review['reviewer_uid']): ?>
                                                        &nbsp;
                                                        <a href="<?= route_to('reviewsEdit', $user['user_id']) ?>">edit</a>
                                                        &nbsp;
                                                        <a href="<?= route_to('reviewsDelete', $user['user_id']) ?>" style="color: red;">delete</a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="p-reviewer-ratings">
                                        <?= view_cell('\App\Libraries\Stars::getStars', ['rating' => $review['rating']]) ?>
                                        </div>
                                        <p class="p-review-body">
                                            <?= $review['content'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                    <div class="modal" id="modal">
                        <div class="modal-header">
                        <div class="title">Edit History</div>
                        <button data-close-button class="close-button">&times;</button>
                        </div>
                        <div class="modal-body">
                            <?php 
                            // $reviewer_uid = $this->session->userdata('current_reviewer_uid');
                            $reviewer_uid = 4;
                            $changes = $class->getHistory($review['reviewee_uid'], $reviewer_uid);
                            // var_dump($changes);
                            if (count($changes) < 1):
                                echo ("Review has no edit changes.");
                            else : 
                                foreach($changes as $change): ?> 
                                    <li class="p-reviews-box" data-modal-target="#modal" >
                                        <div class="p-review">
                                            <div class="p-review-container">
                                                <div class="p-reviewer-img-container">
                                                    <img class="p-reviewer" src="<?= base_url($change['photo_url']) ?>"> 
                                                </div>
                                                <div class="p-reviewer-info-container">
                                                    <div class="p-reviewer-info">
                                                        <div class="p-reviewer-name">
                                                            <div>
                                                            <a href="<?= base_url(route_to('userProfile', $change['reviewer_uid'])) ?>">
                                                                <?= $change['username'] ?? '' ?> 
                                                            </a> ∙ <?= time_elapsed_string($change['created_at']) ?>
                                                            </div>
                                                        </div>
                                                        <div class="p-reviewer-ratings">
                                                        <?= view_cell('\App\Libraries\Stars::getStars', ['rating' => $change['rating']]) ?>
                                                        </div>
                                                        <p class="p-review-body">
                                                            <?= $change['content'] ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                            <?php
                                endforeach;
                                endif;
                            ?>
                        </div>
                    </div>
                    <div id="overlay"></div>
                <?php endforeach; ?>
            </ul>
            
        </div>
    </div>
</div>

<?= $this->include('components/profile/script') ?>