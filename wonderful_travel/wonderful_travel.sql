-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2024 a las 17:50:21
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

-- Creación de la base de datos
CREATE DATABASE IF NOT EXISTS `wonderful_travel` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wonderful_travel`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wonderful_travel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `nom` varchar(45) NOT NULL,
  `preu_unitari` FLOAT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`nom`,`preu_unitari`) VALUES
('Alemanya', 980),
('Argentina', 810),
('Brasil', 790),
('Egipte', 1110),
('Espanya', 710),
('Estats Units', 1340),
('França', 830),
('Índia', 990),
('Japó', 1290),
('Nigèria',690),
('Sud-àfrica', 870),
('Xina',1250);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `telefon` varchar(9) NOT NULL,
  `correu` varchar(100) NOT NULL,
  `dni` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `nom`, `telefon`, `correu`, `dni`) VALUES
(11, 'David Romero', '987654321', 'davidromero@gmail.com', '12345678J'),
(12, 'Miguel Angel Hornos Granda', '987654321', 'mhornos@gmail.com', '12345467X');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viatge`
--

CREATE TABLE `viatge` (
  `ID` int(11) NOT NULL,
  `preu` float NOT NULL,
  `Pais_nom` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `nPersones` int(11) NOT NULL,
  `descompte` tinyint(4) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viatge`
--



--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`nom`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `viatge`
--
ALTER TABLE `viatge`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Pais_nom` (`Pais_nom`),
  ADD KEY `Persona_idPersona` (`Persona_idPersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `viatge`
--
ALTER TABLE `viatge`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `viatge`
--
ALTER TABLE `viatge`
  ADD CONSTRAINT `viatge_ibfk_1` FOREIGN KEY (`Pais_nom`) REFERENCES `pais` (`nom`),
  ADD CONSTRAINT `viatge_ibfk_2` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
