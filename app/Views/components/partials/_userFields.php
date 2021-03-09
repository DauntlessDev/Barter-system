<div class="form-group">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" id="first_name" value="<?= session()->get('user')['first_name'] ?? 'jane' ?>" autocomplete="off" required>
</div>

<div class="form-group">
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" id="last_name" value="<?= session()->get('user')['last_name'] ?? 'doe' ?>" autocomplete="off" required>
</div>

<div class="form-group">
    <label for="address">Address:</label>
    <input type="text" name="address" id="address" value="<?= session()->get('user')['address'] ?? 'Somewhere in the woods' ?>" autocomplete="off" required>
</div>

<div class="form-group">
    <label for="contact_details">Contact Details:</label>
    <input type="text" name="contact_details" id="contact_details" value="<?= session()->get('user')['contact_details'] ?? '09123456789' ?>" autocomplete="off" required>
</div>

<div class="form-group">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?= session()->get('user')['username'] ?? 'janedoe' ?>" autocomplete="off" required>
</div>

<?php if (session()->get('isLoggedIn') === true) : ?>
    <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" value="" autocomplete="new-password" placeholder="Enter new password">
</div>
<?php else: ?>
    <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" value="12345678" autocomplete="new-password" required>
</div>
<?php endif; ?>

<div class="form-group">
    <label for="photo_url">Photo:</label>
    <input type="file" name="photo_url" id="photo_url" value="" autocomplete="off">
</div>