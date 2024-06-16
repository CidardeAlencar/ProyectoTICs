-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2024 a las 05:28:20
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mcontratos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `clienteId` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`clienteId`, `nombre`, `direccion`, `telefono`, `email`, `fechaCreacion`) VALUES
(1, 'Cliente 1', 'Dirección 1', '111-1111', 'cliente1@example.com', '2024-06-04 14:48:14'),
(2, 'Cliente 2', 'Dirección 2', '222-2222', 'cliente2@example.com', '2024-06-04 14:48:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `contratoId` int(11) NOT NULL,
  `clienteId` int(11) NOT NULL,
  `proveedorId` int(11) NOT NULL,
  `empleadoId` int(11) NOT NULL,
  `productoServicioId` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date DEFAULT NULL,
  `monto` decimal(10,2) NOT NULL,
  `condiciones` text DEFAULT NULL,
  `estado` varchar(50) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaModificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`contratoId`, `clienteId`, `proveedorId`, `empleadoId`, `productoServicioId`, `fechaInicio`, `fechaFin`, `monto`, `condiciones`, `estado`, `fechaCreacion`, `fechaModificacion`) VALUES
(2, 2, 2, 2, 2, '2024-06-05', '2023-12-04', '2000.00', 'Condiciones del contrato 2', 'activo', '2024-06-04 14:48:15', '2024-06-04 23:23:42'),
(4, 1, 1, 1, 1, '2024-06-12', '2024-05-31', '565.00', 'fafafa', 'activo', '2024-06-04 15:03:26', '2024-06-04 15:03:26'),
(5, 2, 2, 2, 2, '2024-06-05', '2024-06-14', '424.00', '4455', 'activo', '2024-06-04 15:10:19', '2024-06-04 15:10:19'),
(10, 2, 2, 2, 2, '2024-06-20', '2024-06-06', '222.00', 'fdsfsdfdddhhjjhj', 'inactivo', '2024-06-04 20:47:21', '2024-06-04 22:43:27'),
(11, 1, 2, 2, 2, '2024-06-21', '2024-06-05', '848.00', 'adsda', 'activo', '2024-06-04 22:44:12', '2024-06-04 22:44:12'),
(13, 2, 2, 2, 2, '2024-05-30', '2024-06-06', '444.00', 'dddd', 'inactivo', '2024-06-04 22:44:55', '2024-06-04 22:45:02'),
(14, 1, 1, 1, 1, '0000-00-00', '2024-06-13', '77.00', 'sdasdad', 'inactivo', '2024-06-04 22:46:29', '2024-06-04 23:18:16'),
(15, 1, 1, 1, 1, '2024-06-13', '2024-06-12', '800.00', 'aaa', 'inactivo', '2024-06-04 23:09:50', '2024-06-04 23:37:16'),
(16, 2, 2, 2, 2, '2024-06-20', '2029-02-13', '3000000.00', 'gdf ppapas', 'activo', '2024-06-05 00:23:39', '2024-06-05 00:25:24'),
(17, 1, 1, 1, 1, '2024-06-28', '2027-06-28', '28000.00', 'bla bla bla we', 'inactivo', '2024-06-16 02:42:43', '2024-06-16 02:52:41'),
(18, 1, 2, 1, 1, '2024-06-02', '2030-06-02', '11000.00', 'CONTRAOTS Y YA', 'activo', '2024-06-16 03:07:38', '2024-06-16 03:15:53'),
(19, 2, 1, 2, 1, '2024-06-15', '2025-06-15', '15000.00', 'CONTRATO DE  PRODUCTOS', 'Activo', '2024-06-16 03:17:01', '2024-06-16 03:17:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `empleadoId` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `puesto` varchar(50) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`empleadoId`, `nombre`, `puesto`, `departamento`, `email`, `fechaCreacion`) VALUES
(1, 'Empleado 1', 'Puesto 1', 'Departamento 1', 'empleado1@example.com', '2024-06-04 14:48:14'),
(2, 'Empleado 2', 'Puesto 2', 'Departamento 2', 'empleado2@example.com', '2024-06-04 14:48:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosservicios`
--

CREATE TABLE `productosservicios` (
  `productoServicioId` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productosservicios`
--

INSERT INTO `productosservicios` (`productoServicioId`, `nombre`, `descripcion`, `precio`, `fechaCreacion`) VALUES
(1, 'Producto 1', 'Descripción 1', '100.00', '2024-06-04 14:48:15'),
(2, 'Producto 2', 'Descripción 2', '200.00', '2024-06-04 14:48:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `proveedorId` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`proveedorId`, `nombre`, `direccion`, `telefono`, `email`, `fechaCreacion`) VALUES
(1, 'Proveedor 1', 'Dirección 1', '333-3333', 'proveedor1@example.com', '2024-06-04 14:48:14'),
(2, 'Proveedor 2', 'Dirección 2', '444-4444', 'proveedor2@example.com', '2024-06-04 14:48:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`clienteId`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`contratoId`),
  ADD KEY `clienteId` (`clienteId`),
  ADD KEY `proveedorId` (`proveedorId`),
  ADD KEY `empleadoId` (`empleadoId`),
  ADD KEY `productoServicioId` (`productoServicioId`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`empleadoId`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `productosservicios`
--
ALTER TABLE `productosservicios`
  ADD PRIMARY KEY (`productoServicioId`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`proveedorId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clienteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `contratoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `empleadoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productosservicios`
--
ALTER TABLE `productosservicios`
  MODIFY `productoServicioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `proveedorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`clienteId`) REFERENCES `clientes` (`clienteId`),
  ADD CONSTRAINT `contratos_ibfk_2` FOREIGN KEY (`proveedorId`) REFERENCES `proveedores` (`proveedorId`),
  ADD CONSTRAINT `contratos_ibfk_3` FOREIGN KEY (`empleadoId`) REFERENCES `empleados` (`empleadoId`),
  ADD CONSTRAINT `contratos_ibfk_4` FOREIGN KEY (`productoServicioId`) REFERENCES `productosservicios` (`productoServicioId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
