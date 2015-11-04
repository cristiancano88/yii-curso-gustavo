-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2015 a las 12:27:20
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `yii-curso-gustavo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_asignacion`
--

CREATE TABLE IF NOT EXISTS `auth_asignacion` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auth_asignacion`
--

INSERT INTO `auth_asignacion` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('rol_edicion', '1', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_items`
--

CREATE TABLE IF NOT EXISTS `auth_items` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auth_items`
--

INSERT INTO `auth_items` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('editar_usuarios', 0, 'Esta operacion es para editar.', NULL, 'N;'),
('rol_edicion', 2, 'Esta tarea es para editar.', NULL, 'N;'),
('tarea_edicion', 1, 'Esta tarea es para editar.', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_relacion`
--

CREATE TABLE IF NOT EXISTS `auth_relacion` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auth_relacion`
--

INSERT INTO `auth_relacion` (`parent`, `child`) VALUES
('tarea_edicion', 'editar_usuarios'),
('rol_edicion', 'tarea_edicion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'cat prueba 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `id` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `nombre`) VALUES
(1, 'Madrids'),
(2, 'Lima'),
(3, 'Buenos Aires'),
(4, 'Quito'),
(5, 'Caracas'),
(6, 'Medellin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE IF NOT EXISTS `estudios` (
  `id` int(11) NOT NULL,
  `usuario_id` int(100) NOT NULL DEFAULT '0',
  `institucion` varchar(255) NOT NULL DEFAULT '0',
  `anio_graduacion` int(4) NOT NULL DEFAULT '0',
  `titulo` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `jefe` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `experiencia`
--

INSERT INTO `experiencia` (`id`, `usuario_id`, `empresa`, `inicio`, `finalizacion`, `jefe`) VALUES
(1, 1, 'empresa1', '2010-11-11', '2015-11-11', 'Osar'),
(2, 1, 'empresa2', '2005-11-11', '2008-11-11', 'pedro'),
(6, 1, 'Empresa3', '2015-09-01', '2015-10-01', 'Oscar'),
(7, 3, 'empresa5', '2015-10-01', '2015-10-24', 'Jefe empresa 5'),
(8, 2, 'empresa6', '2015-10-02', '2015-10-20', 'Jefe empresa 6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folio`
--

CREATE TABLE IF NOT EXISTS `folio` (
  `id` int(11) NOT NULL,
  `usuario_id` int(100) NOT NULL DEFAULT '0',
  `lugar` varchar(200) NOT NULL DEFAULT '0',
  `psicologica` int(10) NOT NULL DEFAULT '0',
  `tecnica` int(10) NOT NULL DEFAULT '0',
  `entrevista` int(10) NOT NULL DEFAULT '0',
  `puntaje` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `folio`
--

INSERT INTO `folio` (`id`, `usuario_id`, `lugar`, `psicologica`, `tecnica`, `entrevista`, `puntaje`) VALUES
(1, 1, 'B3', 3, 4, 3, 2),
(2, 2, 'B3', 5, 5, 5, 5),
(3, 2, 'C1', 1000000, 2500, 333333, 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'task 1', 'descr 1'),
(2, 'task 2', 'descr 2'),
(3, 'task 3', 'descr 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas_gii`
--

CREATE TABLE IF NOT EXISTS `tareas_gii` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tareas_gii`
--

INSERT INTO `tareas_gii` (`id`, `nombre`, `descripcion`) VALUES
(1, 'task1', 'descr1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(100) NOT NULL,
  `ciudad_id` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(100) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL DEFAULT '0',
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `identificacion` int(100) NOT NULL DEFAULT '0',
  `genero` varchar(1) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `session` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `ciudad_id`, `nombre`, `email`, `estado`, `identificacion`, `genero`, `username`, `password`, `session`) VALUES
(1, 1, 'Juan prez', 'juan@gmail.com', 1, 1111114, 'M', 'juan', '123456', '5634c1ac298dc7.68408957'),
(2, 2, 'Pedro', 'pedro@gmail.com', 0, 222222222, 'M', '', '', ''),
(3, 2, 'Otra forma de EDITAR nombres', 'emain@hotmail.co', 1, 99999999, 'H', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacantes`
--

CREATE TABLE IF NOT EXISTS `vacantes` (
  `id` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL DEFAULT '0',
  `descripcion` varchar(200) NOT NULL DEFAULT '0',
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacantes`
--

INSERT INTO `vacantes` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'vacnte 1', 'csdc dscdsc dscdsc dscds', 0),
(2, 'vacante 2', 'sjc uasgduy auhdeiy kshdbeij skjd', 0),
(3, 'vacante 3', 'wudhwu uiwhd jduw', 0),
(4, 'vacante 3', 'skdj kdhi ksuhdbwd nsuodb', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacantes_usuarios`
--

CREATE TABLE IF NOT EXISTS `vacantes_usuarios` (
  `vacantes_id` int(100) DEFAULT NULL,
  `usuarios_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacantes_usuarios`
--

INSERT INTO `vacantes_usuarios` (`vacantes_id`, `usuarios_id`) VALUES
(1, 1),
(2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_asignacion`
--
ALTER TABLE `auth_asignacion`
  ADD PRIMARY KEY (`itemname`,`userid`);

--
-- Indices de la tabla `auth_items`
--
ALTER TABLE `auth_items`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `auth_relacion`
--
ALTER TABLE `auth_relacion`
  ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`id`), ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`id`), ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `folio`
--
ALTER TABLE `folio`
  ADD PRIMARY KEY (`id`), ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareas_gii`
--
ALTER TABLE `tareas_gii`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`), ADD KEY `ciudad_id` (`ciudad_id`);

--
-- Indices de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vacantes_usuarios`
--
ALTER TABLE `vacantes_usuarios`
  ADD KEY `vacantes_id` (`vacantes_id`), ADD KEY `usuarios_id` (`usuarios_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `estudios`
--
ALTER TABLE `estudios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `folio`
--
ALTER TABLE `folio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tareas_gii`
--
ALTER TABLE `tareas_gii`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_asignacion`
--
ALTER TABLE `auth_asignacion`
ADD CONSTRAINT `auth_asignacion_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `auth_items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_relacion`
--
ALTER TABLE `auth_relacion`
ADD CONSTRAINT `auth_relacion_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `auth_relacion_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudios`
--
ALTER TABLE `estudios`
ADD CONSTRAINT `estudios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `experiencia`
--
ALTER TABLE `experiencia`
ADD CONSTRAINT `experiencia_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `folio`
--
ALTER TABLE `folio`
ADD CONSTRAINT `folio_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudad` (`id`);

--
-- Filtros para la tabla `vacantes_usuarios`
--
ALTER TABLE `vacantes_usuarios`
ADD CONSTRAINT `vacantes_usuarios_ibfk_1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`),
ADD CONSTRAINT `vacantes_usuarios_ibfk_2` FOREIGN KEY (`vacantes_id`) REFERENCES `vacantes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
