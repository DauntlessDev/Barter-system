<div class="user-box">
    <h3>Rating</h3>
    <input type="number" min="0" max="5" name="rating" value="<?= $review['rating'] ?? '' ?>" autocomplete="off" required>
</div>

<div class="user-box">
    <h3>Review</h3>
    <textarea type="text" name="content" autocomplete="off" required><?= $review['content'] ?? '' ?></textarea>
</div>

<div class="user-box">
    <button class="button" type="submit" value="submit">Save changes</button>
</div>