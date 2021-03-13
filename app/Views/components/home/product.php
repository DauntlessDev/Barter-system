<div class="product">
    <div class="product-header">
        <!-- logic in base_url is temporary, waiting for changinge user data in database -->
        <img src="
            <?= base_url( 
                ($poster['photo_url'] == '#')? 'assets/home/profile-pic-sample.jpg' :$poster['photo_url']);
            ?>" 
         alt="profile-pic" class="profile-pic">
        <div class="product-header-sub">
            <p><?= $poster['username'] ?></p>
            <h6><?= $item['created_at'] ?></h6>
        </div>
    </div>
    <div class="main-img" style="background-image:url(<?= base_url($item['photo_url']) ?>); ">
      
    </div>
    <div class="product-details">
        <p class="product-name"><?= ucwords($item['item_name']) ?></p>
        <p>
            <?php
                $class->displayProductTitle($item['desc_title']);
            ?>
        </p>
        <p>
            <?php
                $class->displayProductDescription($item['desc_content']);
            ?>
         </p>
        <div class="new-tag">New</div>
    </div>
</div>

