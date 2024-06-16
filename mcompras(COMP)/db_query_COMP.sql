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
