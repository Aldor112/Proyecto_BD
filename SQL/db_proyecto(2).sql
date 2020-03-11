-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2020 a las 03:11:05
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estudiante`
--

CREATE TABLE `tb_estudiante` (
  `username` varchar(32) NOT NULL,
  `contrasena` varchar(64) NOT NULL,
  `Notas` int(2) DEFAULT NULL,
  `Prom_Pond` int(2) DEFAULT NULL,
  `Cod_materia` int(10) DEFAULT NULL,
  `Encuesta_R` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_estudiante`
--

INSERT INTO `tb_estudiante` (`username`, `contrasena`, `Notas`, `Prom_Pond`, `Cod_materia`, `Encuesta_R`) VALUES
('aldor112', '$2y$10$2BbGS1D7f2uWNpwPudLvveJ6YIyb/jIRq0vKZk3j4OyQ1DQS9KOZW', NULL, NULL, 520, 1),
('evilpisces', '$2y$10$f7.xlGljK4qYP0AwMtKXt.TgI56ptVeQQCKbVTCtZHfhvbYu6pU6i', NULL, NULL, 520, 1),
('jojo', '$2y$10$JOfRgnGYrCMFCNBzC9MthegA1ErEz4l/.mol3ZzxnuXpDrlCAbkUi', NULL, NULL, 520, 1),
('lolo', '$2y$10$FTXSMPztlmuU6PjnP95GKurM7oBIfFkOqhVK/kjHHDd3mIje541A.', NULL, NULL, 520, 1),
('megapata', '$2y$10$oLqv54/9EbWPK5v2XYCAu.dH7lG6oTR717qKhKY8dibN0s6pDQPI.', NULL, NULL, 520, 1),
('mister popo', '$2y$10$8Rm.Wmo6pvVyZKuHNT207.Rfoi1sJk1BsgdEdhniZGpygY3/UmLD2', NULL, NULL, 520, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_materia`
--

CREATE TABLE `tb_materia` (
  `Cred` int(2) NOT NULL,
  `Nomb_materia` text NOT NULL,
  `Cod_materia` int(10) NOT NULL,
  `Cod_P` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_materia`
--

INSERT INTO `tb_materia` (`Cred`, `Nomb_materia`, `Cod_materia`, `Cod_P`) VALUES
(50, 'pollo', 111, 7845),
(21, 'biologia', 205, 7845),
(90, 'metodologia de la investigacion', 520, 7845),
(45, 'biologia', 880, 880);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_profesor`
--

CREATE TABLE `tb_profesor` (
  `Nomb_P` text NOT NULL,
  `Cod_P` int(32) NOT NULL,
  `Prom_Def` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_profesor`
--

INSERT INTO `tb_profesor` (`Nomb_P`, `Cod_P`, `Prom_Def`) VALUES
('mario paquirri', 880, NULL),
('mario paquirri', 7845, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_promedio_p`
--

CREATE TABLE `tb_promedio_p` (
  `Cod_P` int(32) NOT NULL,
  `Promedio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_promedio_p`
--

INSERT INTO `tb_promedio_p` (`Cod_P`, `Promedio`) VALUES
(7845, 2.875),
(7845, 3.4375),
(7845, 5),
(7845, 5),
(7845, 5),
(7845, 5),
(7845, 5),
(7845, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_estudiante`
--
ALTER TABLE `tb_estudiante`
  ADD PRIMARY KEY (`username`),
  ADD KEY `Cod_materia` (`Cod_materia`);

--
-- Indices de la tabla `tb_materia`
--
ALTER TABLE `tb_materia`
  ADD PRIMARY KEY (`Cod_materia`,`Cod_P`),
  ADD KEY `Cod_P` (`Cod_P`);

--
-- Indices de la tabla `tb_profesor`
--
ALTER TABLE `tb_profesor`
  ADD PRIMARY KEY (`Cod_P`);

--
-- Indices de la tabla `tb_promedio_p`
--
ALTER TABLE `tb_promedio_p`
  ADD KEY `Cod_P` (`Cod_P`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_estudiante`
--
ALTER TABLE `tb_estudiante`
  ADD CONSTRAINT `tb_estudiante_ibfk_1` FOREIGN KEY (`Cod_materia`) REFERENCES `tb_materia` (`Cod_materia`);

--
-- Filtros para la tabla `tb_materia`
--
ALTER TABLE `tb_materia`
  ADD CONSTRAINT `tb_materia_ibfk_1` FOREIGN KEY (`Cod_P`) REFERENCES `tb_profesor` (`Cod_P`);

--
-- Filtros para la tabla `tb_promedio_p`
--
ALTER TABLE `tb_promedio_p`
  ADD CONSTRAINT `tb_promedio_p_ibfk_1` FOREIGN KEY (`Cod_P`) REFERENCES `tb_profesor` (`Cod_P`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
