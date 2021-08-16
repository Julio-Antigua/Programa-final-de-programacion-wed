-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-08-2021 a las 05:05:12
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tarea8910pwed`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiones`
--

CREATE TABLE `camiones` (
  `Id` int(11) NOT NULL,
  `Marca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Modelo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Color` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Comentario` text COLLATE utf8_unicode_ci NOT NULL,
  `CantidadLavadoras` int(11) NOT NULL,
  `ValorCarga` int(11) NOT NULL,
  `PesoTotal` int(11) NOT NULL,
  `Usuario_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `camiones`
--

INSERT INTO `camiones` (`Id`, `Marca`, `Modelo`, `Color`, `Comentario`, `CantidadLavadoras`, `ValorCarga`, `PesoTotal`, `Usuario_Id`) VALUES
(9, 'izuzu', 'hidrogen', 'blanco', 'este camion va para la romana', 0, 0, 0, 1),
(15, 'toyota', '', '', '', 0, 0, 0, 1),
(24, 'izuzu', 'hidrogen', 'blanco', 'este camion va para la romana', 0, 0, 0, 1),
(28, 'nuevo klk', '', '', '', 0, 0, 0, 1),
(29, 'jlz;sdnf', '', '', '', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lavadoras`
--

CREATE TABLE `lavadoras` (
  `Id` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Marca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Modelo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Valor` int(11) NOT NULL,
  `PesoLibas` int(11) NOT NULL,
  `Camiones_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Correo`, `Password`) VALUES
(1, 'julio@gmail.com', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camiones`
--
ALTER TABLE `camiones`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Usuario_Id` (`Usuario_Id`);

--
-- Indices de la tabla `lavadoras`
--
ALTER TABLE `lavadoras`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CamionesId` (`Camiones_Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camiones`
--
ALTER TABLE `camiones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `lavadoras`
--
ALTER TABLE `lavadoras`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `camiones`
--
ALTER TABLE `camiones`
  ADD CONSTRAINT `camiones_ibfk_1` FOREIGN KEY (`Usuario_Id`) REFERENCES `usuarios` (`Id`);

--
-- Filtros para la tabla `lavadoras`
--
ALTER TABLE `lavadoras`
  ADD CONSTRAINT `lavadoras_ibfk_1` FOREIGN KEY (`Camiones_Id`) REFERENCES `camiones` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
