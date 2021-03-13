<div class="category" onclick="window.location='<?= route_to('category', $category['category_id']); ?>'">
    <img src="<?= base_url($category['icon']) ?>" alt="category">
    <p><?= $category['category_name'] ?></p>
</div>
