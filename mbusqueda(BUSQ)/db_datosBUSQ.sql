-- Crear la base de datos
CREATE DATABASE users_crud_php;

-- Usar la base de datos creada
USE users_crud_php;

-- Crear la tabla de productos
CREATE TABLE productos_busq (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    categoria VARCHAR(50),
    imagen VARCHAR(255),
    oferta TINYINT(1) DEFAULT 0,
    ventas INT DEFAULT 0
);

-- Insertar los valores para los productos de muebles
INSERT INTO productos_busq (nombre, precio, categoria, imagen, oferta, ventas) VALUES 
('Silla Ergonómica', 59.99, 'Sillas', '../assets/images/collection/arrivals1.png', 0, 25),
('Mesa de Comedor', 199.99, 'Mesas', '../assets/images/collection/arrivals6.png', 0, 15),
('Sofá de Cuero', 499.99, 'Sofás', '../assets/images/collection/arrivals2.png', 1, 10),
('Cama King Size', 799.99, 'Camas', '../assets/images/collection/arrivals8.png', 0, 5),
('Estantería de Madera', 149.99, 'Estanterías', '../assets/images/collection/arrivals6.png', 1, 30),
('Mesa de Centro', 89.99, 'Mesas', '../assets/images/collection/arrivals6.png', 0, 20),
('Silla de Oficina', 129.99, 'Sillas', '../assets/images/collection/arrivals4.png', 1, 35),
('Cama Individual', 299.99, 'Camas', '../assets/images/collection/arrivals8.png', 0, 40),
('Sofá Seccional', 999.99, 'Sofás', '../assets/images/collection/arrivals7.png', 1, 8),
('Mesa de Noche', 49.99, 'Mesas', '../assets/images/collection/arrivals6.png', 0, 25),
('Silla mesedora', 80.50, 'Sillas', '../assets/images/collection/arrivals3.png', 0, 30),
('Silla aesthetic', 185.50, 'Sillas', '../assets/images/collection/arrivals5.png', 1, 10);

-- Crear la tabla de administradores
CREATE TABLE admins_busq (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido_paterno VARCHAR(50) NOT NULL,
    apellido_materno VARCHAR(50) NOT NULL,
    ci VARCHAR(10) NOT NULL UNIQUE,
    cargo VARCHAR(50) NOT NULL,
    estado TINYINT(1) NOT NULL DEFAULT 1
);

-- Insertar los valores para los administradores
INSERT INTO admins_busq (nombre, apellido_paterno, apellido_materno, ci, cargo, estado) VALUES
('Juan', 'Pérez', 'Gómez', '1234567890', 'Gerente General', 1),
('María', 'López', 'Fernández', '2345678901', 'Jefa de Ventas', 1),
('Carlos', 'García', 'Martínez', '3456789012', 'Administrador de Sistemas', 1),
('Ana', 'Rodríguez', 'Hernández', '4567890123', 'Coordinadora de Recursos Humanos', 1),
('Luis', 'Martín', 'González', '5678901234', 'Contador', 1),
('Elena', 'Sánchez', 'Díaz', '6789012345', 'Asistente Administrativa', 0),
('Miguel', 'Torres', 'Ramírez', '7890123456', 'Encargado de Logística', 1),
('Laura', 'Ramírez', 'Sosa', '8901234567', 'Jefa de Marketing', 1),
('Fernando', 'Hernández', 'Paredes', '9012345678', 'Director Financiero', 1),
('Sofía', 'Gómez', 'Castillo', '0123456789', 'Secretaria Ejecutiva', 1);
