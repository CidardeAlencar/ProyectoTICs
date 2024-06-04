-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-06-2024 a las 00:12:12
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `OSAI`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apPAt` varchar(50) NOT NULL,
  `apMAt` varchar(50) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` bigint(20) UNSIGNED NOT NULL,
  `password_hash` varchar(255) NOT NULL DEFAULT '$2y$10$AR40PCQ/GXZDxpyX2./zsO.HxcLM8BHfvo6VYnMS3kqxSo5h/ADqq',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rol` enum('admin','user') NOT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `cambio_pass` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `apPAt`, `apMAt`, `correo`, `telefono`, `password_hash`, `fecha`, `rol`, `estado`, `cambio_pass`) VALUES
(1, 'Cesar', 'Ali', 'Nogales', 'cesarali740@gmail.com', 72502333, '$2y$10$AR40PCQ/GXZDxpyX2./zsO.HxcLM8BHfvo6VYnMS3kqxSo5h/ADqq', '2024-04-28 14:20:54', 'admin', 1, 0),
(6, 'Alejandro', 'Montaño', 'Sugeno', 'Alexityco@gmail.com', 7888880, '$2y$10$AR40PCQ/GXZDxpyX2./zsO.HxcLM8BHfvo6VYnMS3kqxSo5h/ADqq', '2024-05-06 13:28:46', 'user', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
