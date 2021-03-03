<div class="container">
    <div>
        <h1>Messages ✉️</h1>
    </div>

    <div class="msg_container">
        <div class="inbox_container">
            <?php for ($i = 0; $i < 20; $i++) : ?>
                <div class="inbox_card">
                    <p>User <?= $i ?></p>
                    <p>Hello world world world world world world world world world world</p>
                </div>
            <?php endfor; ?>
        </div>
        <div class="chatPanel_container">
            <div class="recipient_container">User1</div>
            <div class="content">
                <?php for ($i = 0; $i < 20; $i++) : ?>
                    <div class="chatBox_container sender">
                        <div class="chatBox">
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsumLorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsumLorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsumLorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsum
                            Lorem ipsumLorem ipsum
                            <?= $i ?>
                        </div>
                    </div>
                    <div class="chatBox_container receiver">
                        <div class="chatBox">
                            Hello World
                            Hello World
                            Hello World
                            Hello World
                            Hello World
                            Hello World
                            Hello World
                            <?= $i ?>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
            <div class="msgTextArea_container">
                <textarea class="msgTextArea" rows="3"></textarea>
                <button class="btn send-btn">Send</button>
            </div>
        </div>
    </div>
</div>