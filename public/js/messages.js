const chatPanelContent = document.querySelector('.chatPanel_container .content');
chatPanelContent.scrollTop = chatPanelContent.scrollHeight

const sendBtn = document.querySelector('.send-btn');

sendBtn.addEventListener('click', onSendBtnClick);

function onSendBtnClick(e) {
    const msgTextArea = document.querySelector('.msgTextArea');

    sendChat(msgTextArea.value);
    msgTextArea.value = '';
}

function receiveChat(msg) {
    drawChat(msg, false);
}

function sendChat(msg) {
    if (msg === '') return;

    drawChat(msg);
}

function drawChat(msg, isSender = true) {
    const chatBoxContainerDiv = createChatBoxDiv(msg, isSender);
    chatPanelContent.appendChild(chatBoxContainerDiv);
    chatPanelContent.scrollTop = chatPanelContent.scrollHeight
}

function createChatBoxDiv(msg, isSender = true) {
    const chatBoxContainerDiv = document.createElement("div");
    chatBoxContainerDiv.classList.add('chatBox_container');
    chatBoxContainerDiv.classList.add(isSender ? 'sender' : 'receiver');

    const chatBoxDiv = document.createElement("div");
    chatBoxDiv.classList.add('chatBox');

    const chat = document.createTextNode(msg);

    chatBoxDiv.appendChild(chat);
    chatBoxContainerDiv.appendChild(chatBoxDiv);

    return chatBoxContainerDiv;
}

function setRecipient(username) {
    document.querySelector('.recipient_container').textContent = username;
}

function APIManager() {
    return {
        getMessageHistoryWith(recipientUsername) {
            // call api to get message history & load them all here
            const data = [];
            const username = window.username;

            const randMessages = [
                'lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor',
                'dolor enet alrut dolor enet alrut dolor enet alrut',
                'Sed in egestas leo. Maecenas non ultricies quam, ultrices dignissim elit.',
                'Mauris purus purus, aliquet vel orci sed, blandit tempor neque.'
            ];

            for (let i = 0; i < 20; i += 2) {
                data.push({ username: username, content: randMessages[Math.floor((Math.random() * 4))], timestamp: i });
                data.push({ username: recipientUsername, content: randMessages[Math.floor((Math.random() * 4))], timestamp: i+1 });
            }

            return data;
        }
    }
}

const apiManager = APIManager();

function clearMessages() {
    chatPanelContent.innerHTML = '';
}

function loadMessages(recipientUsername) {
    const messageHistory = apiManager.getMessageHistoryWith(recipientUsername);

    clearMessages();

    for (const message of messageHistory) {
        if (message.username !== window.username) receiveChat(message.content)
        else sendChat(message.content)
    }
}

const inbox = inboxManager();
inbox.load();

function inboxManager() {
    function onInboxClick(e) {
        const inboxCard = e.target.closest('.inbox_card');

        const recipientUsername = inboxCard.dataset.username;

        setRecipient(recipientUsername);
        loadMessages(recipientUsername);
    }

    return {
        load() {
            const inboxContainer = document.querySelector('.inbox_container');

            for (let i = 0; i < 20; i++) {
                const user = `User${i}`;
                const inbox = this.createInboxCard(user, 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ');

                inbox.addEventListener('click', onInboxClick, false);
                inbox.setAttribute('data-username', user)

                inboxContainer.appendChild(inbox);
            }
        },
        createInboxCard(recipientUsername, lastMsg) {
            const chatBoxContainerDiv = document.createElement("div");
            chatBoxContainerDiv.classList.add('inbox_card');

            const userEl = document.createElement("p");
            userEl.textContent = recipientUsername;

            const lastMsgEl = document.createElement("p");
            lastMsgEl.textContent = lastMsg;

            chatBoxContainerDiv.appendChild(userEl);
            chatBoxContainerDiv.appendChild(lastMsgEl);

            return chatBoxContainerDiv;
        }
    };
}