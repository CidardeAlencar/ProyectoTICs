-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2024 a las 05:02:12
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
-- Base de datos: `users_crud_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `email`) VALUES
(1, 'Cidar', 'cidarandresdac@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments_ratings`
--

CREATE TABLE `comments_ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comments_ratings`
--

INSERT INTO `comments_ratings` (`id`, `user_id`, `product_id`, `comment`, `rating`, `created_at`, `updated_at`) VALUES
(1, 123, 121, 'Muy buen producto', 2, '2024-06-03 05:18:49', '2024-06-03 05:39:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `numero_tarjeta` varchar(20) DEFAULT NULL,
  `nombre_titular` varchar(255) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `pago` tinyint(1) NOT NULL,
  `metodo_pago` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `numero_tarjeta`, `nombre_titular`, `fecha_vencimiento`, `pago`, `metodo_pago`, `fecha`) VALUES
(1, 'ab61c252c7cdeb4aa27b', 'cidar', '2024-06-14', 1, 'Tarjeta', '2024-06-04 16:36:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `percentage` decimal(5,2) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedBy` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`id`, `productId`, `name`, `description`, `percentage`, `fechaInicio`, `fechaFin`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `status`) VALUES
(1, 1, 'Project Supernova', 'dsdasdsa', 20.00, '2024-06-12', '2024-06-12', '2024-06-12 01:16:35', 2, '2024-06-12 01:16:35', 2, 1),
(2, 1, '', '', 0.00, '2024-06-12', '2024-06-12', '2024-06-12 01:16:44', 2, '2024-06-12 01:16:44', 2, 1),
(3, 1, '', '', 0.00, '2024-06-12', '2024-06-12', '2024-06-12 01:17:03', 2, '2024-06-12 01:17:03', 2, 1),
(4, 1, '', '', 0.00, '2024-06-12', '2024-06-12', '2024-06-12 01:24:08', 2, '2024-06-12 01:24:08', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciondesempeno`
--

CREATE TABLE `evaluaciondesempeno` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) UNSIGNED NOT NULL,
  `nombreTrabajador` varchar(255) DEFAULT NULL,
  `cargoDesempeno` varchar(255) DEFAULT NULL,
  `fechaContratacion` date DEFAULT NULL,
  `antiguedad` int(11) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `funcionesA1` int(11) DEFAULT NULL,
  `funcionesA2` int(11) DEFAULT NULL,
  `funcionesA3` int(11) DEFAULT NULL,
  `funcionesA4` int(11) DEFAULT NULL,
  `conocimientosB1` int(11) DEFAULT NULL,
  `conocimientosB2` int(11) DEFAULT NULL,
  `conocimientosB3` int(11) DEFAULT NULL,
  `conocimientosB4` int(11) DEFAULT NULL,
  `supervisionC1` int(11) DEFAULT NULL,
  `supervisionC2` int(11) DEFAULT NULL,
  `supervisionC3` int(11) DEFAULT NULL,
  `supervisionC4` int(11) DEFAULT NULL,
  `desempenaD1` int(11) DEFAULT NULL,
  `desempenaD2` int(11) DEFAULT NULL,
  `desempenaD3` int(11) DEFAULT NULL,
  `desempenaD4` int(11) DEFAULT NULL,
  `reaccionaE1` int(11) DEFAULT NULL,
  `reaccionaE2` int(11) DEFAULT NULL,
  `reaccionaE3` int(11) DEFAULT NULL,
  `reaccionaE4` int(11) DEFAULT NULL,
  `consigueF1` int(11) DEFAULT NULL,
  `consigueF2` int(11) DEFAULT NULL,
  `consigueF3` int(11) DEFAULT NULL,
  `consigueF4` int(11) DEFAULT NULL,
  `manejarG1` int(11) DEFAULT NULL,
  `manejarG2` int(11) DEFAULT NULL,
  `manejarG3` int(11) DEFAULT NULL,
  `manejarG4` int(11) DEFAULT NULL,
  `estandaresH1` int(11) DEFAULT NULL,
  `estandaresH2` int(11) DEFAULT NULL,
  `estandaresH3` int(11) DEFAULT NULL,
  `estandaresH4` int(11) DEFAULT NULL,
  `equipoI1` int(11) DEFAULT NULL,
  `equipoI2` int(11) DEFAULT NULL,
  `equipoI3` int(11) DEFAULT NULL,
  `equipoI4` int(11) DEFAULT NULL,
  `ayudaJ1` int(11) DEFAULT NULL,
  `ayudaJ2` int(11) DEFAULT NULL,
  `ayudaJ3` int(11) DEFAULT NULL,
  `ayudaJ4` int(11) DEFAULT NULL,
  `personalK1` int(11) DEFAULT NULL,
  `personalK2` int(11) DEFAULT NULL,
  `personalK3` int(11) DEFAULT NULL,
  `personalK4` int(11) DEFAULT NULL,
  `reunionL1` int(11) DEFAULT NULL,
  `reunionL2` int(11) DEFAULT NULL,
  `reunionL3` int(11) DEFAULT NULL,
  `reunionL4` int(11) DEFAULT NULL,
  `ocasional` varchar(255) DEFAULT NULL,
  `mitad` varchar(255) DEFAULT NULL,
  `frecuente` varchar(255) DEFAULT NULL,
  `siempre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL DEFAULT 'activo',
  `imagen_principal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `categoria`, `estado`, `imagen_principal`) VALUES
(1, 'Sal', 'Sal yodada', 35.00, 'sal', 'activo', ''),
(6, 'Peluche Cidar', 'grande', 100.00, 'juguetes', 'activo', ''),
(7, 'Refresco Ruddy', 'Bebida gaseosa', 10.00, 'Bebidas', 'activo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `producto` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Cesar', 'Ali', 'Nogales', 'cesarali740@gmail.com', 72502333, '$2y$10$AR40PCQ/GXZDxpyX2./zsO.HxcLM8BHfvo6VYnMS3kqxSo5h/ADqq', '2024-04-28 18:20:54', 'admin', 1, 0),
(2, 'Cidar de Alencar Calle', 'de Alencar', 'Calle', 'cidarandresdac@zohomail.com', 758857, '$2y$10$AR40PCQ/GXZDxpyX2./zsO.HxcLM8BHfvo6VYnMS3kqxSo5h/ADqq', '2024-06-05 01:37:43', 'admin', 1, 0),
(7, 'Ruddy Gerardo', 'Herrera', 'Flores', 'cjdnjc@gmail.com', 5567567, '$2y$10$AR40PCQ/GXZDxpyX2./zsO.HxcLM8BHfvo6VYnMS3kqxSo5h/ADqq', '2024-06-05 01:37:58', 'admin', 1, 0),
(11, 'Alejandra', 'Masias', 'Arebalo', 'mariadelcarmencallemontalvo@gmail.com', 3445254, '$2y$10$AR40PCQ/GXZDxpyX2./zsO.HxcLM8BHfvo6VYnMS3kqxSo5h/ADqq', '2024-06-05 01:39:39', 'user', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `username`, `password`, `email`) VALUES
(2, 'Andres', 'Calle', 'andres26', '123456789', 'andrescalle@gmail.com'),
(3, 'RCD', 'Calle', '9897642', '1233456', 'dealencartrujillonelsoncidar@gmail.com'),
(4, 'Cidar Andres de Alencar Calle', 'de Alencar Calle', '9897642', 'fsfsdfd', 'cidarandresdac@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comments_ratings`
--
ALTER TABLE `comments_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`),
  ADD KEY `createdBy` (`createdBy`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indices de la tabla `evaluaciondesempeno`
--
ALTER TABLE `evaluaciondesempeno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comments_ratings`
--
ALTER TABLE `comments_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `evaluaciondesempeno`
--
ALTER TABLE `evaluaciondesempeno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD CONSTRAINT `descuentos_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `descuentos_ibfk_2` FOREIGN KEY (`createdBy`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `descuentos_ibfk_3` FOREIGN KEY (`updatedBy`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `evaluaciondesempeno`
--
ALTER TABLE `evaluaciondesempeno`
  ADD CONSTRAINT `evaluaciondesempeno_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
