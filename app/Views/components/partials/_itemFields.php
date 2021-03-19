<div class="main-container">

    <div class="left-container">
        <div class="item-upload-photo">
        <?php if(!empty($item)): ?>
            <img class="item-photo" src="<?= base_url($item['photo_url']) ?>">
        <?php endif; ?>
            <input class="item-upload" type="file" name="item_photo" id="item_photo" autocomplete="off" accept=".jpg, .jpeg, .png">
        </div>
    </div>

    <div class="right-container">

        <div class="listing">
            <input type="text" name="item_name" id="item_name" placeholder="Item Name" <?php if(!empty($item)): ?> value="<?= $item['item_name'] ?>" <?php endif; ?>>
            <label for="listing-title">Listing Title</label>
        </div>

        <div class="categories">
            <?php foreach ($categories as $index=>$category): ?>
                <?php if ($index % 4 === 0): ?>
                    <div class="col">
                <?php endif; ?>
                <label class="label-checkbox" for="<?= $category['category_name'] ?>"><input type="checkbox" name="category_ids[]" id="<?= $category['category_name'] ?>" value="<?= $category['category_id'] ?>" 
                    <?php if(!empty($item)): ?>
                        <?php if(in_array($category, $item['categories'])):?> checked <?php endif; ?>
                    <?php endif; ?>> <?= $category['category_name'] ?></label><br>
                <?php if (($index + 1) % 4 === 0 || $index + 1 === count($categories)): ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="about"><h1 class="about-title">About the item</h1></div>
        
        <div class="description">
            <h3 class="desc">Description</h3>
                <input type="text" name="desc_title" id="desc_title" placeholder="Description Header" <?php if(!empty($item)): ?> value="<?= $item['desc_title'] ?>" <?php endif; ?>> 
                <select name="avail_status" id="avail_status">
                    <?php // this would do because avail_status is an ENUM  ?>
                    <option value="available" selected >Available</option>
                    <option value="unavailable" <?php if(empty($item)): ?>disabled <?php endif; ?>>Unavailable</option>
                    <option value="pending" <?php if(empty($item)): ?>disabled <?php endif; ?>>Pending</option>
                </select>
            <textarea name="desc_content" id="" cols="30" rows="10" class="desc_content" placeholder="Insert your description here"><?= $item['desc_content']?? ''; ?></textarea>
        </div>

        <hr class="divider">
        
        <button class="button-add" type="submit" form="additem-form" value="submit">
            <?php if(empty($item)): ?>
                Add Item
            <?php else: ?>
                Edit Item
            <?php endif; ?>
        </button>

    </div>
</div>