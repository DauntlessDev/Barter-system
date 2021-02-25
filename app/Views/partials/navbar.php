<?php /* check app/Config/Routes.php for "Route Definitions"  */ ?>

<nav class="nav rgb">
    <a href="<?= route_to('home') ?>">Barter System</a>
    <?php if (session()->get('isLoggedIn') === true): ?>
        <a href="<?= route_to('logout') ?>">Logout</a>
    <?php else: ?>
    <a href="<?= route_to('signup') ?>">Sign up</a>
    <a href="<?= route_to('login') ?>">Login</a>
    <?php endif; ?>
</nav>