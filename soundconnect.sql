-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2023 a las 19:38:14
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `soundconnect`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nif` varchar(8) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nif`, `nombre`, `correo`, `contraseña`, `direccion`, `activo`) VALUES
(2, '49125055', 'empresa', 'empresa1@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Direccion de prueba', 1),
(3, '', 'prueba1', 'prueba1@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Travesia San Ignacio 4B Bloque 8 1A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `idOferta` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `evento_inicio` date DEFAULT NULL,
  `evento_fin` date DEFAULT NULL,
  `precio` float NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`idOferta`, `nombre`, `descripcion`, `evento_inicio`, `evento_fin`, `precio`, `idEmpresa`) VALUES
(1, 'Oferta1', 'Prueba de Oferta 1', '2023-03-09', '2023-03-16', 10, 2),
(2, 'Oferta2', 'Prueba Oferta 2', '2023-03-07', '2023-03-24', 1, 2),
(3, 'Oferta3', 'Boda', '2023-03-16', '2023-03-24', 100, 2),
(4, 'Oferta4', 'Prueba de oferta 4', '2023-03-29', '2023-03-29', 1, 2),
(5, 'Oferta5', 'Prueba Oferta 5', '2023-03-29', '2023-03-29', 1, 2),
(6, 'Oferta6', 'Prueba de oferta 6', '2023-03-09', '2023-03-10', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUser` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `disponibilidad_inicio1` date DEFAULT NULL,
  `disponibilidad_fin1` date DEFAULT NULL,
  `activo` tinyint(4) NOT NULL,
  `disponibilidad_inicio2` date DEFAULT NULL,
  `disponibilidad_fin2` date DEFAULT NULL,
  `disponibilidad_inicio3` date DEFAULT NULL,
  `disponibilidad_fin3` date DEFAULT NULL,
  `etiqueta1` varchar(255) NOT NULL,
  `etiqueta2` varchar(255) NOT NULL,
  `etiqueta3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUser`, `nombre`, `correo`, `contraseña`, `direccion`, `disponibilidad_inicio1`, `disponibilidad_fin1`, `activo`, `disponibilidad_inicio2`, `disponibilidad_fin2`, `disponibilidad_inicio3`, `disponibilidad_fin3`, `etiqueta1`, `etiqueta2`, `etiqueta3`) VALUES
(4, 'angelmr26', 'angelmaroru@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Travesia San Ignacio 4B Bloque 8 1A', '2021-04-12', '2021-05-13', 1, NULL, NULL, NULL, NULL, '', '', ''),
(5, 'Currete', 'currete@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'En mi casa', '2022-06-12', '2022-07-13', 1, NULL, NULL, NULL, NULL, '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`,`nif`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`idOferta`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`,`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `idOferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `ofertas_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
