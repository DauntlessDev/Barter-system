<div class="wrapper">
    <div class="validation-box">
        <?php // more on flashdata https://codeigniter.com/user_guide/libraries/sessions.html#flashdata
        ?>
        <?php if (session()->getFlashdata('msg') !== null) : ?>
            <div>
                <p style='color: green'><?= session()->getFlashdata('msg') ?></p>
            </div>
        <?php endif; ?>
        <?php // validation https://www.codeigniter.com/user_guide/libraries/validation.html?highlight=validate#customizing-error-display 
        ?>
        <?= isset($validation) ? $validation->listErrors('user_errors') : '' ?>
    </div>
    <h1 class="main-title">What are you listing today?</h1>
    <form class="form" action="<?= route_to('itemCreate') ?>" method="POST" id="additem-form" enctype="multipart/form-data">
        <div class="main-container">
            <div class="left-container">
                <div class="item-upload-photo">
                    <input class="item-upload" type="file" name="item_photo" id="item_photo" autocomplete="off" accept=".jpg, .jpeg, .png">
                </div>
            </div>
            <div class="right-container">
                <div class="listing">
                    <input type="text" name="item_name" id="item_name" placeholder="Item Name">
                    <label for="listing-title">Listing Title</label>
                </div>
                <div class="categories">
                    <?php foreach ($categories as $index => $category) : ?>
                        <?php if ($index % 4 === 0) : ?>
                            <div class="col">
                            <?php endif; ?>
                            <label class="label-checkbox" for="<?= $category['category_name'] ?>"><input type="checkbox" name="category_ids[]" id="<?= $category['category_name'] ?>" value="<?= $category['category_id'] ?>"> <?= $category['category_name'] ?></label><br>
                            <?php if (($index + 1) % 4 === 0 || $index + 1 === count($categories)) : ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="about">
                    <h1 class="about-title">About the item</h1>
                </div>
                <div class="description">
                    <h3 class="desc">Description</h3>
                    <input type="text" name="desc_title" id="desc_title" placeholder="Description Header">
                    <select name="avail_status" id="avail_status">
                        <?php // this would do because avail_status is an ENUM  
                        ?>
                        <option value="available" selected>Available</option>
                        <option value="unavailable" disabled>Unavailable</option>
                        <option value="pending" disabled>Pending</option>
                    </select>
                    <textarea name="desc_content" id="" cols="30" rows="10" class="desc_content" placeholder="Insert your description here"></textarea>
                </div>
                <hr class="divider">
                <button class="button-add" type="submit" form="additem-form" value="submit">Add Item</button>
            </div>
        </div>
    </form>
</div>