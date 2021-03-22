<h1>Edit Review</h1>

<div class="content-rate">
    <form class="rev-box" action="<?= route_to('userProfileEdit', session()->get('user')['user_id']) ?>" method="POST" id="editProfile-form">
        
        <div class="user-box">
            <h3>Rating</h3>
            <input type="text" name="ratings" id="username" value="" autocomplete="off" required>
        </div>

        <div class="user-box">
            <h3>Review</h3>
            <textarea type="text" name="review" id="username" value="" autocomplete="off" required></textarea>
        </div>

        <div class="user-box">
            <button class="button" type="submit" form="editProfile-form" value="submit">Save changes</button>
        </div>

    </form>
</div>