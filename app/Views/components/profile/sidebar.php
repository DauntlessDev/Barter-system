<div class="p-sidebar">
    <div class="p-icon-container">
        <img src="<?= base_url($user['photo_url']) ?>">
    </div>
    <h2><?= $user['first_name'] ?? '' ?> <?= $user['last_name'] ?? '' ?></h2>
    <h3>@<?= $user['username'] ?? '' ?></h3>
    <p><?= $user['address'] ?? '' ?></p>
</div>