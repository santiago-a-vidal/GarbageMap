-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2019 a las 22:25:59
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `garbagemap`
--
CREATE DATABASE IF NOT EXISTS `garbagemap` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `garbagemap`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncia`
--

CREATE TABLE `denuncia` (
  `id_denuncia` int(11) NOT NULL,
  `latitud` decimal(10,8) NOT NULL,
  `longitud` decimal(10,8) NOT NULL,
  `estaCompletada` tinyint(1) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `routeImagen` varchar(255) NOT NULL,
  `fecha_cumplimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `denuncia`
--

INSERT INTO `denuncia` (`id_denuncia`, `latitud`, `longitud`, `estaCompletada`, `descripcion`, `mail`, `routeImagen`, `fecha_cumplimiento`) VALUES
(5, '-37.35138129', '-59.12523270', 1, 'a', 'mail@mail.com', 'images/5d06a24fcf4c9.jpeg', '2019-06-16'),
(6, '-37.31448289', '-59.13553238', 0, 'supperinho ', 'mail@mail.com', 'images/5d06a2e6679c3.png', NULL),
(7, '-31.63155735', '-53.73291045', 0, 'jose lescano', 'mail@mail.com', 'images/5d06a3421d9a2.png', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncia_especial`
--

CREATE TABLE `denuncia_especial` (
  `id_denuncia` int(11) NOT NULL,
  `dni` int(9) NOT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 NOT NULL,
  `apellido` varchar(255) CHARACTER SET latin1 NOT NULL,
  `direccion` varchar(255) CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `hora` time(6) NOT NULL,
  `longitud` decimal(10,8) NOT NULL,
  `latitud` decimal(10,8) NOT NULL,
  `patente` varchar(50) CHARACTER SET latin1 NOT NULL,
  `routeVideo` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `denuncia_especial`
--

INSERT INTO `denuncia_especial` (`id_denuncia`, `dni`, `nombre`, `apellido`, `direccion`, `fecha`, `hora`, `longitud`, `latitud`, `patente`, `routeVideo`) VALUES
(7, 111, 'pablo', 'pablo', 'callefalsa-1234', '0002-01-01', '21:03:00.000000', '43.00000000', '92.00000000', 'aaa-111', 'videos/5ce5ff463097b.mp4'),
(8, 323, 'jose', 'pablo', 'calle-222', '0002-01-01', '02:02:00.000000', '0.00000000', '0.00000000', 'aaa-222', 'videos/5ce6b307c341d.mp4'),
(9, 2, 'jose', 'jose', 'callefalse-1234', '2918-04-05', '23:08:00.000000', '0.00000000', '0.00000000', 'aaa-111', 'videos/5ce6b47554457.mp4'),
(10, 323232, 'juan', 'paco', 'pedro', '2019-05-24', '04:04:00.000000', '0.00000000', '0.00000000', 'delamar', 'videos/5ce6b525ebf08.mp4'),
(11, 423, 'Sullivan', 'gomez', 'callefalse-123444', '0023-02-23', '19:34:00.000000', '-59.13758730', '-37.35365557', '233-brb', 'videos/5ce6b62119140.mp4'),
(12, 222, 'nig', 'er', '44', '0004-04-02', '05:05:00.000000', '-59.11839587', '-37.32840723', 'a3-q', 'videos/5ce6bb815a73d.mp4'),
(14, 2, 'd', 'd', 'd', '0004-03-01', '04:06:00.000000', '-59.12130885', '-37.33659681', 'dd', 'videos/5ce6bbb1233b2.mp4'),
(15, 2, 'd', 'd', 'd', '0004-03-01', '04:06:00.000000', '-59.12130885', '-37.33659681', 'dd', 'videos/5ce6bbcf95d8c.mp4'),
(16, 3, 'pablo', 'pablinho', 'calle', '0001-01-01', '01:01:00.000000', '-59.13810136', '-37.32813422', 'aa-44', 'videos/5ce6bbf3f129a.mp4'),
(17, 3, 'pablo', 'pablinho', 'calle', '0001-01-01', '01:01:00.000000', '-59.13810136', '-37.32813422', 'aa-44', 'videos/5ce6bc25007a6.mp4'),
(18, 44888999, 'jose', 'carlos', 'calle-345', '2019-05-23', '12:34:00.000000', '-59.13610129', '-37.32760718', 'abc-123', 'videos/5ce6bd99412cd.mp4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`mail`, `password`, `nivel`) VALUES
('mail@mail.com', '1234', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD PRIMARY KEY (`id_denuncia`) USING BTREE,
  ADD KEY `FK_DenunciaUsuario` (`mail`);

--
-- Indices de la tabla `denuncia_especial`
--
ALTER TABLE `denuncia_especial`
  ADD PRIMARY KEY (`id_denuncia`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`mail`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `denuncia`
--
ALTER TABLE `denuncia`
  MODIFY `id_denuncia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `denuncia_especial`
--
ALTER TABLE `denuncia_especial`
  MODIFY `id_denuncia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD CONSTRAINT `FK_DenunciaUsuario` FOREIGN KEY (`mail`) REFERENCES `usuario` (`mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
