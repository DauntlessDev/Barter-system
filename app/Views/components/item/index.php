<div class="wrapper">
    <div class="all-container">
        <?php if ((session()->get('user')['user_id'] ?? null) === $item['poster_uid']) : ?>
            <div class="main-container">
                <div class="left-container itempic">
                    <img src="<?= base_url($item['photo_url']) ?>" alt="" class="itempicture">
                </div>

                <div class="right-container">
                    <div class="actions">
                        <a class="edit-btn" href="<?= base_url(route_to('itemEdit', $item['item_id'])) ?>">edit</a>
                        <p class="delete-btn" onclick="confirm('Delete the item?') ? window.location = '<?= base_url(route_to('itemDelete', $item['item_id'])) ?>' : null">delete</p>
                    </div>
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
                    </div>
                    <div class="container rate">
                        <p class="rating"></p>
                    </div>
                    <div class="container status">
                        <p class="availstatus"><?= $item['avail_status'] ?></p>
                    </div>
                    <div class="container desc">
                        <p class="details">Details</p>
                        <p class="description">
                            <?= $item['desc_content'] ?>
                        </p>
                    </div>
                    <div class="lister">
                        <p class="listed">Listed by <?= $user['username'] ?></p>
                        <img src="<?= base_url($user['photo_url']) ?>" alt="" class="dp listerpic">
                    </div>
                    <p class="gotoprofile"><a href="<?= base_url(route_to('userProfile', $user['user_id'])) ?>">Check user profile</a></p>
                    <div class="offerbutton">
                        <input type="submit" name="message" value="Message" class="message"></input>
                        <input type="submit" name="offer" value="Offer" class="offer" onclick="window.location='<?= route_to('placeOffer'); ?>'"></input>
                    </div>
                </div>
            </div>
            <div class="offers">
            <div class="offerlist-container">
        <div class="title">
            <h1 class="offer-title">Your offers</h1>
        </div>
        <div class="list-container">
            <div class="offer-container">
                <div class="text-content">
                    <h3 class="subject-title">Subject</h3>
                    <h4 class="message-view">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim reiciendis odio hic eius voluptates numquam illum laboriosam corporis. Aut aliquam aperiam sapiente, perspiciatis fuga excepturi illo repellendus molestias facere dolorem.</h4>
                </div>
                <div class="accept">
                    <button class="accept_button" type="submit" form="placeOffer-form" value="submit">Accept Offer</button>
                </div>
            </div>
            <div class="offer-container">
                <div class="text-content">
                    <h3 class="subject-title">Subject</h3>
                    <h4 class="message-view">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim reiciendis odio hic eius voluptates numquam illum laboriosam corporis. Aut aliquam aperiam sapiente, perspiciatis fuga excepturi illo repellendus molestias facere dolorem.</h4>
                </div>
                <div class="accept">
                    <button class="accept_button" type="submit" form="placeOffer-form" value="submit">Accept Offer</button>
                </div>
            </div>
            <div class="offer-container">
                <div class="text-content">
                    <h3 class="subject-title">Subject</h3>
                    <h4 class="message-view">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim reiciendis odio hic eius voluptates numquam illum laboriosam corporis. Aut aliquam aperiam sapiente, perspiciatis fuga excepturi illo repellendus molestias facere dolorem.</h4>
                </div>
                <div class="accept">
                    <button class="accept_button" type="submit" form="placeOffer-form" value="submit">Accept Offer</button>
                </div>
            </div>
            <div class="offer-container">
                <div class="text-content">
                    <h3 class="subject-title">Subject</h3>
                    <h4 class="message-view">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim reiciendis odio hic eius voluptates numquam illum laboriosam corporis. Aut aliquam aperiam sapiente, perspiciatis fuga excepturi illo repellendus molestias facere dolorem.</h4>
                </div>
                <div class="accept">
                    <button class="accept_button" type="submit" form="placeOffer-form" value="submit">Accept Offer</button>
                </div>
            </div>
            <div class="offer-container">
                <div class="text-content">
                    <h3 class="subject-title">Subject</h3>
                    <h4 class="message-view">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim reiciendis odio hic eius voluptates numquam illum laboriosam corporis. Aut aliquam aperiam sapiente, perspiciatis fuga excepturi illo repellendus molestias facere dolorem.</h4>
                </div>
                <div class="accept">
                    <button class="accept_button" type="submit" form="placeOffer-form" value="submit">Accept Offer</button>
                </div>
            </div>
            <div class="offer-container">
                <div class="text-content">
                    <h3 class="subject-title">Subject</h3>
                    <h4 class="message-view">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim reiciendis odio hic eius voluptates numquam illum laboriosam corporis. Aut aliquam aperiam sapiente, perspiciatis fuga excepturi illo repellendus molestias facere dolorem.</h4>
                </div>
                <div class="accept">
                    <button class="accept_button" type="submit" form="placeOffer-form" value="submit">Accept Offer</button>
                </div>
            </div>
            <div class="offer-container">
                <div class="text-content">
                    <h3 class="subject-title">Subject</h3>
                    <h4 class="message-view">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim reiciendis odio hic eius voluptates numquam illum laboriosam corporis. Aut aliquam aperiam sapiente, perspiciatis fuga excepturi illo repellendus molestias facere dolorem.</h4>
                </div>
                <div class="accept">
                    <button class="accept_button" type="submit" form="placeOffer-form" value="submit">Accept Offer</button>
                </div>
            </div>
        </div>
    </div>
            </div>
        <?php else : ?>
            <div class="main-container">
                <div class="left-container itempic">
                    <img src="<?= base_url($item['photo_url']) ?>" alt="" class="itempicture">
                </div>

                <div class="right-container">
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
                    </div>
                    <div class="container rate">
                        <p class="rating"></p>
                    </div>
                    <div class="container status">
                        <p class="availstatus"><?= $item['avail_status'] ?></p>
                    </div>
                    <div class="container desc">
                        <p class="details">Details</p>
                        <p class="description">
                            <?= $item['desc_content'] ?>
                        </p>
                    </div>
                    <div class="lister">
                        <p class="listed">Listed by <?= $user['username'] ?></p>
                        <img src="<?= base_url($user['photo_url']) ?>" alt="" class="dp listerpic">
                    </div>
                    <p class="gotoprofile"><a href="<?= base_url(route_to('userProfile', $user['user_id'])) ?>">Check user profile</a></p>
                    <div class="offerbutton">
                        <input type="submit" name="message" value="Message" class="message"></input>
                        <input type="submit" name="offer" value="Offer" class="offer" onclick="window.location='<?= route_to('placeOffer'); ?>'"></input>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>