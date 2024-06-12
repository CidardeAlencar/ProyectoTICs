-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2024 a las 05:01:23
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
-- Base de datos: `gestion_personal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `numero_celular` varchar(15) NOT NULL,
  `ci` varchar(15) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `departamento` varchar(255) NOT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `apellido`, `correo`, `numero_celular`, `ci`, `cargo`, `departamento`, `estado`) VALUES
(1, 'Alejandro', 'Montaño', 'alex@gmail.com', '75222681', '8414651', 'Supervisor', 'Sistemas', 1),
(2, 'Carlos2', 'Lopez', 'carlos@gmail.com', '45446465', '123456', 'ayudante', 'Almacén', 1),
(3, '', '', '', '', '9897642', '', '', 0),
(4, 'Cidar Andres', 'de Alencar Calle', 'dealencartrujillonelsoncidar@gmail.com', '7956422', '9897642', 'Estudiante', 'Gerencia', 1),
(5, 'Ruddy', 'Flores', 'ninja@gmail.com', '5453454', '43423423', 'Estudiante', 'Gerencia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_academicos`
--

CREATE TABLE `registros_academicos` (
  `id_registro` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `grado` varchar(255) NOT NULL,
  `institucion` varchar(255) NOT NULL,
  `año_de_completacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros_academicos`
--

INSERT INTO `registros_academicos` (`id_registro`, `id_empleado`, `grado`, `institucion`, `año_de_completacion`) VALUES
(1, 1, 'Maestría', 'emi', 2024),
(3, 3, 'Licenciatura', 'CBA', 1970);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `registros_academicos`
--
ALTER TABLE `registros_academicos`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registros_academicos`
--
ALTER TABLE `registros_academicos`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registros_academicos`
--
ALTER TABLE `registros_academicos`
  ADD CONSTRAINT `registros_academicos_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
