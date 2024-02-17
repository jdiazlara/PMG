-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2024 a las 21:27:56
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_pmg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admision`
--

CREATE TABLE `admision` (
  `id` int(11) NOT NULL COMMENT 'Identificador y contador de solicitudes',
  `nombre` text NOT NULL COMMENT 'Nombre del estudiante',
  `apellidos` text NOT NULL COMMENT 'apellido del estudiante',
  `edad` text NOT NULL COMMENT 'edad del estudiante',
  `tel_estudiante` text NOT NULL COMMENT 'Numero Telefonico del estudiante',
  `gmail_estudiante` text NOT NULL COMMENT 'Correo Electronico del estudiante',
  `centro_procedencia` text NOT NULL COMMENT 'Centro educativo de procedencia del estudiante',
  `provincia_residencia` text NOT NULL COMMENT 'Provincia de residencia del estudiante',
  `promedio` text NOT NULL COMMENT 'Cuantas materias tiene menos del indice',
  `exam_materias` text NOT NULL COMMENT '¿Has examinado materias en completivo, extraordinario o pendiente?',
  `carrera_seleccionada` text NOT NULL COMMENT 'Carrera de estudio Seleccionada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `cod_imagen` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  `autor` text NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider1`
--

CREATE TABLE `slider1` (
  `ID` int(11) NOT NULL,
  `tittle` varchar(75) NOT NULL,
  `subtittle` varchar(300) NOT NULL,
  `url` text NOT NULL,
  `img_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `slider1`
--

INSERT INTO `slider1` (`ID`, `tittle`, `subtittle`, `url`, `img_name`) VALUES
(1, '', '', '', 'foto1.avif'),
(2, '', '', '', 'foto7.avif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test_psic`
--

CREATE TABLE `test_psic` (
  `id` int(11) NOT NULL,
  `nombre_completo` text NOT NULL,
  `apellido_completo` text NOT NULL,
  `email` text NOT NULL,
  `Comercio_Mercadeo1` int(11) NOT NULL,
  `Comercio_Mercadeo2` int(11) NOT NULL,
  `Contabilidad` int(11) NOT NULL,
  `Informatica` int(11) NOT NULL,
  `Industrias_Alimentarias` int(11) NOT NULL,
  `carrera` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admision`
--
ALTER TABLE `admision`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`cod_imagen`);

--
-- Indices de la tabla `slider1`
--
ALTER TABLE `slider1`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `test_psic`
--
ALTER TABLE `test_psic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admision`
--
ALTER TABLE `admision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador y contador de solicitudes';

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `cod_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `slider1`
--
ALTER TABLE `slider1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `test_psic`
--
ALTER TABLE `test_psic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
