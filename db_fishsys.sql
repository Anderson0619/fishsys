-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2022 a las 23:19:32
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_fishsys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `id` bigint(11) NOT NULL,
  `ordenid` bigint(20) NOT NULL,
  `comercialid` bigint(20) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `id` bigint(11) NOT NULL,
  `comercialid` bigint(20) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `idcliente` bigint(20) NOT NULL,
  `identificacion` varchar(20) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tipocliente` int(30) NOT NULL DEFAULT 1,
  `direccion` varchar(100) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `rolid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_cliente`
--

INSERT INTO `tb_cliente` (`idcliente`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email`, `tipocliente`, `direccion`, `datecreated`, `status`, `rolid`) VALUES
(5, '1314785254', 'Camila C', 'Ponce', '987541484', 'camila@gmail.com', 0, '', '2022-09-01 12:16:39', 1, 7),
(6, '1318524992', 'Anthony', 'Mera', '98762300', 'anthony@gmail.com', 3, 'Brasilia', '2022-09-01 12:28:07', 1, 7),
(7, '1320515151', 'Anabell', 'Chica', '99985655', 'anabell@gmail.com', 0, '', '2022-09-01 12:38:39', 1, 7),
(11, '13074178455', 'Mathias', 'Mendoza M', '987451265', 'mathias@gmail.com', 2, 'Paris', '2022-09-01 13:09:47', 1, 7),
(12, '1317891313', 'Caroline', 'Loor', '98789456', 'caroline@gmail.com', 4, 'Brasilia', '2022-09-01 13:57:19', 1, 7),
(13, '13196325874100', 'Samari J', 'GarcÃ­a M', '987654132', 'samari@gmail.com', 4, 'Puerto LÃ³pez', '2022-09-01 15:13:41', 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comercial`
--

CREATE TABLE `tb_comercial` (
  `idcomercial` bigint(20) NOT NULL,
  `nprofor` varchar(20) NOT NULL,
  `especieid` bigint(20) NOT NULL,
  `clienteid` bigint(20) NOT NULL,
  `puerto` varchar(60) NOT NULL,
  `producto` varchar(60) NOT NULL,
  `descripcion` text NOT NULL,
  `cantcaja` int(6) NOT NULL,
  `unixcaja` int(6) NOT NULL,
  `tamform` varchar(11) NOT NULL,
  `pesneto` int(5) NOT NULL,
  `pesdren` int(5) NOT NULL,
  `aceprom` int(5) NOT NULL,
  `aguprom` int(5) NOT NULL,
  `migprom` int(5) NOT NULL,
  `salprom` decimal(5,2) NOT NULL,
  `tipcarton` varchar(50) NOT NULL,
  `tipcod` varchar(30) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `fecenvi` varchar(15) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_comercial`
--

INSERT INTO `tb_comercial` (`idcomercial`, `nprofor`, `especieid`, `clienteid`, `puerto`, `producto`, `descripcion`, `cantcaja`, `unixcaja`, `tamform`, `pesneto`, `pesdren`, `aceprom`, `aguprom`, `migprom`, `salprom`, `tipcarton`, `tipcod`, `marca`, `fecenvi`, `datecreated`, `status`) VALUES
(1, '242022', 1, 5, '242022', '', 'Orden de ProducciÃ³n', 0, 0, '', 0, 0, 0, 0, 0, '0.00', '', '', 'Marca L2', '', '2022-09-05 14:24:33', 1),
(2, '242025', 1, 5, '242025', '', 'Orden de ProducciÃ³n', 0, 0, '', 0, 0, 0, 0, 0, '0.00', '', '', 'to be confirm', '', '2022-09-05 14:25:13', 1),
(35, '544', 1, 0, '0544', '', 'DEFERFE', 0, 0, '', 0, 0, 0, 0, 0, '0.00', '', '', 'Sin Marca', '', '2022-09-06 10:48:03', 1),
(36, '455151', 2, 0, '0455151', '', 'Description 2', 0, 0, '', 0, 0, 0, 0, 0, '0.00', '', '', 'Marca 18', '', '2022-09-06 10:49:55', 1),
(37, '2420228', 1, 0, '2420228', '', 'trhrh', 0, 0, '', 0, 0, 0, 0, 0, '0.00', '', '', 'Marca L4', '', '2022-09-06 12:01:29', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_especie`
--

CREATE TABLE `tb_especie` (
  `idespecie` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `portada` varchar(100) NOT NULL,
  `datacreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_especie`
--

INSERT INTO `tb_especie` (`idespecie`, `nombre`, `descripcion`, `portada`, `datacreated`, `status`) VALUES
(1, 'SkipJack', 'SkipJack', 'img_ecd4eb9b985030b285a582bbf0aac1c4.jpg', '2022-09-02 14:11:26', 1),
(2, 'Yellowfin', 'Yellowfin', 'img_a2a8648d318940ea73e11e84119f96ae.jpg', '2022-09-02 14:44:01', 1),
(3, 'Bigeye', 'Bigeye', 'img_20c77ff8f53867614635d6c4c550adde.jpg', '2022-09-02 15:39:22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_modulo`
--

CREATE TABLE `tb_modulo` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_modulo`
--

INSERT INTO `tb_modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Dashboard', 1),
(2, 'Usuarios', 'Usuarios del Sistema', 1),
(3, 'Clientes', 'Clientes de Fishcorp', 1),
(4, 'Produccion', 'Produccion Fishcorp', 1),
(5, 'Gestion', 'Gestion Fishcorp', 1),
(6, 'Compras', 'Compra Fishcorp', 1),
(7, 'Calidad', 'Calidad Fishcorp', 1),
(8, 'Comercial', 'Comercial Fishcorp', 1),
(9, 'Gerencia', 'Gerencia Fishcorp', 1),
(10, 'Especies ', 'Especies', 1),
(11, 'Ordenes', 'Ordenes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_orden`
--

CREATE TABLE `tb_orden` (
  `idorden` bigint(20) NOT NULL,
  `usuarioid` bigint(20) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `monto` int(11) NOT NULL,
  `tipopagoid` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_permisos`
--

CREATE TABLE `tb_permisos` (
  `idpermiso` bigint(20) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_permisos`
--

INSERT INTO `tb_permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(481, 3, 1, 0, 0, 0, 0),
(482, 3, 2, 0, 0, 0, 0),
(483, 3, 3, 0, 0, 0, 0),
(484, 3, 4, 0, 0, 0, 0),
(485, 3, 5, 1, 1, 1, 0),
(486, 3, 6, 1, 1, 1, 0),
(487, 3, 7, 0, 0, 0, 0),
(488, 3, 8, 0, 0, 0, 0),
(489, 3, 9, 0, 0, 0, 0),
(598, 5, 1, 1, 1, 1, 1),
(599, 5, 2, 1, 1, 1, 1),
(600, 5, 3, 0, 0, 0, 0),
(601, 5, 4, 0, 0, 0, 0),
(602, 5, 5, 0, 0, 0, 0),
(603, 5, 6, 0, 0, 0, 0),
(604, 5, 7, 1, 1, 1, 1),
(605, 5, 8, 1, 1, 1, 1),
(606, 5, 9, 0, 0, 0, 0),
(607, 5, 10, 0, 0, 0, 0),
(630, 7, 1, 1, 1, 1, 1),
(631, 7, 2, 0, 1, 0, 0),
(632, 7, 3, 1, 1, 1, 1),
(633, 7, 4, 0, 0, 0, 0),
(634, 7, 5, 1, 1, 0, 0),
(635, 7, 6, 0, 0, 0, 0),
(636, 7, 7, 0, 0, 0, 0),
(637, 7, 8, 0, 0, 0, 0),
(638, 7, 9, 0, 0, 0, 0),
(639, 7, 10, 0, 0, 0, 0),
(640, 7, 11, 0, 0, 0, 0),
(641, 4, 1, 1, 1, 1, 1),
(642, 4, 2, 1, 1, 1, 1),
(643, 4, 3, 0, 0, 0, 0),
(644, 4, 4, 1, 1, 1, 1),
(645, 4, 5, 1, 1, 1, 1),
(646, 4, 6, 1, 1, 1, 1),
(647, 4, 7, 1, 1, 1, 1),
(648, 4, 8, 1, 1, 1, 1),
(649, 4, 9, 1, 1, 1, 1),
(650, 4, 10, 1, 1, 1, 1),
(651, 4, 11, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_productos`
--

CREATE TABLE `tb_productos` (
  `cod_pro` varchar(10) NOT NULL,
  `grupo` varchar(30) NOT NULL,
  `linea` varchar(30) NOT NULL,
  `descr_pro` text NOT NULL,
  `codigo_barra` varchar(30) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `especieid` bigint(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `datecreated` int(11) NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rol`
--

CREATE TABLE `tb_rol` (
  `idrol` bigint(20) NOT NULL,
  `nombrerol` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_rol`
--

INSERT INTO `tb_rol` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
(1, 'Produccion', 'ProducciÃ³n', 1),
(2, 'GestiÃ³n', 'GestiÃ³n', 1),
(3, 'Compras', 'Compras', 1),
(4, 'Calidad', 'Calidad', 1),
(5, 'Comercial', 'Comercial', 1),
(6, 'Gerencia', 'Gerencia', 1),
(7, 'Cliente', 'Cliente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usu` bigint(20) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `identificacion` varchar(30) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password` varchar(75) NOT NULL,
  `token` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `ocupacion` varchar(80) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usu`, `nombres`, `apellidos`, `identificacion`, `telefono`, `email_user`, `password`, `token`, `direccion`, `ciudad`, `ocupacion`, `rolid`, `datecreated`, `status`) VALUES
(1, 'Anderson', 'Mera', '1317418520', 987654321, 'andersonmera14@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '832f76fc9929c4459092-70dd851460124f34b83c-96038d71182a9d00a4b6-2d1ed237243d542156a6', '', '', '', 4, '2022-08-29 13:02:30', 1),
(2, 'Ana', 'Macias', '130854612', 98745621, 'ana@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '', '', '', '', 1, '2022-08-29 13:16:45', 1),
(3, 'Paola', 'Castro', '1307539512', 987456785, 'paola@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '', '', '', '', 2, '2022-08-29 14:36:09', 1),
(4, 'Sonia', 'PÃ©rez', '7897987980', 999999999, 'sonia@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '', '', '', '', 3, '2022-08-29 16:50:34', 0),
(5, 'JosÃ©', 'Murillo CedeÃ±o', '1348529621', 944444444, 'jose@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '', '', '', '', 5, '2022-08-30 10:42:55', 1),
(6, 'Tania', 'Mendoza', '1317485210', 987546123, 'tania@gmail.com', '1234567890', '', '', '', '', 4, '2022-08-31 10:47:00', 1),
(7, 'Maria', 'Santos', '17485264941', 97899871, 'maria@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '', '', '', '', 4, '2022-08-31 11:53:53', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordenid` (`ordenid`),
  ADD KEY `pedidoid` (`comercialid`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidoid` (`comercialid`);

--
-- Indices de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `rolid` (`rolid`);

--
-- Indices de la tabla `tb_comercial`
--
ALTER TABLE `tb_comercial`
  ADD PRIMARY KEY (`idcomercial`),
  ADD KEY `tipespeid` (`especieid`),
  ADD KEY `clienteid` (`clienteid`);

--
-- Indices de la tabla `tb_especie`
--
ALTER TABLE `tb_especie`
  ADD PRIMARY KEY (`idespecie`);

--
-- Indices de la tabla `tb_modulo`
--
ALTER TABLE `tb_modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `tb_orden`
--
ALTER TABLE `tb_orden`
  ADD PRIMARY KEY (`idorden`),
  ADD KEY `usuarioid` (`usuarioid`);

--
-- Indices de la tabla `tb_permisos`
--
ALTER TABLE `tb_permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  ADD PRIMARY KEY (`cod_pro`),
  ADD KEY `especieid` (`especieid`);

--
-- Indices de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usu`),
  ADD KEY `rolid` (`rolid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `idcliente` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tb_comercial`
--
ALTER TABLE `tb_comercial`
  MODIFY `idcomercial` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `tb_especie`
--
ALTER TABLE `tb_especie`
  MODIFY `idespecie` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tb_modulo`
--
ALTER TABLE `tb_modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tb_orden`
--
ALTER TABLE `tb_orden`
  MODIFY `idorden` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_permisos`
--
ALTER TABLE `tb_permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=652;

--
-- AUTO_INCREMENT de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usu` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `detalle_orden_ibfk_1` FOREIGN KEY (`ordenid`) REFERENCES `tb_orden` (`idorden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_comercial`
--
ALTER TABLE `tb_comercial`
  ADD CONSTRAINT `tb_comercial_ibfk_1` FOREIGN KEY (`especieid`) REFERENCES `tb_especie` (`idespecie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_orden`
--
ALTER TABLE `tb_orden`
  ADD CONSTRAINT `tb_orden_ibfk_1` FOREIGN KEY (`usuarioid`) REFERENCES `tb_usuario` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_permisos`
--
ALTER TABLE `tb_permisos`
  ADD CONSTRAINT `tb_permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `tb_rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `tb_modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `tb_rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
