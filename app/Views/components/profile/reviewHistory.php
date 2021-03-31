<div class="history-container">
    <div class="history-header">
        <div class="title">Edit History</div>
        <a class="back" href="<?= base_url(route_to('userReviews', $changes[0]['reviewee_uid'])) ?>">Go Back</a> 
    </div>

    <div class="history-body">
    <?php
        foreach ($changes as $change) : ?>
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
    <?php
        endforeach;
    ?>
</div>
</div>
