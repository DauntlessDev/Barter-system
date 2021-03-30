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
                <?php foreach($reviews as $review):
                    // $poster_info = $reviews[]
                    echo view_cell('\App\Libraries\Review::getReview', ['review' => $review, 'reviewer_uid' => $review['reviewer_uid']]);
                endforeach; ?>
            </ul>
        </div>
    </div>
</div>
