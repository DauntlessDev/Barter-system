function APIManager() {
  function generateFakeMessage() {
    const randMessages = [
      'lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor',
      'dolor enet alrut dolor enet alrut dolor enet alrut',
      'Sed in egestas leo. Maecenas non ultricies quam, ultrices dignissim elit.',
      'Mauris purus purus, aliquet vel orci sed, blandit tempor neque.',
    ];

    return randMessages[Math.floor((Math.random() * 4))];
  }

  return {
    fetchMessageHistoryWith(recipientUsername) {
      if (recipientUsername === undefined) throw new Error('undefined recipientUsername');
      // call api to get message history & load them all here
      const data = [];
      const { username } = window; // might find a better approach later on

      for (let i = 0; i < 20; i += 2) {
        data.push({ username, content: generateFakeMessage(), timestamp: i });
        data.push({ username: recipientUsername, content: generateFakeMessage(), timestamp: i + 1 });
      }

      return data;
    },

    fetchInbox() {
      const data = [];

      for (let i = 0; i < 20; i += 1) {
        data.push({ username: `user${i}`, content: generateFakeMessage(), timestamp: i + 1 });
      }

      return data;
    },
  };
}

function ChatManager(apiManager) {
  const chatPanelContent = document.querySelector('.chatPanel_container .content');
  chatPanelContent.scrollTop = chatPanelContent.scrollHeight;

  const sendBtn = document.querySelector('.send-btn');

  sendBtn.addEventListener('click', onSendBtnClick);

  function onSendBtnClick(e) {
    const msgTextArea = document.querySelector('.msgTextArea');

    sendChat(msgTextArea.value);
    msgTextArea.value = '';
  }

  function drawChat(msg, isSender = true) {
    const chatBoxContainerDiv = createChatBoxDiv(msg, isSender);
    chatPanelContent.appendChild(chatBoxContainerDiv);
    chatPanelContent.scrollTop = chatPanelContent.scrollHeight;
  }

  function clearMessages() {
    chatPanelContent.innerHTML = '';
  }

  function receiveChat(msg) {
    drawChat(msg, false);
  }

  function sendChat(msg) {
    if (msg === '') return;

    drawChat(msg);
  }

  function createChatBoxDiv(msg, isSender = true) {
    const chatBoxContainerDiv = document.createElement('div');
    chatBoxContainerDiv.classList.add('chatBox_container');
    chatBoxContainerDiv.classList.add(isSender ? 'sender' : 'receiver');

    const chatBoxDiv = document.createElement('div');
    chatBoxDiv.classList.add('chatBox');

    const chat = document.createTextNode(msg);

    chatBoxDiv.appendChild(chat);
    chatBoxContainerDiv.appendChild(chatBoxDiv);

    return chatBoxContainerDiv;
  }

  function setRecipient(recipientUsername) {
    document.querySelector('.recipient_container').textContent = recipientUsername;
  }

  return {
    loadMessages(recipientUsername) {
      const messageHistory = apiManager.fetchMessageHistoryWith(recipientUsername);

      clearMessages();

      setRecipient(recipientUsername);
      Object.values(messageHistory).forEach((message) => {
        if (message.username !== window.username) receiveChat(message.content);
        else sendChat(message.content);
      });
    },
  };
}

function InboxManager(apiManager, chatManager) {
  let inboxList = [];

  function onInboxClick(e) {
    const inboxCard = e.target.closest('.inbox_card');

    const recipientUsername = inboxCard.dataset.username;

    chatManager.loadMessages(recipientUsername);
  }

  function createInboxCard(recipientUsername, lastMsg) {
    const chatBoxContainerDiv = document.createElement('div');
    chatBoxContainerDiv.classList.add('inbox_card');

    const userEl = document.createElement('p');
    userEl.textContent = recipientUsername;

    const lastMsgEl = document.createElement('p');
    lastMsgEl.textContent = lastMsg;

    chatBoxContainerDiv.appendChild(userEl);
    chatBoxContainerDiv.appendChild(lastMsgEl);

    return chatBoxContainerDiv;
  }

  return {
    load() {
      const inboxContainer = document.querySelector('.inbox_container');
      inboxList = apiManager.fetchInbox();

      inboxList.forEach(({ username, content, timestamp }) => {
        const inboxCard = createInboxCard(username, content);

        inboxCard.addEventListener('click', onInboxClick, false);
        inboxCard.setAttribute('data-username', username);

        inboxContainer.appendChild(inboxCard);
      });

      return inboxList[0];
    },
  };
}

const apiManager = APIManager();
const chatManager = ChatManager(apiManager);
const inbox = InboxManager(apiManager, chatManager);
const firstInbox = inbox.load();
chatManager.loadMessages(firstInbox.username);
