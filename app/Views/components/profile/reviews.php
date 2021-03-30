<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/reviewHistory.css') ?>" >
</head>
<body>
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
                        <li class="p-reviews-box" data-modal-target="#modal">
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
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
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
                    <?php endforeach; ?>
                    <div class="modal" id="modal">
                        <div class="modal-header">
                        <div class="title">Review Edit History</div>
                        <button data-close-button class="close-button">&times;</button>
                        </div>
                        <div class="modal-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quod alias ut illo doloremque eum ipsum obcaecati distinctio debitis reiciendis quae quia soluta totam doloribus quos nesciunt necessitatibus, consectetur quisquam accusamus ex, dolorum, dicta vel? Nostrum voluptatem totam, molestiae rem at ad autem dolor ex aperiam. Amet assumenda eos architecto, dolor placeat deserunt voluptatibus tenetur sint officiis perferendis atque! Voluptatem maxime eius eum dolorem dolor exercitationem quis iusto totam! Repudiandae nobis nesciunt sequi iure! Eligendi, eius libero. Ex, repellat sapiente!
                        </div>
                    </div>
                    <div id="overlay"></div>
                </ul>
                
            </div>
        </div>
    </div>
</body>
<?= $this->include('components/profile/script') ?>
</html>