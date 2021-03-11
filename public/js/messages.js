/* eslint-disable no-undef */
function APIManager() {
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

      result = data.data;
      // console.log('result');
      // console.log(result);
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

      result = data.data;
      return result;
    },

    async sendMessage(recipient_uid, content) {
      const { data } = await axios.post(window.sendEndpoint, {
        sender_uid: window.user_id,
        recipient_uid,
        content,
      }, {
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
        },
      });

      result = data.data;
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

  function sendChat(msg) {
    if (msg === '') return;

    apiManager.sendMessage(window.recipientUserId, msg);
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
      window.recipientUserId = recipientUserId;
      const messageHistory = await apiManager.fetchMessageHistoryWith(recipientUserId);

      clearMessages();

      setRecipient(recipientUsername);
      Object.values(messageHistory).forEach((message) => {
        // console.log(message.sender_uid, window.user_id);
        if (message.sender_uid !== window.user_id) drawChat(message.content, false);
        else drawChat(message.content);
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

      inboxList.forEach(({
        user_id, username, content, created_at,
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
    const firstInbox = await inbox.load();
    chatManager.loadMessages(firstInbox.user_id, firstInbox.username);
  }
)();
