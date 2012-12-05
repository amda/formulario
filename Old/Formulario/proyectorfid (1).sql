-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-09-2012 a las 21:28:45
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyectorfid`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
  `tagrfid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  `place` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `getsIn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`tagrfid`, `status`, `place`, `getsIn`) VALUES
('00000001', 0, 'por puerta FIT', '2012-09-06 06:00:00'),
('00000001', 1, 'puerta Edu', '2012-09-06 15:00:00'),
('00000002', 0, 'por puerta FIT', '2012-09-05 07:00:00'),
('00000002', 1, 'por puerta FIT', '2012-09-05 18:00:00'),
('00000004', 0, 'puerta Fit', '2012-09-10 14:00:28'),
('00000004', 1, 'puerta Fca', '2012-09-10 14:02:16'),
('00000004', 0, 'puerta Edu', '2012-09-10 14:03:56'),
('00000004', 1, 'puerta Fit', '2012-09-10 14:04:20'),
('00000004', 0, 'puerta Fit', '2012-09-10 14:06:33'),
('00000001', 0, 'puerta fit', '2012-09-10 17:16:09'),
('00000001', 1, 'puerta fit', '2012-09-10 17:16:31'),
('00000001', 0, 'puerta fit', '2012-09-10 17:17:02'),
('00000001', 1, 'puerta fit', '2012-09-10 17:17:17'),
('00000001', 0, 'puerta fit', '2012-09-11 18:13:25'),
('00000001', 1, 'puerta fit', '2012-09-11 18:13:49'),
('00000001', 0, 'puerta Edu', '2012-09-11 18:13:53'),
('', 0, '', '2012-09-12 16:11:58'),
('00000001', 1, 'puerta fit', '2012-09-12 16:12:07'),
('00000001', 0, 'puerta fit', '2012-09-12 16:13:23'),
('00000001', 1, 'puerta fit', '2012-09-12 16:13:40'),
('', 0, '', '2012-09-20 18:13:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `tagrfid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regla` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`tagrfid`, `name`, `email`, `base`, `regla`) VALUES
('00000001', 'Felipe Villa', 'felipe.villa@bleext.com', 'FIT', 2),
('00000002', 'Loeli J.', 'loelijr@gmail.com', 'FIT', 1),
('00000003', 'Hola Mundo', '', 'FIT', 1),
('00000004', 'Saulo HernÃ¡ndez', '', 'FIT', 1),
('00000005', 'Omar SaviÃ±on', '', 'FIT', 1),
('00000006', 'Abel Marmolejo', '', 'FIT', 1),
('00000007', 'mitzi moncada', 'mitzi@gmail.com', 'FIT', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reglas`
--

CREATE TABLE IF NOT EXISTS `reglas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `base` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora-inicio` time NOT NULL,
  `hora-fin` time NOT NULL,
  `acceso` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posible` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `reglas`
--

INSERT INTO `reglas` (`id`, `base`, `hora-inicio`, `hora-fin`, `acceso`, `posible`, `status`) VALUES
(1, 'FIT', '08:00:00', '12:00:00', 'por puerta FIT', 'Oficinas', 0),
(2, 'FIT', '08:00:00', '20:00:00', 'puerta Edu', 'Labs. Computo', 0),
(3, 'FIT', '14:00:00', '19:00:00', 'por puerta FIT', 'Oficinas', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
