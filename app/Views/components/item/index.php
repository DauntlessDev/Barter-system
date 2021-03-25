<div class="wrapper">
    <div class="all-container">
        <div class="validation-box">
            <?= $this->include('components/partials/_feedback') ?>
        </div>
        <div class="main-container">
            <!-- username of poster -->
            <div class="left-container itempic">
                <img src="<?= base_url($item['photo_url']) ?>" alt="" class="itempicture">
            </div>
            <div class="right-container">
                <?php if ((session()->get('user')['user_id'] ?? null) === $item['poster_uid']) : ?>
                    <div class="actions">
                        <a class="edit-btn" href="<?= base_url(route_to('itemEdit', $item['item_id'])) ?>">edit</a>
                        <p class="delete-btn" onclick="confirm('Delete the item?') ? window.location = '<?= base_url(route_to('itemDelete', $item['item_id'])) ?>' : null">delete</p>
                    </div>
                <?php endif; ?>

                <div class="container poster">
                    <img src="<?= base_url($user['photo_url']) ?>" alt="" class="dp posterpic">
                    <p class="postername"><?= $user['username'] ?></p>
                    <div class="stars">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span><?= $item['rating'] ?></span>
                    </div>
                </div>
                <div class="container itemname">
                    <p class="itemname"><?= $item['item_name'] ?></p>
                    <p class="item_desc_title"><?= $item['desc_title'] ?></p>
                </div>
                <div class="container rate">
                    <p class="rating"></p>
                </div>
                <div class="container status">
                    <?= view_cell('\App\Libraries\ItemStatus::index', ['avail_status' => $item['avail_status']]) ?>
                </div>
                <div class="container desc">
                    <p class="details">Details</p>
                    <pre class="description"><?= $item['desc_content'] ?></pre>
                </div>
                <div class="lister">
                    <p class="listed">Listed by <?= $user['username'] ?></p>
                    <img src="<?= base_url($user['photo_url']) ?>" alt="" class="dp listerpic">
                </div>
                <p class="gotoprofile"><a href="<?= base_url(route_to('userProfile', $user['user_id'])) ?>">Check user profile</a></p>
                <?= $this->include('components/item/offerButton') ?>
            </div>
        </div>
        <?= $this->include('components/item/offerList') ?>
    </div>
</div>