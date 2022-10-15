-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-10-2022 a las 19:33:34
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE IF NOT EXISTS `administradores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `rol` int(1) NOT NULL DEFAULT '1',
  `archivo_n` varchar(255) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `eliminado` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `apellidos`, `correo`, `pass`, `rol`, `archivo_n`, `archivo`, `status`, `eliminado`) VALUES
(56, 'juanga', 'lope', 'luid@hotmail.com', '4d186321c1a7f0f354b297e8914ab240', 2, '58a18aa42223ed930bc79256f19d2beb', 'WIN_20200206_21_33_04_Pro.jpg', 1, 0),
(20, 'luis', 'Valencia', 'kjk@hotmail.com', '9fc58423aa0341dd75c031e1b2fabe0a', 1, '75845090a8a4be16a0be20f9f0b9199f', 'descarga.jpg', 1, 0),
(19, 'Luis Baltazar', 'Garcia Lopez', 'l.b.g.l_92@hotmail.com', 'ffc391e59dbeb0b69d7cbaa595018477', 1, 'd7cc8e25073207f28773b6730b2578dc', 'new.jpg', 1, 0),
(8, 'Cassandra', 'Aldaz', 'jalisco@.com', '19efdf9485857a645ee73e76a1d852b2', 1, '', '', 1, 0),
(9, 'Daniel', 'Rodriguez', 'dani@.com', '0e00e5e62efa31ea7a66a0d0e98efe14', 1, '', '', 1, 0),
(21, 'luis', 'Rodriguez', 'll@gmail.com', 'b78fd6e3095740ab13ed4baff2960092', 1, '', '', 1, 1),
(15, 'Hernesto', 'Alvarez', 'ja@.com', '674f3c2c1a8a6f90461e8a66fb5550ba', 1, '', '', 1, 1),
(14, 'luis', 'Aldaz', 'holacompa@.com', 'a83f0f76c2afad4f5d7260824430b798', 2, '', '', 1, 0),
(55, 'juan', 'corona', 'ramoco@gmail.com', '69abd4abf577d7cfd6d370f146611fea', 1, '75845090a8a4be16a0be20f9f0b9199f', 'descarga.jpg', 1, 0),
(54, 'Erick', 'Otero', 'EO@gmail.com', 'ffc391e59dbeb0b69d7cbaa595018477', 1, '75845090a8a4be16a0be20f9f0b9199f', 'descarga.jpg', 1, 0),
(59, 'jorge', 'fisher', 'jorgefisher@hotmail.com', '4d186321c1a7f0f354b297e8914ab240', 2, '58a18aa42223ed930bc79256f19d2beb', 'WIN_20200206_21_33_04_Pro.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `archivo` varchar(64) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `eliminado` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `nombre`, `archivo`, `status`, `eliminado`) VALUES
(13, 'computadora', '5a272fef798295eb60a3f88bcbad46fc', 1, 0),
(12, 'perro', '77cb95399992db4c64cac98dc04a782b', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `usuario` varchar(32) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  KEY `id_pedido` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `fecha`, `usuario`, `status`) VALUES
(15, '2021-12-01', 'Luis Baltazar Garcia Lopez', 1),
(10, '2021-11-30', 'Luis Baltazar Garcia Lopez', 1),
(30, '2021-12-03', 'Aurelia Janeth garcia', 0),
(26, '2021-12-02', 'Luis Baltazar Garcia Lopez', 1),
(31, '2022-10-15', 'jorge fisher', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

DROP TABLE IF EXISTS `pedidos_productos`;
CREATE TABLE IF NOT EXISTS `pedidos_productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos_productos`
--

INSERT INTO `pedidos_productos` (`id`, `id_pedido`, `id_producto`, `cantidad`, `precio`) VALUES
(5, 10, 1, 2, 120),
(12, 15, 6, 44, 25),
(11, 15, 1, 32, 120),
(9, 10, 5, 12, 50),
(13, 15, 5, 2412, 50),
(14, 15, 3, 21, 350),
(15, 15, 1, 32, 120),
(16, 15, 1, 32, 120),
(17, 15, 1, 32, 120),
(18, 15, 1, 32, 120),
(20, 15, 1, 32, 120),
(27, 26, 1, 10, 120),
(28, 26, 5, 10, 50),
(33, 30, 5, 3, 50),
(34, 30, 6, 8, 25),
(35, 30, 1, 15, 120),
(36, 31, 5, 2, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `codigo` varchar(32) NOT NULL,
  `descripcion` text NOT NULL,
  `costo` double NOT NULL,
  `stock` int(11) NOT NULL,
  `archivo_n` varchar(255) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `eliminado` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `codigo`, `descripcion`, `costo`, `stock`, `archivo_n`, `archivo`, `status`, `eliminado`) VALUES
(1, 'Martillo', 'mar03', 'objeto de madera puntiagudo', 120, 11, 'c3f9244a9440748c7b29c138da4e2eb9', 'martillo.jpg', 1, 0),
(5, 'bateria', 'bat01', 'almacenador de energia', 50, 10, '2328c49ddbe7f0b19027011151d87a29', 'bateria.jpg', 1, 0),
(6, 'kuma', 'mar03a', 'sdasdsad', 25, 2, '2328c49ddbe7f0b19027011151d87a29', 'bateria.jpg', 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
