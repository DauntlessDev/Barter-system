<div class="category" onclick="window.location='<?= base_url("category/".$category['category_id']); ?>'">
    <img src="<?= base_url($category['icon']) ?>" alt="category">
    <p><?= $category['category_name'] ?></p>
</div>
