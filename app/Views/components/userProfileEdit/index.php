<div class="container">
    <h1>Edit Profile ⚙️</h1>
    <form class="form" action="<?= route_to('userProfileEdit') ?>" method="POST" id="editProfile-form">
        <?= $this->include('components/partials/_userFields.php') ?>
        <button class="btn btn-primary" type="submit" form="editProfile-form" value="submit">Edit Profile</button>
    </form>
</div>