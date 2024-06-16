-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS users_crud_php;

-- Usar la base de datos
USE users_crud_php;

-- Crear la tabla para almacenar los mensajes del cliente
CREATE TABLE IF NOT EXISTS mensajes_cliente (
    id INT(11) NOT NULL AUTO_INCREMENT,
    mensaje TEXT NOT NULL,
    respuesta TEXT NOT NULL,
    tipoUsuario VARCHAR(50) NOT NULL,
    clientId INT(11) NOT NULL,
    fecha TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);