<div class="p-items-container">
    <div>
        <div class="p-items-content">
            <div class="p-items-head">
                <h3>Items</h3>
            </div>

            <div class="p-items-body">

                <?php foreach($items as $item): ?>
                    <div class="p-items-box">
                        <div class="p-item-box-container">

                            <a href="<?= base_url(route_to('item', $item['item_id'])) ?>">
                                <div class="p-item-img">
                                    <span class="p-item-img-container">
                                        <img class="img" src="<?= base_url($item['photo_url']) ?>">
                                    </span>
                                </div>

                                <p class="item-title"><?= $item['item_name'] ?></p>
                                <p class="item-desc"><?= $item['desc_content'] ?></p>
                            </a>
                            
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>