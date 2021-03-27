<div class="ep-container">
    <div class="ep-sidebar">
        <div class="ep-sidebar-links">
            <a href="" class="ep-side-link-active">Edit Profile</a>
	<!--
            <a href="" class="ep-side-link">Messages</a>
	-->
        </div>
    </div>

    <div class="ep-content">
        <div class="ep-content-box">
            <h1>Edit Profile</h1>

            <div class="validation-box">
                <?= $this->include('components/partials/_feedback') ?>
            </div>

            <form class="ep-box" action="<?= route_to('userProfileEdit', session()->get('user')['user_id']) ?>" method="POST" enctype="multipart/form-data">
                <h3>Profile photo</h3>

                <div class="ep-container-pp">
                    <img class="fit" src="<?= base_url(session()->get('user')['photo_url']) ?>">

                    <div class="ep-container-info">
                    <p>Clear frontal face photos are an important way for buyers and sellers to learn about each other.</p>

                    <input class="ep-upload-pp" type="file" name="profile_image" id="profile_image">
                    </div>
                </div>

                <?= $this->include('components/partials/_userFields.php') ?>

                <div class="ep-divider"></div>
                <div class="user-box">
                    <button class="button" type="submit" value="submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>

</div>