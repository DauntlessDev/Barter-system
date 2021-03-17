<div class="wrapper">
    <h1 class="main-title">What are you listing today?</h1>
    <div class="main-container">
        <div class="left-container">
            <div class="item-upload-photo">
                <input class="item-upload" type="file" name="photo_url" id="photo_url" value="" autocomplete="off" accept=".jpg, .jpeg, .png">
            </div>
        </div>
        <div class="right-container">
            <div class="category-dropdown">
                
            </div>
            <div class="listing">
                <input type="text" name="listing-title" id="listing-title" placeholder="Item Name">
                <label for="listing-title">Listing Title</label>
            </div>
            <h1 class="about-title">About the item</h1>
            <div class="description">
                <h3 class="desc">Description</h3>
                    <select name="status" id="status" disabled>
                        <option value="available">Available</option>
                        <option value="unavailable">Unavailable</option>
                    </select>
                <textarea name="description" id="" cols="30" rows="10" class="desc-text"></textarea>
            </div>
            <hr class="divider">
            <input type="button" value="Add" class="add-button">
        </div>
    </div>
</div>
