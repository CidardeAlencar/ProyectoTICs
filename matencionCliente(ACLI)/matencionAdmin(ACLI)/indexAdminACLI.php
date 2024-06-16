<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat de Atención al Cliente</title>
    <link rel="stylesheet" href="matencionCliente(ACLI)/matencionAssets(ACLI)/styles/styleAdminACLI.css">
</head>
<body>
<div class="container" style="background-image: url('matencionCliente(ACLI)/matencionAssets(ACLI)/images/atencion-al-cliente.jpg');">
        <div class="login-container">
            <h1 class="login-title">Bienvenido al Chat de Atención al Cliente</h1>
            <p class="login-description">Selecciona una opción como administrador:</p>
            <p class="login-description">Selecciona "Ver mensajes" para ver los mensajes de los clientes.</p>
            <img src="matencionCliente(ACLI)/matencionAssets(ACLI)/images/atencion.jpg" alt="Descripción de la imagen">
            <div class="login-options">
                <button class="login-button" id="admin-login">Ver mensajes</button>
            </div>
        </div>

        <div class="admin-container" id="admin-container" style="display: none;">
            <div class="chat-header">
                <h1 class="admin-title">Interfaz del Administrador</h1>
                <p class="chat-description">Responde las consultas pendientes. Los mensajes pendientes de los clientes se muestran a continuación. Dale click en la opción para ver mensajes con respuesta, sin respuesta o todos.</p>
            </div>
            <!-- Controles para filtrar los mensajes -->
            <div class="filter-controls">
                <label><input type="checkbox" id="show-all" checked> Mostrar Todos</label>
                <label><input type="checkbox" id="with-response"> Con Respuesta</label>
                <label><input type="checkbox" id="without-response"> Sin Respuesta</label>
            </div>
            <div class="messages-container" id="messages-container">
                <!-- Aquí se cargarán los mensajes de los clientes -->
            </div>
            <form id="admin-reply-form" class="admin-reply-form">
                <input type="hidden" id="reply-message-id">
                <div class="admin-reply-input">
                    <input id="reply-input" placeholder="Escribe tu respuesta aquí..." required disabled>
                    <button type="submit" class="send-reply-button" disabled>Enviar Respuesta</button>
                </div>
            </form>
        </div>
    </div>
    <div id="dialog-overlay" class="dialog-overlay">
        <div class="dialog-content">
            <p>Respuesta enviada correctamente.</p>
        </div>
    </div>

    <script src="matencionCliente(ACLI)/matencionAdmin(ACLI)/atencionAdmiACLI.js"></script>
</body>
</html>
