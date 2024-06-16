document.addEventListener('DOMContentLoaded', function() {
    const clientLoginButton = document.getElementById('client-login');
    const clientAnswerButton = document.getElementById('cliente-answer');
    const chatContainer = document.getElementById('chat-container');
    const loginContainer = document.querySelector('.login-container');
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const chatBox = document.getElementById('chat-box');
    const answersContainer = document.getElementById('answers-container');
    const messagesContainer = document.getElementById('messages-container');

    const clientId = 124; // ID del cliente para pruebas
    let userType = '';
  
    clientLoginButton.addEventListener('click', function() {
        userType = 'client';
        showChat();
    });

    clientAnswerButton.addEventListener('click', function() {
        userType = 'client';
        showClientAnswers();
    });

    function showChat() {
        loginContainer.style.display = 'none';
        chatContainer.style.display = 'block';
    }

    function showClientAnswers() {
        loginContainer.style.display = 'none';
        answersContainer.style.display = 'block';
        loadClientMessages();
    }
  
    //ENVIO DE MENSAJES

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
          saveMessageToDatabase(userType, clientId, message);
      }
    }

    function saveMessageToDatabase(userType, clientId, message) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'matencionCliente(ACLI)/matencionClient(ACLI)/insertACLI.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send(`tipoUsuario=${userType}&clientId=${clientId}&mensaje=${encodeURIComponent(message)}`);
    }

    // VER RESPUESTAS

    function loadClientMessages() {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'matencionCliente(ACLI)/matencionClient(ACLI)/readClientACLI.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log('Respuesta del servidor:', xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                if (response.error) {
                    console.error(response.error);
                    // Mostrar error al usuario si es necesario
                } else {
                    displayMessages(response);
                }
            }
        };
        xhr.send(`clientId=${clientId}`);
    }

    function displayMessages(messages) {
        console.log('Mensajes para mostrar:', messages);
        messagesContainer.innerHTML = '';
        messages.forEach(message => {
            if (message.clientId == clientId) { // Filtrar por clientId
                const messageElement = document.createElement('div');
                messageElement.classList.add('client-message');
                const formattedDate = new Date(message.fecha).toLocaleDateString('es-ES', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric'
                });
                messageElement.innerHTML = `
                    <p><strong>Fecha:</strong> ${formattedDate}</p>
                    <p><strong>Pregunta:</strong> ${message.mensaje}</p>
                    ${message.respuesta ? `<p class="client-reply"><strong>Respuesta:</strong> ${message.respuesta}</p>` : '<p class="client-reply"><strong>Respuesta:</strong> En espera</p>'}
                `;
                messagesContainer.appendChild(messageElement);
            }
        });
    }
});
