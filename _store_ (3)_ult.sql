-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2020 a las 03:19:53
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `_store_`
--
CREATE DATABASE IF NOT EXISTS `_store_` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `_store_`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activo`
--

CREATE TABLE `activo` (
  `Id_usuario` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `ult_vez` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `Id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`Id_admin`) VALUES
(3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat_mensaje`
--

CREATE TABLE `chat_mensaje` (
  `Id_chat_msj` int(11) NOT NULL,
  `Id_emisor` int(11) NOT NULL,
  `Id_receptor` int(11) NOT NULL,
  `chat_msj` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Id_cliente` int(11) NOT NULL,
  `gustos` varchar(255) DEFAULT NULL,
  `genero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id_cliente`, `gustos`, `genero`) VALUES
(1, 'xvxc', 'cvcxv'),
(15, 'prras', 'vato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `Id_cliente` int(11) NOT NULL,
  `Id_producto` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `Id_compra` int(11) NOT NULL,
  `Id_cliente` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion_producto`
--

CREATE TABLE `descripcion_producto` (
  `Id_producto` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `talla` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `descripcion_producto`
--

INSERT INTO `descripcion_producto` (`Id_producto`, `precio`, `stock`, `talla`) VALUES
(3, '300.00', 6, 'xs'),
(3, '400.60', 6, 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `Id_compra` int(11) NOT NULL,
  `Id_producto` int(11) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `Id_oferta` int(11) NOT NULL,
  `Id_producto` int(11) NOT NULL,
  `porcentaje` decimal(6,2) NOT NULL,
  `fec_inicio` datetime NOT NULL,
  `fec_fin` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_producto` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `detalles` longtext DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `tipo` varchar(30) NOT NULL,
  `Fecha_lanzamiento` date NOT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `imgs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_producto`, `nombre`, `detalles`, `marca`, `tipo`, `Fecha_lanzamiento`, `categoria`, `imgs`, `status`) VALUES
(3, 'amaury', 'fdfdsfdsf', 'zxczx', 'ddsf', '2020-12-08', 'fsfsd', '{\"sd\":\"2\"}', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_usuario` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passw` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `p_nombre` varchar(25) NOT NULL,
  `s_nombre` varchar(25) DEFAULT NULL,
  `ape_pat` varchar(25) NOT NULL,
  `ape_mat` varchar(25) DEFAULT NULL,
  `fec_nac` date NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `ciudad` varchar(25) NOT NULL,
  `colonia` varchar(25) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `calle` varchar(25) NOT NULL,
  `numero` int(11) NOT NULL,
  `num_interior` varchar(5) DEFAULT NULL,
  `cod_postal` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_usuario`, `username`, `passw`, `email`, `p_nombre`, `s_nombre`, `ape_pat`, `ape_mat`, `fec_nac`, `telefono`, `ciudad`, `colonia`, `estado`, `calle`, `numero`, `num_interior`, `cod_postal`) VALUES
(1, 'Nourish', 'hola', 'amaury@wuu.com', 'Jesus', 'Amaury', 'romo', 'hernandez', '2000-05-02', '5464646', 'sdsadsa', 'dsadasd', 'dsadsad', 'dsadas', 5, 'a', '20420'),
(3, 'Nourish99', 'hola', 'amaury@wuu.com', 'Jesus', 'Amaury', 'romo', 'hernandez', '2000-05-02', '5464646', 'sdsadsa', 'dsadasd', 'dsadsad', 'dsadas', 5, NULL, '20420'),
(15, 'promos', '0acc00bf8abac7533d0e07b01b8079fb6ec4b4c5', 'al255798@edu.uaa.mx', 'Amaury', '', 'Romo', '', '2000-03-10', '4498049629', 'dvfd', 'gdfgfd', 'Aguascalientes', 'gdgdfg', 8, '6', '3454');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activo`
--
ALTER TABLE `activo`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indices de la tabla `chat_mensaje`
--
ALTER TABLE `chat_mensaje`
  ADD PRIMARY KEY (`Id_chat_msj`),
  ADD KEY `fk_emisor` (`Id_emisor`),
  ADD KEY `fk_receptor` (`Id_receptor`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id_cliente`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD KEY `comentarios_ibfk_1` (`Id_cliente`),
  ADD KEY `comentarios_ibfk_2` (`Id_producto`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`Id_compra`),
  ADD KEY `Id_cliente` (`Id_cliente`);

--
-- Indices de la tabla `descripcion_producto`
--
ALTER TABLE `descripcion_producto`
  ADD KEY `fk_id_prod` (`Id_producto`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD KEY `Id_compra` (`Id_compra`),
  ADD KEY `Id_producto` (`Id_producto`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`Id_oferta`),
  ADD KEY `fk_id_producto` (`Id_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat_mensaje`
--
ALTER TABLE `chat_mensaje`
  MODIFY `Id_chat_msj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `Id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `Id_oferta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activo`
--
ALTER TABLE `activo`
  ADD CONSTRAINT `activo_ibfk_1` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`Id_admin`) REFERENCES `usuario` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `chat_mensaje`
--
ALTER TABLE `chat_mensaje`
  ADD CONSTRAINT `fk_emisor` FOREIGN KEY (`Id_emisor`) REFERENCES `usuario` (`Id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_receptor` FOREIGN KEY (`Id_receptor`) REFERENCES `usuario` (`Id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`Id_cliente`) REFERENCES `usuario` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`Id_cliente`) REFERENCES `cliente` (`Id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`Id_producto`) REFERENCES `producto` (`ID_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`Id_cliente`) REFERENCES `cliente` (`Id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `descripcion_producto`
--
ALTER TABLE `descripcion_producto`
  ADD CONSTRAINT `descripcion_producto_ibfk_1` FOREIGN KEY (`Id_producto`) REFERENCES `producto` (`ID_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`Id_compra`) REFERENCES `compra` (`Id_compra`),
  ADD CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`Id_producto`) REFERENCES `producto` (`ID_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
