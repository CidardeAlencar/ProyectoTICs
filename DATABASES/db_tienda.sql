-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2024 a las 05:01:14
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `ci` varchar(10) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `ci`, `cargo`, `estado`) VALUES
(1, 'Juan', 'Pérez', 'Gómez', '1234567890', 'Gerente General', 1),
(2, 'María', 'López', 'Fernández', '2345678901', 'Jefa de Ventas', 1),
(3, 'Carlos', 'García', 'Martínez', '3456789012', 'Administrador de Sistemas', 1),
(4, 'Ana', 'Rodríguez', 'Hernández', '4567890123', 'Coordinadora de Recursos Humanos', 1),
(5, 'Luis', 'Martín', 'González', '5678901234', 'Contador', 1),
(6, 'Elena', 'Sánchez', 'Díaz', '6789012345', 'Asistente Administrativa', 0),
(7, 'Miguel', 'Torres', 'Ramírez', '7890123456', 'Encargado de Logística', 1),
(8, 'Laura', 'Ramírez', 'Sosa', '8901234567', 'Jefa de Marketing', 1),
(9, 'Fernando', 'Hernández', 'Paredes', '9012345678', 'Director Financiero', 1),
(10, 'Sofía', 'Gómez', 'Castillo', '0123456789', 'Secretaria Ejecutiva', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `oferta` tinyint(1) DEFAULT 0,
  `ventas` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `categoria`, `imagen`, `oferta`, `ventas`) VALUES
(1, 'Silla Ergonómica', 59.99, 'Sillas', 'img/silla_ergonomica.jpg', 1, 25),
(2, 'Mesa de Comedor', 199.99, 'Mesas', 'img/mesa_comedor.jpg', 0, 15),
(3, 'Sofá de Cuero', 499.99, 'Sofás', 'img/sofa_cuero.jpg', 1, 10),
(4, 'Cama King Size', 799.99, 'Camas', 'img/cama_king.jpg', 0, 5),
(5, 'Estantería de Madera', 149.99, 'Estanterías', 'img/estanteria_madera.jpg', 1, 30),
(6, 'Mesa de Centro', 89.99, 'Mesas', 'img/mesa_centro.jpg', 0, 20),
(7, 'Silla de Oficina', 129.99, 'Sillas', 'img/silla_oficina.jpg', 1, 35),
(8, 'Cama Individual', 299.99, 'Camas', 'img/cama_individual.jpg', 0, 40),
(9, 'Sofá Seccional', 999.99, 'Sofás', 'img/sofa_seccional.jpg', 1, 8),
(10, 'Mesa de Noche', 49.99, 'Mesas', 'img/mesa_noche.jpg', 0, 25);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ci` (`ci`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
