-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS users_crup_php;

-- Usar la base de datos
USE users_crup_php;

-- Crear la tabla 'clientes'
CREATE TABLE IF NOT EXISTS clientes (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(255) COLLATE utf8mb4_general_ci NOT NULL,
    email VARCHAR(255) COLLATE utf8mb4_general_ci NOT NULL,
    PRIMARY KEY (id)
);

-- Crear la tabla 'compra'
CREATE TABLE IF NOT EXISTS compra (
    id INT(11) NOT NULL AUTO_INCREMENT,
    numero_tarjeta VARCHAR(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
    nombre_titular VARCHAR(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    fecha_vencimiento DATE DEFAULT NULL,
    pago TINYINT(1) NOT NULL,
    metodo_pago VARCHAR(50) COLLATE utf8mb4_general_ci NOT NULL,
    fecha TIMESTAMP NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (id)
);

-- Crear la tabla 'proveedores'
CREATE TABLE IF NOT EXISTS proveedores (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(255) COLLATE utf8mb4_general_ci NOT NULL,
    contacto VARCHAR(255) COLLATE utf8mb4_general_ci NOT NULL,
    telefono VARCHAR(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
    PRIMARY KEY (id)
);

-- Query de llenado de la tabla proveedores con ejemplos
INSERT INTO proveedores (id, nombre, contacto, telefono)
VALUES 
(1, 'Proveedor 1', 'contacto1@example.com', '78895185'),
(2, 'Proveedor 2', 'contacto2@example.com', '78784289'),
(3, 'Proveedor 3', 'contacto3@example.com', '78912345'),
(4, 'Proveedor 4', 'contacto4@example.com', '78923456'),
(5, 'Proveedor 5', 'contacto5@example.com', '78934567'),
(6, 'Proveedor 6', 'contacto6@example.com', '78945678'),
(7, 'Proveedor 7', 'contacto7@example.com', '78956789'),
(8, 'Proveedor 8', 'contacto8@example.com', '78967890'),
(9, 'Proveedor 9', 'contacto9@example.com', '78978901'),
(10, 'Proveedor 10', 'contacto10@example.com', '78989012'),
(11, 'Proveedor 11', 'contacto11@example.com', '78990123'),
(12, 'Proveedor 12', 'contacto12@example.com', '78901234');
