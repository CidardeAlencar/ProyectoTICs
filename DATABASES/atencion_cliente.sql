-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2024 a las 05:01:01
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
-- Base de datos: `atencion_cliente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_preguntas`
--

CREATE TABLE `users_preguntas` (
  `id_preg` int(11) NOT NULL,
  `user` text NOT NULL,
  `pregunta` text NOT NULL,
  `respuesta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users_preguntas`
--

INSERT INTO `users_preguntas` (`id_preg`, `user`, `pregunta`, `respuesta`) VALUES
(1, '', 'Hola', ''),
(2, '', 'd', ''),
(3, '', 'dd', ''),
(4, '', 'ruddy', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users_preguntas`
--
ALTER TABLE `users_preguntas`
  ADD PRIMARY KEY (`id_preg`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users_preguntas`
--
ALTER TABLE `users_preguntas`
  MODIFY `id_preg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
