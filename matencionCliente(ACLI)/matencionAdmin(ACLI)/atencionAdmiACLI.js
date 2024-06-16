document.addEventListener('DOMContentLoaded', function() {
    const adminLoginButton = document.getElementById('admin-login');
    const adminContainer = document.getElementById('admin-container');
    const messagesContainer = document.getElementById('messages-container');
    const loginContainer = document.querySelector('.login-container');
    const replyForm = document.getElementById('admin-reply-form');
    const replyInput = document.getElementById('reply-input');
    const sendReplyButton = document.querySelector('.send-reply-button');
    const replyMessageId = document.getElementById('reply-message-id');
    const withResponseCheckbox = document.getElementById('with-response');
    const withoutResponseCheckbox = document.getElementById('without-response');
    const showAllCheckbox = document.getElementById('show-all');
    document.getElementById('reply-input').disabled = true;
    document.querySelector('.send-reply-button').disabled = true;
    const dialogOverlay = document.getElementById('dialog-overlay');

    // Marcar "Mostrar Todos" por defecto al cargar la página
    showAllCheckbox.checked = true;

    // Mostrar interfaz del administrador al hacer clic en Ver mensajes pendientes
    adminLoginButton.addEventListener('click', function() {
        loginContainer.style.display = 'none';
        adminContainer.style.display = 'block';
        let filter = 'all';
        loadMessages(filter); // Cargar mensajes al mostrar el contenedor
    });

    // Función para cargar mensajes de los clientes
    function loadMessages(filter) {
        if (withResponseCheckbox.checked) {
            filter = 'with_response';
            withoutResponseCheckbox.checked = false; // Desmarcar el checkbox sin respuesta
            showAllCheckbox.checked = false; // Desmarcar el checkbox mostrar todos
        } else if (withoutResponseCheckbox.checked) {
            filter = 'without_response';
            withResponseCheckbox.checked = false; // Desmarcar el checkbox con respuesta
            showAllCheckbox.checked = false; // Desmarcar el checkbox mostrar todos
        } else {
            filter = 'all';
            withResponseCheckbox.checked = false; // Desmarcar el checkbox con respuesta
            withoutResponseCheckbox.checked = false; // Desmarcar el checkbox sin respuesta
        }

        fetch('matencionCliente(ACLI)/matencionAdmin(ACLI)/readMessages.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ filter })
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Network response was not ok.');
        })
        .then(data => {
            if (data.error) {
                console.error('Error al cargar mensajes:', data.error);
            } else {
                console.log(data);
                displayMessages(data); // Mostrar los mensajes recibidos
            }
        })
        .catch(error => console.error('Hubo un problema con la operación de fetch:', error));
    }

    // Función para mostrar los mensajes en la interfaz del administrador
    function displayMessages(messages) {
        const messagesContainer = document.getElementById('messages-container');
        const replyInput = document.getElementById('reply-input');
        const sendReplyButton = document.querySelector('.send-reply-button');

        messagesContainer.innerHTML = ''; // Limpiar el contenedor de mensajes antes de agregar nuevos

        messages.forEach(message => {
            const messageElement = document.createElement('div');
            messageElement.classList.add('chat-message');
            messageElement.innerHTML = `
                <div class="message-details">
                    <p><strong>ID:</strong> ${message.id}</p>
                    <p><strong>Mensaje:</strong> ${message.mensaje}</p>
                    <p><strong>Respuesta:</strong> ${message.respuesta}</p>
                    <p><strong>Tipo de Usuario:</strong> ${message.tipoUsuario}</p>
                    <p><strong>Cliente ID:</strong> ${message.clientId}</p>
                    <p><strong>Fecha:</strong> ${message.fecha}</p>
                </div>
                <div class="message-action">
                    <button class="reply-button" data-id="${message.id}">${message.respuesta ? 'Modificar' : 'Agregar'}</button>
                </div>
            `;
            // Agregar evento al hacer clic en el mensaje completo
            messageElement.addEventListener('click', function() {
                // Remover la clase de todos los elementos de mensajes
                document.querySelectorAll('.chat-message').forEach(msg => {
                    msg.classList.remove('selected-message');
                });

                // Agregar la clase al mensaje seleccionado
                messageElement.classList.add('selected-message');
            });

            messagesContainer.appendChild(messageElement);
        });

        // Agregar event listener a todos los botones de respuesta
        document.querySelectorAll('.reply-button').forEach(button => {
            button.addEventListener('click', function() {
                const messageId = this.getAttribute('data-id');
                const message = messages.find(m => m.id === messageId);
                document.getElementById('reply-message-id').value = messageId;
                replyInput.value = message.respuesta || '';
                
                // Habilitar el input y el botón
                replyInput.disabled = false;
                sendReplyButton.disabled = false;

                replyInput.focus();
            });
        });
    }

    // Enviar respuesta del administrador al mensaje del cliente
    replyForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const messageId = document.getElementById('reply-message-id').value;
        const replyMessage = replyInput.value.trim();

        fetch('matencionCliente(ACLI)/matencionAdmin(ACLI)/updateMessages.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                messageId: messageId,
                respuesta: replyMessage
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Error al guardar la respuesta:', data.error);
            } else {
                // Mostrar el cuadro flotante de éxito
                showDialog();
                replyInput.value = '';
                replyInput.disabled = true;
                sendReplyButton.disabled = true;
                loadMessages(); // Recargar los mensajes después de enviar la respuesta
            }
        })
        .catch(error => console.error('Hubo un problema con la operación de fetch:', error));
    });

    // Función para mostrar el cuadro flotante
    function showDialog() {
        dialogOverlay.style.display = 'flex';
        setTimeout(hideDialog, 3000); // Ocultar el cuadro flotante después de 3 segundos (opcional)
    }

    // Función para ocultar el cuadro flotante
    function hideDialog() {
        dialogOverlay.style.display = 'none';
    }

    // Escuchar cambios en los checkboxes para recargar los mensajes
    withResponseCheckbox.addEventListener('change', function() {
        console.log("withresponse");
        if (withResponseCheckbox.checked) {
            withoutResponseCheckbox.checked = false;
            showAllCheckbox.checked = false;
            let filter = 'with_response';
            loadMessages(filter);
        } else {
            // Asegurar que siempre esté marcado con respuesta si uno está seleccionado
            if (!withoutResponseCheckbox.checked && !showAllCheckbox.checked) {
                withResponseCheckbox.checked = true;
            }
        }
    });

    withoutResponseCheckbox.addEventListener('change', function() {
        if (withoutResponseCheckbox.checked) {
            withResponseCheckbox.checked = false;
            showAllCheckbox.checked = false;
            let filter = 'without_response';
            loadMessages(filter);
        } else {
            // Asegurar que siempre esté marcado sin respuesta si uno está seleccionado
            if (!withResponseCheckbox.checked && !showAllCheckbox.checked) {
                withoutResponseCheckbox.checked = true;
            }
        }
    });

    showAllCheckbox.addEventListener('change', function() {
        if (showAllCheckbox.checked) {
            withResponseCheckbox.checked = false;
            withoutResponseCheckbox.checked = false;
            let filter = 'all';
            loadMessages(filter);
        } else {
            // Asegurar que siempre esté marcado mostrar todos si uno está seleccionado
            if (!withResponseCheckbox.checked && !withoutResponseCheckbox.checked) {
                showAllCheckbox.checked = true;
            }
        }
    });
});
