<div class="container">
    <div>
        <h1>Messages ✉️</h1>
    </div>

    <div class="msg_container">
        <div class="inbox_container">
            <?php // inboxes ?>
        </div>
        <div class="chatPanel_container">
            <div class="recipient_container">Select Recipient to load messages</div>
            <div class="content">
                <?php // chats ?>
            </div>
            <div class="msgTextArea_container">
                <textarea class="msgTextArea" rows="3"></textarea>
                <button class="btn send-btn">Send</button>
            </div>
        </div>
    </div>
</div>

<?= $this->include('components/message/script') ?>