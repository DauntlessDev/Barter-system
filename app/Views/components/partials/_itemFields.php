
<div class="form-group">
    <label>Photo</label>
    <input type="file" name="photo_image" id="photo_image" autocomplete="off" required>
</div>

<div class="form-group">
    <label>Item Name</label>
    <input type="text" name="item_name" id="item_name" value="<?= $item['item_name'] ?>" autocomplete="off" required>
</div>

<div class="form-group">
    <label>Status</label>
    <input type="text" name="avail_status" id="avail_status" value="<?= $item['avail_status'] ?>" autocomplete="off" required>
</div>

<div class="form-group">
    <label>Title</label>
    <input type="text" name="desc_title" id="desc_title" value="<?= $item['desc_title'] ?>" autocomplete="off" required>
</div>

<div class="form-group">
    <label>Description</label>
    <input type="text" name="desc_content" id="desc_content" value="<?= $item['desc_content'] ?>" autocomplete="off" required>
</div>