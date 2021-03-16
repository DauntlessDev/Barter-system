<div class="product" onclick="window.location = '<?= base_url(route_to('item', $item['item_id'])) ?>'">
    <div class="product-header">
        <!-- logic in base_url is temporary, waiting for changinge user data in database -->
        <img src="
            <?= base_url($poster['photo_url']) ?>"
         alt="profile-pic" class="profile-pic">
        <div class="product-header-sub">
            <p><?= $poster['username'] ?></p>
            <h6><?= date('M d, Y', strtotime($item['created_at'])); ?></h6>
        </div>
    </div>
    <div class="main-img" style="background-image:url(<?= base_url($item['photo_url']) ?>); ">

    </div>
    <div class="product-details">
        <div class="product-name"><?= ucwords($item['item_name']) ?></div>

        <p>
            <?= $item['desc_content']?>
         </p>
        <div class="new-tag">New</div>
    </div>
</div>

