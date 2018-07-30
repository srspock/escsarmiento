-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2018 a las 21:33:27
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escsarmiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(1, 'Dario', 'Mendez', '3438473843'),
(2, 'Julieta', 'Magaña', '734374374'),
(3, 'Fernando', 'Gonzalez', '83434348'),
(4, 'Rocio', 'Juarez', '38853985');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrios`
--

CREATE TABLE `barrios` (
  `ID` int(5) NOT NULL,
  `ID_LOCALIDAD` int(4) NOT NULL,
  `NOMBRE` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `barrios`
--

INSERT INTO `barrios` (`ID`, `ID_LOCALIDAD`, `NOMBRE`) VALUES
(1, 1, 'San Pedrito'),
(2, 1, 'Centro'),
(3, 1, 'Cuyaya dddd'),
(4, 1, 'Gorriti 887'),
(5, 4, '28 de Febrero'),
(6, 4, 'Constitucion'),
(7, 5, 'Alto Comedero'),
(8, 1, 'Los Perales'),
(9, 1, '23 de Agosto'),
(10, 1, 'Chijra'),
(12, 1, 'Higuerillas'),
(16, 8, 'ciudad de nievita'),
(17, 7, 'Villa Lastenia'),
(18, 1, 'Arenales'),
(19, 0, 'Auxiliar Administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(6) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`) VALUES
(1, 'Auxiliar Administrativo 1'),
(2, 'Prof. Nivel Secundario'),
(3, 'Auxiliar Docente'),
(4, 'Pro-Secretaria'),
(5, 'Ordenanza Cat. 12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupof`
--

CREATE TABLE `cupof` (
  `id` int(6) NOT NULL,
  `id-materia` int(6) NOT NULL,
  `id-curso` int(6) NOT NULL,
  `horas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(6) NOT NULL,
  `anio` int(1) NOT NULL,
  `division` int(1) NOT NULL,
  `turno` int(1) NOT NULL,
  `modalidad` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `anio`, `division`, `turno`, `modalidad`) VALUES
(1, 2, 4, 1, 2),
(2, 1, 1, 1, 1),
(3, 5, 2, 1, 1),
(4, 4, 4, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `ID` int(4) NOT NULL,
  `NOMBRE` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`ID`, `NOMBRE`) VALUES
(1, 'San Salvador de Jujuy'),
(2, 'Palpalá'),
(3, 'Perico'),
(4, 'Yala'),
(5, 'Jardín de Reyes'),
(6, 'San Antonio'),
(7, 'San Pedro'),
(8, 'Libertador General San Martín');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(6) NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `horas-semanales` int(2) NOT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `ID` int(6) NOT NULL,
  `COD_CASO` int(1) NOT NULL COMMENT '1-Perdí mi mascota, 2-Encontré una mascota perdia, 3-Encontré una mascota perdida y la tengo conmigo',
  `COD_ESTADO` int(1) NOT NULL COMMENT '1-No está con su dueño, 2-Ya está con su dueño, 3-Ahora tiene nuevo dueño',
  `CONTACTO` varchar(100) NOT NULL,
  `ID_LOCALIDAD` int(4) NOT NULL,
  `ID_BARRIO` int(5) NOT NULL,
  `CALLE` varchar(100) NOT NULL,
  `ID_RAZA` int(3) NOT NULL,
  `SENAS` varchar(100) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `EDAD` int(2) NOT NULL,
  `COLOR` varchar(30) NOT NULL,
  `COD_PELAJE` int(1) NOT NULL COMMENT '1-Largo, 2-Corto, 3-Enrulado, 4-Sin pelos',
  `PATH_FOTO` varchar(100) NOT NULL,
  `FECHA_CASO` date NOT NULL,
  `HORA_CASO` time NOT NULL,
  `OBS` varchar(100) NOT NULL,
  `FECHA_NOV` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `novedades`
--

INSERT INTO `novedades` (`ID`, `COD_CASO`, `COD_ESTADO`, `CONTACTO`, `ID_LOCALIDAD`, `ID_BARRIO`, `CALLE`, `ID_RAZA`, `SENAS`, `NOMBRE`, `EDAD`, `COLOR`, `COD_PELAJE`, `PATH_FOTO`, `FECHA_CASO`, `HORA_CASO`, `OBS`, `FECHA_NOV`) VALUES
(1, 1, 1, 'Sergio Orgás', 1, 1, 'Burela Oeste N 81', 1, 'Patas doblada', 'Luciana', 2, 'Negro y blanco', 3, './fotos/perdido1.jpg', '2015-12-01', '00:00:00', 'Ninguna', '2015-12-01 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor-cargo`
--

CREATE TABLE `profesor-cargo` (
  `id` int(6) NOT NULL,
  `id-profesor` int(6) NOT NULL,
  `id-cargo` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor-cupof`
--

CREATE TABLE `profesor-cupof` (
  `id` int(6) NOT NULL,
  `id-profesor` int(6) NOT NULL,
  `id-cupof` int(6) NOT NULL,
  `fecha-alta` date NOT NULL,
  `fecha-baja` date NOT NULL,
  `tipo-baja` int(1) NOT NULL,
  `concepto-baja` varchar(80) NOT NULL,
  `instrumento` int(1) NOT NULL,
  `instrumento_num` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `apellido` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cuil` varchar(13) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `caracter` int(1) NOT NULL,
  `id_cargo` int(2) NOT NULL,
  `fig_laboral` int(1) NOT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `apellido`, `nombre`, `cuil`, `caracter`, `id_cargo`, `fig_laboral`, `nivel`) VALUES
(2, 'Valeria Marcia', 'Abalos', '27-05259135-5', 1, 5, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas`
--

CREATE TABLE `razas` (
  `ID` int(3) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `razas`
--

INSERT INTO `razas` (`ID`, `NOMBRE`) VALUES
(1, 'Mestiza'),
(2, 'Ovejero alemán'),
(3, 'Pitbull'),
(4, 'Bulldog');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `COD_LOCALIDAD` (`ID_LOCALIDAD`,`ID`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CONTACTO` (`CONTACTO`);

--
-- Indices de la tabla `profesor-cargo`
--
ALTER TABLE `profesor-cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesor-cupof`
--
ALTER TABLE `profesor-cupof`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `indice-principal` (`id-profesor`,`id-cupof`,`fecha-alta`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `razas`
--
ALTER TABLE `razas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `barrios`
--
ALTER TABLE `barrios`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `profesor-cargo`
--
ALTER TABLE `profesor-cargo`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesor-cupof`
--
ALTER TABLE `profesor-cupof`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `razas`
--
ALTER TABLE `razas`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
