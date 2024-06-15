<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat de Atención al Cliente</title>
    <link rel="stylesheet" href="matencionCliente(ACLI)/styles/styleACLI.css">
</head>
<body>
    <div class="container" style="background-image: url('matencionCliente(ACLI)/images/atencion-al-cliente.jpg');">
        <div class="login-container">
            <h1 class="login-title">Bienvenido al Chat de Atención al Cliente</h1>
            <p class="login-description">Selecciona una opción para ingresar:</p>
            <p class="login-description">Si eres un cliente y necesitas ayuda o asistencia, por favor selecciona "Ingresar como Cliente". Si eres un administrador o empleado y necesitas acceder a las herramientas de gestión, selecciona "Ingresar como Administrador". Estamos aquí para ayudarte en lo que necesites.</p>
            <img src="matencionCliente(ACLI)/images/atencion.jpg" alt="Descripción de la imagen">
            <div class="login-options">
                <button class="login-button" id="client-login">Ingresar como Cliente</button>
                <button class="login-button" id="admin-login">Ingresar como Administrador</button>
            </div>
        </div>

        <div class="chat-container" id="chat-container" style="display: none;">
            <div class="chat-header">
                <h1 class="chat-title">Chat de Atención al Cliente</h1>
                <p class="chat-description">Utiliza este chat para comunicarte con nuestro equipo de atención al cliente. Estamos aquí para ayudarte con cualquier pregunta o problema que puedas tener.</p>
            </div>
            <div class="chat-box" id="chat-box">
                <!-- Aquí se mostrarán los mensajes -->
            </div>
            <form id="chat-form" class="chat-form">
                <input type="text" id="chat-input" placeholder="Escribe tu mensaje aquí..." required>
                <input type="hidden" id="user-type" value="client">
                <button type="submit" class="send-button">Enviar</button>
            </form>
        </div>

        <div class="admin-container" id="admin-container" style="display: none;">
            <div class="chat-header">
                <h1 class="admin-title">Interfaz del Administrador</h1>
                <p class="chat-description">Responde las consultas pendientes. Los mensajes pendientes de los clientes se muestran a continuación.</p>
            </div>
            <div class="messages-container" id="messages-container">
                <!-- Aquí se cargarán los mensajes de los clientes -->
            </div>
            <form id="admin-reply-form" class="admin-reply-form">
                <input type="hidden" id="reply-message-id">
                <input id="reply-input" placeholder="Escribe tu respuesta aquí..." required>
                <button type="submit" class="send-reply-button">Enviar Respuesta</button>
            </form>
        </div>

    </div>

    <script src="matencionCliente(ACLI)/atencionACLI.js"></script>
</body>
</html>
