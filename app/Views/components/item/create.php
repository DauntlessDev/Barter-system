<div class="wrapper">
    <div class="validation-box">
    <?php // more on flashdata https://codeigniter.com/user_guide/libraries/sessions.html#flashdata?>
    <?php if (session()->getFlashdata('msg') !== null): ?>
        <div>
        <p style='color: green'><?= session()->getFlashdata('msg') ?></p>
        </div>
        <?php endif; ?>
    <?php // validation https://www.codeigniter.com/user_guide/libraries/validation.html?highlight=validate#customizing-error-display ?>
    <?= isset($validation) ? $validation->listErrors('user_errors') : '' ?>
    </div>
    <h1 class="main-title">What are you listing today?</h1>
    <form class="form" action="<?= route_to('itemCreate') ?>" method="POST" id="additem-form" enctype="multipart/form-data" >
    <div class="main-container">
        <div class="left-container">
            <div class="item-upload-photo">
                <input class="item-upload" type="file" name="item_photo" id="item_photo" autocomplete="off" accept=".jpg, .jpeg, .png">
                <input type="hidden" name="photo_url" value="images/default/product.jpg">
            </div>
        </div>
        <div class="right-container">
                <div class="listing">
                    <input type="text" name="item_name" id="item_name" placeholder="Item Name">
                    <label for="listing-title">Listing Title</label>
                </div>
                <div class="categories">
                    <div class="col">
                        <label class="label-checkbox" for="toys"><input type="checkbox" name="checklist[]" id="toys" value="8"> Toys</label><br>
                        <label class="label-checkbox" for="toys"><input type="checkbox" name="checklist[]" id="sports" value="7"> Sports</label><br>
                        <label class="label-checkbox" for="toys"><input type="checkbox" name="checklist[]" id="school" value="3"> School</label><br>
                        <label class="label-checkbox" for="toys"><input type="checkbox" name="checklist[]" id="others" value="10"> Others</label><br>
                    </div>
                    <div class="col">
                        <label class="label-checkbox" for="toys"><input type="checkbox" name="checklist[]" id="office" value="9"> Office</label><br>
                        <label class="label-checkbox" for="toys"><input type="checkbox" name="checklist[]" id="home" value="5"> Home</label><br>
                        <label class="label-checkbox" for="toys"><input type="checkbox" name="checklist[]" id="hardware" value="4"> Hardware</label><br>
                        <label class="label-checkbox" for="toys"><input type="checkbox" name="checklist[]" id="gadgets" value="3"> Gadgets</label><br>
                    </div>
                    <div class="col">
                        <label class="label-checkbox" for="toys"><input type="checkbox" name="checklist[]" id="entertainment" value="2"> Entertainment</label><br>
                        <label class="label-checkbox" for="toys"><input type="checkbox" name="checklist[]" id="clothing" value="1"> Clothing</label><br>
                    </div>
                </div>
                <div class="about"><h1 class="about-title">About the item</h1></div>
                <div class="description">
                    <h3 class="desc">Description</h3>
                        <input type="text" name="desc_title" id="desc_title" placeholder="Description Header"> 
                        <select name="avail_status" id="avail_status">
                            <option value="available" selected >Available</option>
                            <option value="unavailable" disabled>Unavailable</option>
                            <option value="pending" disabled>Pending</option>
                        </select>
                        <input type="hidden" name="poster_uid" value="<?= (session()->get('user')['user_id'])?>">
                    <textarea name="desc_content" id="" cols="30" rows="10" class="desc_content" placeholder="Insert your description here"></textarea>
                </div>
                <hr class="divider">
                <button class="button-add" type="submit" form="additem-form" value="submit">Add Item</button>
        </div>
    </div>
    </form>
</div>