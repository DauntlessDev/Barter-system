<nav class="nav">
  <input type="checkbox" id="nav-check">
  <div class="nav-header">
    <div class="nav-title">
      <a href="<?= route_to('home') ?>">Trade-off</a>
    </div>
  </div>

  <div class="nav-btn">
    <label for="nav-check">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>

  <div class="nav-links">
    <?php if (session()->get('isLoggedIn') === true) : ?>
        <a href="<?= route_to('userProfile') ?>"><?= session()->get('user')['username'] ?? '' ?></a>
        <a href="<?= route_to('userProfileEdit') ?>">Edit Profile</a>
        <a href="<?= route_to('message') ?>">Messages</a>
        <a href="<?= route_to('logout') ?>">Logout</a>
    <?php else : ?>
        <a href="<?= route_to('signup') ?>">Sign up</a>
        <div class="spacer"></div>
        <a href="<?= route_to('login') ?>">Login</a>
    <?php endif; ?>
  </div>
</nav>