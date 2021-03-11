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
            <h3>Profile photo</h3>

            <div class="ep-container-pp">
                <img class="fit" src="img/sana.jpg">

                <div class="ep-container-info">
                <p>Clear frontal face photos are an important way for buyers and sellers to learn about each other. <b><i>Change this</i></b>.</p>
                
                <input class="ep-upload-pp" type="file" name="photo_url" id="photo_url" value="" autocomplete="off">
                </div>
            </div>

            <form class="ep-box" action="<?= route_to('userProfileEdit') ?>" method="POST" id="editProfile-form">
                <?= $this->include('components/partials/_userFields.php') ?>
                <!-- <button class="button" type="submit" form="editProfile-form" value="submit">Edit Profile</button> -->
            </form>

            <div class="ep-divider"></div>
            <div class="user-box">
                <button class="button" type="submit" form="editProfile-form" value="submit">Save changes</button>
            </div>
        </div>
    </div>

</div>