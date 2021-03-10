/* eslint-disable no-undef */
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
    async fetchMessageHistoryWith(recipientUserId, msgId = 0) {
      if (recipientUserId === undefined) throw new Error('undefined recipientUsername');
      // call api to get message history & load them all here
      // const data = [];
      const { user_id } = window; // might find a better approach later on

      const { data } = await axios.post(window.conversationEndpoint, {
        sender_uid: user_id,
        recipient_uid: parseInt(recipientUserId, 10),
        msg_id: msgId,
      }, {
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
        },
      });

      result = data.data.map((d) => ({ ...d, username: d.user_id }));
      console.log('result');
      console.log(result);
      return result;
    },

    async fetchInbox() {
      const { data } = await axios.post(window.inboxEndpoint, {
        recipient_uid: window.user_id,
      }, {
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
        },
      });

      result = data.data.map((d) => ({ ...d, username: `john doe${d.user_id}` }));

      return result;
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
    async loadMessages(recipientUserId, recipientUsername) {
      const messageHistory = await apiManager.fetchMessageHistoryWith(recipientUserId);

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

    const recipientUserId = inboxCard.dataset.user_id;
    const recipientUsername = inboxCard.dataset.username;

    chatManager.loadMessages(recipientUserId, recipientUsername);
  }

  function createInboxCard(username, lastMsg) {
    const chatBoxContainerDiv = document.createElement('div');
    chatBoxContainerDiv.classList.add('inbox_card');

    const userEl = document.createElement('p');
    userEl.textContent = username;

    const lastMsgEl = document.createElement('p');
    lastMsgEl.textContent = lastMsg;

    chatBoxContainerDiv.appendChild(userEl);
    chatBoxContainerDiv.appendChild(lastMsgEl);

    return chatBoxContainerDiv;
  }

  return {
    async load() {
      const inboxContainer = document.querySelector('.inbox_container');
      inboxList = await apiManager.fetchInbox();

      console.log('inboxList');
      console.log(inboxList);

      inboxList.forEach(({
        user_id, username, content, timestamp,
      }) => {
        const inboxCard = createInboxCard(username, content);

        inboxCard.addEventListener('click', onInboxClick, false);
        inboxCard.setAttribute('data-user_id', user_id);
        inboxCard.setAttribute('data-username', username);

        inboxContainer.appendChild(inboxCard);
      });

      return inboxList[0];
    },
  };
}

(
  async () => {
    const apiManager = APIManager();
    const chatManager = ChatManager(apiManager);
    const inbox = InboxManager(apiManager, chatManager);
    const firstInbox = inbox.load();
    // chatManager.loadMessages(firstInbox.username);
  }
)();
