-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2015 a las 04:31:05
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `yii-curso-gustavo2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia`
--

CREATE TABLE IF NOT EXISTS `experiencia` (
`id` int(11) NOT NULL,
  `usuario_id` int(100) NOT NULL DEFAULT '0',
  `empresa` varchar(200) NOT NULL DEFAULT '0',
  `inicio` date NOT NULL DEFAULT '0000-00-00',
  `finalizacion` date NOT NULL DEFAULT '0000-00-00',
  `jefe` varchar(100) NOT NULL DEFAULT '0',
  `ip` varchar(255) NOT NULL,
  `creado` datetime NOT NULL,
  `actualizado` datetime NOT NULL,
  `usuario` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `experiencia`
--

INSERT INTO `experiencia` (`id`, `usuario_id`, `empresa`, `inicio`, `finalizacion`, `jefe`, `ip`, `creado`, `actualizado`, `usuario`) VALUES
(1, 1, 'empresa1', '2010-11-11', '2015-11-11', 'Osar', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2, 1, 'empresa2', '2005-11-11', '2008-11-11', 'pedro', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(6, 1, 'Empresa3', '2015-09-01', '2015-10-01', 'Oscar', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(7, 1, 'empresa 4', '2010-11-01', '2014-09-17', 'jefe  empresa 4', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`id`, `nombre`, `descripcion`) VALUES
(1, 'task 1', 'descr 1'),
(2, 'task 2', 'descr 2'),
(3, 'task 3', 'descr 3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `experiencia`
--
ALTER TABLE `experiencia`
 ADD PRIMARY KEY (`id`), ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `experiencia`
--
ALTER TABLE `experiencia`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
