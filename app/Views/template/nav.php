<nav>
    <div>
        <li><a href="<?= route_to('home') ?>">Home</a></li>
    </div>
    <div>
        <?php if (session()->get('isLoggedIn') === true) : ?>
            <li><a href="<?= route_to('userProfile') ?>"><?= session()->get('user')['username'] ?? '' ?></a></li>
            <li><a href="<?= route_to('userProfileEdit') ?>">Edit Profile</a></li>
            <li><a href="<?= route_to('message') ?>">Messages</a></li>
            <li><a href="<?= route_to('logout') ?>">Logout</a></li>
        <?php else : ?>
            <li><a href="<?= route_to('signup') ?>">Sign up</a></li>
            <div class="spacer"></div>
            <li class="login"><a href="<?= route_to('login') ?>">Login</a></li>
        <?php endif; ?>
    </div>
</nav>