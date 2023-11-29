-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2023 a las 00:36:16
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectobd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro`
--

CREATE TABLE `carro` (
  `placa` varchar(11) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `IdCedula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carro`
--

INSERT INTO `carro` (`placa`, `modelo`, `color`, `IdCedula`) VALUES
('CDT256', '2021', 'BLANCO', 1113535463),
('NPD524', '2012', 'ROJO', 4578265);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio`
--

CREATE TABLE `colegio` (
  `codigo` int(11) NOT NULL,
  `nombre_colegio` varchar(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `numero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colegio`
--

INSERT INTO `colegio` (`codigo`, `nombre_colegio`, `direccion`, `numero`) VALUES
(1, 'usc ', 'cll 5', '575456'),
(12, 'I.E rodrigo', 'calle  45', '5458');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `CodigoCurso` int(11) NOT NULL,
  `nombreCurso` varchar(225) NOT NULL,
  `lugar` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`CodigoCurso`, `nombreCurso`, `lugar`) VALUES
(2453, 'Base de datos', '2412'),
(4525, 'calculo 1', '5268'),
(5874, 'analisis de algoritmo', '1328'),
(8263, 'proyecto integrador', '1369');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dicta`
--

CREATE TABLE `dicta` (
  `IdDicta` int(11) NOT NULL,
  `CodCedula` int(11) NOT NULL,
  `IdCurso` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `dia` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dicta`
--

INSERT INTO `dicta` (`IdDicta`, `CodCedula`, `IdCurso`, `hora_inicio`, `hora_fin`, `dia`) VALUES
(524, 4578265, 4525, '00:00:00', '00:00:00', ''),
(5478, 1113535463, 2453, '00:00:00', '00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `cedula` int(11) NOT NULL,
  `nombre_profe` varchar(225) NOT NULL,
  `direccion` varchar(225) DEFAULT NULL,
  `edad` varchar(225) DEFAULT NULL,
  `numero` varchar(225) DEFAULT NULL,
  `CodColegio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`cedula`, `nombre_profe`, `direccion`, `edad`, `numero`, `CodColegio`) VALUES
(12245, 'preuba 1', 'vslds', '41', '312457', 12),
(12458, 'preuba 2', 'vsldsfgf', '414', '545865', 12),
(4578265, 'prueba 3', 'vslds', '52', '5458', 12),
(8954264, 'prueba 4', 'cllae 58', '32', '9854215', 12),
(1113535463, 'duvan rodriguez', 'calle 20B #13-48', '24', '565', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`placa`),
  ADD KEY `IdCedula` (`IdCedula`);

--
-- Indices de la tabla `colegio`
--
ALTER TABLE `colegio`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`CodigoCurso`);

--
-- Indices de la tabla `dicta`
--
ALTER TABLE `dicta`
  ADD PRIMARY KEY (`IdDicta`),
  ADD KEY `CodCedula` (`CodCedula`),
  ADD KEY `IdCurso` (`IdCurso`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `CodColegio` (`CodColegio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dicta`
--
ALTER TABLE `dicta`
  MODIFY `IdDicta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5479;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carro`
--
ALTER TABLE `carro`
  ADD CONSTRAINT `carro_ibfk_1` FOREIGN KEY (`IdCedula`) REFERENCES `profesor` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dicta`
--
ALTER TABLE `dicta`
  ADD CONSTRAINT `CodCedula` FOREIGN KEY (`CodCedula`) REFERENCES `profesor` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IdCurso` FOREIGN KEY (`IdCurso`) REFERENCES `curso` (`CodigoCurso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `CodColegio` FOREIGN KEY (`CodColegio`) REFERENCES `colegio` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
