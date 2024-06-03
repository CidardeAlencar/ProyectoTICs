-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-06-2024 a las 16:08:42
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

START TRANSACTION;

CREATE TABLE productos (
  id_producto INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  descripcion TEXT DEFAULT NULL,
  precio DECIMAL(10,2) NOT NULL,
  categoria VARCHAR(255) NOT NULL,
  estado ENUM('activo','inactivo') NOT NULL DEFAULT 'activo',
  imagen_principal VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id_producto)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcado de datos para la tabla `productos`
INSERT INTO productos (nombre, descripcion, precio, categoria, estado, imagen_principal) VALUES
('Sal', 'Sal yodada', 35.00, 'sal', 'activo', '');

COMMIT;
