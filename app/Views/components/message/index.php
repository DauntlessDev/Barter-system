<div class="container">
    <div>
        <h1>Messages ✉️</h1>
    </div>

    <div class="msg_container">
        <div class="chatPanelSidebar_container">
            <div class="contactList_container">
                <input class="searchUserField" list="contactListUser" placeholder="search user...">
                <datalist id="contactListUser">
                    <?php foreach($users as $user): // this will hamper performance if there's a lot of users ?>
                        <?php if ($user['user_id'] !== session()->get('user')['user_id']): ?>
                            <option data-user_id="<?= $user['user_id'] ?>" value="<?= $user['username'] ?>">
                        <?php endif; ?>
                    <?php endforeach; ?>
                </datalist>
            </div>
            <div class="inbox_container">
                <?php // inboxes loads here in runtime ?>
            </div>
        </div>
        <div class="chatPanel_container">
            <div class="recipient_container">Select Recipient to load messages</div>
            <div class="content">
                <?php // chats loads here in runtime ?>
            </div>
            <div class="msgTextArea_container">
                <textarea class="msgTextArea" rows="3"></textarea>
                <button class="btn send-btn">Send</button>
            </div>
        </div>
    </div>
</div>

<?= $this->include('components/message/script') ?>