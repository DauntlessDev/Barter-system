<h3>Profile information</h3>

<div class="user-box">
    <input type="text" name="username" id="username" value="<?= session()->get('user')['username'] ?? 'janedoe' ?>" autocomplete="off" required>
    <label for="username">Username</label>
</div>

<div class="user-box">
    <input type="text" name="first_name" id="first_name" value="<?= session()->get('user')['first_name'] ?? 'jane' ?>" autocomplete="off" required>
    <label>First Name</label>
</div>

<div class="user-box">
    <input type="text" name="last_name" id="last_name" value="<?= session()->get('user')['last_name'] ?? 'doe' ?>" autocomplete="off" required>
    <label for="last_name">Last Name</label>
</div>

<div class="user-box">
    <input type="text" name="address" id="address" value="<?= session()->get('user')['address'] ?? 'Somewhere in the woods' ?>" autocomplete="off" required>
    <label for="address">Address</label>
</div>

<h3>Private information</h3>

<div class="user-box">
    <input type="text" name="contact_details" id="contact_details" value="<?= session()->get('user')['contact_details'] ?? '09123456789' ?>" autocomplete="off" required>
    <label for="contact_details">Phone</label>
</div>

<?php if (session()->get('isLoggedIn') === true) : ?>
<div class="user-box">
    <input type="password" name="password" id="password" value="" autocomplete="new-password">
    <label for="password">Password</label>
</div>
<?php else: ?>
<div class="user-box">
    <input type="password" name="password" id="password" value="12345678" autocomplete="new-password" required>
    <label for="password">Password</label>
</div>
<?php endif; ?>