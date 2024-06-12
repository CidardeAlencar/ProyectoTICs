-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS users_crup_php;

-- Usar la base de datos
USE users_crup_php;

-- Crear la tabla 'descuentos'
CREATE TABLE IF NOT EXISTS promociones(
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(255),
    producto VARCHAR(255),
    descripcion TEXT,
    fecha_inicio DATE,
    fecha_fin DATE,
    estado INT
);
