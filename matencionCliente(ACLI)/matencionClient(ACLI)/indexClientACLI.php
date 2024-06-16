<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat de Atención al Cliente</title>
    <link rel="stylesheet" href="matencionCliente(ACLI)/matencionAssets(ACLI)/styles/styleClientACLI.css">
</head>
<body>
    <div class="container" style="background-image: url('matencionCliente(ACLI)/matencionAssets(ACLI)/images/atencion-al-cliente.jpg');">
        <div class="login-container">
            <h1 class="login-title">Bienvenido al Chat de Atención al Cliente</h1>
            <p class="login-description">Selecciona una opción para ingresar:</p>
            <p class="login-description">Si eres un cliente y necesitas ayuda o asistencia, por favor selecciona "Ingresar al Chat" para enviar preguntas o selecciona "Ver respuestas" para ver respuestas a consultas realizadas. Estamos aquí para ayudarte en lo que necesites.</p>
            <img src="matencionCliente(ACLI)/matencionAssets(ACLI)/images/atencion.jpg" alt="Descripción de la imagen">
            <div class="login-options">
                <button class="login-button" id="client-login">Ingresar al Chat</button>
                <button class="login-button" id="cliente-answer">Ver respuestas</button>
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

        <div class="answers-container" id="answers-container" style="display: none;">
            <div class="chat-header">
                <h1 class="answers-title">Respuestas a tus Consultas</h1>
                <p class="chat-description">Aquí puedes ver las respuestas a las consultas que has realizado anteriormente.</p>
            </div>
            <div class="messages-container" id="messages-container">
                <!-- Aquí se cargarán las respuestas de las consultas del cliente -->
            </div>
        </div>

    </div>

    <script src="matencionCliente(ACLI)/matencionClient(ACLI)/atencionClientACLI.js"></script>
</body>
</html>
