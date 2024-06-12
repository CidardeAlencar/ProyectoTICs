document.addEventListener('DOMContentLoaded', function() {
    const clientLoginButton = document.getElementById('client-login');
    const adminLoginButton = document.getElementById('admin-login');
    const chatContainer = document.getElementById('chat-container');
    const loginContainer = document.querySelector('.login-container');
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const chatBox = document.getElementById('chat-box');
    const adminContainer = document.getElementById('admin-container');
    const messagesContainer = document.getElementById('messages-container');
    const replyMessageId = document.getElementById('reply-message-id');
    const replyInput = document.getElementById('reply-input');
    const adminReplyForm = document.getElementById('admin-reply-form');
  
    let userType = '';
  
    clientLoginButton.addEventListener('click', function() {
      userType = 'client';
      showChat();
    });
  
    adminLoginButton.addEventListener('click', function() {
      userType = 'admin';
      showAdminPanel();
    });
  
    function showChat() {
      loginContainer.style.display = 'none';
      chatContainer.style.display = 'block';
    }

    function showAdminPanel() {
        loginContainer.style.display = 'none';
        adminContainer.style.display = 'block';
        loadMessages();
    }
  
    chatForm.addEventListener('submit', function(event) {
      event.preventDefault();
      const userMessage = chatInput.value.trim();
      if (userMessage) {
        addMessageToChat(userType === 'client' ? 'user' : 'agent', userMessage);
        chatInput.value = '';
  
        if (userType === 'client') {
          // Simulate agent response
          setTimeout(() => {
            const agentResponse = "Gracias por tu consulta. Estamos revisando tu duda.";
            addMessageToChat('agent', agentResponse);
          }, 1000);
        }
      }
    });
  
    function addMessageToChat(sender, message) {
      const messageElement = document.createElement('div');
      messageElement.classList.add('chat-message', sender);
      messageElement.textContent = message;
      chatBox.appendChild(messageElement);
      chatBox.scrollTop = chatBox.scrollHeight;

      // Enviar mensaje al servidor
    if (sender === 'user') {
        const userTypeInput = document.getElementById('user-type');
        const userType = userTypeInput.value;
        //const userType = 'client';
        saveMessageToDatabase(userType, message);
    }
    }

    function saveMessageToDatabase(userType, message) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'matencionCliente(ACLI)/insertACLI.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send(`tipoUsuario=${userType}&mensaje=${encodeURIComponent(message)}`);
    }

    function loadMessages() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'matencionCliente(ACLI)/readACLI.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const messages = JSON.parse(xhr.responseText);
                displayMessages(messages);
            }
        };
        xhr.send();
    }

    function displayMessages(messages) {
        messagesContainer.innerHTML = '';
        messages.forEach(message => {
            const messageElement = document.createElement('div');
            messageElement.classList.add('admin-message');
            messageElement.innerHTML = `
                <p><strong>${message.tipoUsuario}:</strong> ${message.mensaje}</p>
                <button onclick="replyToMessage(${message.id}, this)">Responder</button>
                <div class="admin-reply">${message.respuesta || ''}</div>
            `;
            messagesContainer.appendChild(messageElement);
        });
    }

    window.replyToMessage = function(messageId, button) {
        highlightMessage(button);
        disableOtherReplyButtons();
        replyMessageId.value = messageId;
        replyInput.focus();
        adminReplyForm.style.display = 'flex';
        button.disabled = true;
    };

    function highlightMessage(button) {
        const adminMessages = document.querySelectorAll('.admin-message');
        adminMessages.forEach(message => {
            message.classList.remove('highlight');
        });
        button.parentElement.classList.add('highlight');
    }

    function disableOtherReplyButtons() {
        const replyButtons = document.querySelectorAll('.admin-message button');
        replyButtons.forEach(button => {
            button.disabled = true;
        });
    }

    function enableOtherReplyButtons() {
        const replyButtons = document.querySelectorAll('.admin-message button');
        replyButtons.forEach(button => {
            button.disabled = false;
        });
    }

    adminReplyForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const replyMessage = replyInput.value.trim();
        if (replyMessage) {
            sendReplyToServer(replyMessageId.value, replyMessage);
        }
    });

    function sendReplyToServer(messageId, replyMessage) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'matencionCliente(ACLI)/responderACLI.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                adminReplyForm.style.display = 'none';
                replyInput.value = '';
                enableOtherReplyButtons();
                loadMessages();
            }
        };
        xhr.send(`id=${messageId}&respuesta=${encodeURIComponent(replyMessage)}`);
    }

  });
  