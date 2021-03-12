/* eslint-disable no-undef */
function APIManager() {
  return {
    async fetchMessageHistoryWith(recipientUserId, msgId = 0) {
      if (recipientUserId === undefined) throw new Error('undefined recipientUsername');

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

  function sendChat(msg) {
    if (msg === '') return;

    apiManager.sendMessage(window.recipientUserId, msg);
  }

  function onSendBtnClick(e) {
    const msgTextArea = document.querySelector('.msgTextArea');

    sendChat(msgTextArea.value);
    msgTextArea.value = '';
  }

  sendBtn.addEventListener('click', onSendBtnClick);

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

  function drawChat(msg, isSender = true) {
    const chatBoxContainerDiv = createChatBoxDiv(msg, isSender);
    chatPanelContent.appendChild(chatBoxContainerDiv);
    chatPanelContent.scrollTop = chatPanelContent.scrollHeight;
  }

  function clearMessages() {
    chatPanelContent.innerHTML = '';
  }

  function setRecipient(recipientUsername) {
    document.querySelector('.recipient_container').textContent = recipientUsername;
  }

  function drawMessageHistory(messageHistory) {
    Object.values(messageHistory).forEach((message) => {
      if (message.sender_uid !== window.user_id) drawChat(message.content, false);
      else drawChat(message.content);
    });
  }

  let watcher = null;
  let lastMsgId = 0;

  // sends the next request only after the previous request was resolved
  // this is more efficient than relying on time interval
  async function fetchMessage(recipientUserId) {
    const messageHistory = await apiManager.fetchMessageHistoryWith(recipientUserId, lastMsgId);

    lastMsgId = messageHistory[messageHistory.length - 1]?.msg_id || lastMsgId;
    drawMessageHistory(messageHistory);
  }

  function stopWatchingChat() {
    clearTimeout(watcher);
  }

  function startWatchingChat(recipientUserId) {
    const time = 1000;
    return () => fetchMessage(recipientUserId).then((_) => {
      stopWatchingChat();
      watcher = setTimeout(startWatchingChat(recipientUserId), time);
    }).catch((e) => {
      console.error(e.message);
      stopWatchingChat();
      watcher = setTimeout(startWatchingChat(recipientUserId), time);
    });
  }

  return {
    async loadMessages(recipientUserId, recipientUsername) {
      lastMsgId = 0;
      window.recipientUserId = recipientUserId;
      clearMessages();

      setRecipient(recipientUsername);

      stopWatchingChat();
      startWatchingChat(recipientUserId)();
    },
  };
}

function InboxManager(apiManager, chatManager) {
  const inboxContainer = document.querySelector('.inbox_container');

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

  function drawInboxCard({
    user_id, username, content, created_at,
  }) {
    const inboxCard = createInboxCard(username, content);

    inboxCard.addEventListener('click', onInboxClick, false);
    inboxCard.setAttribute('data-user_id', user_id);
    inboxCard.setAttribute('data-username', username);
    inboxCard.setAttribute('data-created_at', created_at);

    inboxContainer.appendChild(inboxCard);
  }

  function clearInbox() {
    inboxContainer.innerHTML = '';
  }

  let watcher = null;

  function fetchInbox() {
    return apiManager.fetchInbox();
  }

  async function startWatchingInbox() {
    const time = 3000;

    watcher = setTimeout(async () => {
      fetchInbox().then((inboxList) => {
        clearInbox();
        inboxList.forEach(drawInboxCard);
        startWatchingInbox();
      }).catch((e) => {
        startWatchingInbox();
      });
    }, time);
  }

  // might be useful later
  /* function stopWatchingInbox() {
    clearTimeout(watcher);
  } */

  return {
    async load() {
      const inboxList = await fetchInbox();

      inboxList.forEach(drawInboxCard);

      startWatchingInbox();
      return inboxList[0];
    },
  };
}

function SearchManager(chatManager) {
  const searchUserField = document.querySelector('.searchUserField');
  const contactListUser = document.querySelector('#contactListUser');

  function onSearchFieldChange(e) {
    const searchQuery = e.target.value;
    const contactListUserList = Array.from(contactListUser.childNodes);
    contactListUserList.shift();
    const searchResult = contactListUserList.find((contact) => contact.value === searchQuery);

    if (searchResult) {
      const recipientId = searchResult.dataset.user_id;
      const recipientUsername = searchResult.value;

      chatManager.loadMessages(recipientId, recipientUsername);
    }
  }

  searchUserField.addEventListener('change', onSearchFieldChange);
}

(
  async () => {
    const apiManager = APIManager();
    const chatManager = ChatManager(apiManager);
    const searchManager = SearchManager(chatManager);
    const inboxManager = InboxManager(apiManager, chatManager);

    const firstInbox = await inboxManager.load();

    // check if user have at least one item in inbox
    if (firstInbox) {
      chatManager.loadMessages(firstInbox.user_id, firstInbox.username);
    }
  }
)();
