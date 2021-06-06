-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2021 a las 16:23:01
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `educalegre`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idAlumno` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `segundoApellido` varchar(45) NOT NULL,
  `dni` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  `Grupo_idGrupos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idAlumno`, `nombre`, `apellido`, `segundoApellido`, `dni`, `telefono`, `email`, `contraseña`, `Grupo_idGrupos`) VALUES
(1, 'alumno', 'Prueba', 'Prueba', '11111111A', '611111111', 'alumno.prueba@educalegre.com', '28a6871e2c3872f638cd67952cdff278641c5141', 1111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tamano` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `nombre`, `tipo`, `tamano`, `usuario`) VALUES
(52, 'jquery_ejemplo.txt', 'text/plain', '1895', 'profesor.prueba@educalegre.com'),
(53, 'añadir_documentación.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '14908', 'profesor.prueba@educalegre.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `idAsignaturas` int(11) NOT NULL,
  `CodigoAsginatura` varchar(45) DEFAULT NULL,
  `Modulo_idModulo` int(11) NOT NULL,
  `Profesor_idProfesor` int(11) NOT NULL,
  `Profesor_idProfesor1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id_clase` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`id_clase`, `nombre`, `clave`, `usuario`, `fecha`) VALUES
(48, 'Clase prueba', 'BS0pJrgsVD0', 'profesor.prueba@educalegre.com', '2021-06-06 13:51:27'),
(50, 'DWEC', 'HTQMviBFT9F', 'profesor.prueba@educalegre.com', '2021-06-06 14:00:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas`
--

CREATE TABLE `entregas` (
  `id` int(11) NOT NULL,
  `texto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `archivo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nota` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `idplanificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entregas`
--

INSERT INTO `entregas` (`id`, `texto`, `usuario`, `clave`, `archivo`, `fecha`, `nota`, `idplanificacion`) VALUES
(0, 'Calc javascript', 'alumno.prueba@educalegre.com', 'HTQMviBFT9F', 'educalegre_pruebas.sql', '2021-06-06 14:13:16', '7', 72);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `idGrupos` int(11) NOT NULL,
  `clase` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idGrupos`, `clase`) VALUES
(1111, '1º DAW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_has_modulo`
--

CREATE TABLE `grupo_has_modulo` (
  `Grupo_idGrupos` int(11) NOT NULL,
  `Modulo_idModulo` int(11) NOT NULL,
  `añoInicio` varchar(45) DEFAULT NULL,
  `añoFin` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `misclases`
--

CREATE TABLE `misclases` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `misclases`
--

INSERT INTO `misclases` (`id`, `usuario`, `clave`) VALUES
(25, 'alumno.prueba@educalegre.com', 'RaLdc3gz9Oi'),
(28, 'alumno.prueba@educalegre.com', 'HTQMviBFT9F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idModulo` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `codigoOficial` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `Alumno_idAlumno` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `Asignaturas_idAsignaturas` int(11) NOT NULL,
  `Asignaturas_Modulo_idModulo` int(11) NOT NULL,
  `Asignaturas_Profesor_idProfesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion`
--

CREATE TABLE `planificacion` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `titulo` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `texto` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fechaentrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `planificacion`
--

INSERT INTO `planificacion` (`id`, `usuario`, `clave`, `titulo`, `texto`, `fecha`, `fechaentrega`) VALUES
(70, 'profesor.prueba@educalegre.com', 'BS0pJrgsVD0', 'Tarea 1', 'tarea 1 de prueba                    ', '2021-06-06 13:58:56', '2021-06-12'),
(72, 'profesor.prueba@educalegre.com', 'HTQMviBFT9F', 'Calculadora Javascript', 'Buenas tardes, \r\nhacedme una calculadora en javascript                    ', '2021-06-06 14:05:05', '2021-06-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idProfesor` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `segundoApellido` varchar(45) DEFAULT NULL,
  `dni` varchar(45) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `nombre`, `apellido`, `segundoApellido`, `dni`, `contraseña`, `email`, `telefono`) VALUES
(1, 'profesor', 'Prueba', 'Prueba', '11111111B', 'd256b4bcc74876f3c624dcb1dec683bafde9e36a', 'profesor.prueba@educalegre.com', '611111112');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_has_grupo`
--

CREATE TABLE `profesor_has_grupo` (
  `Profesor_idProfesor` int(11) NOT NULL,
  `Grupo_idGrupos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idAlumno`),
  ADD UNIQUE KEY `Grupo_idGrupos_UNIQUE` (`Grupo_idGrupos`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`),
  ADD KEY `fk_Alumno_Grupo1_idx` (`Grupo_idGrupos`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`idAsignaturas`,`Modulo_idModulo`,`Profesor_idProfesor`),
  ADD KEY `fk_Asignaturas_Modulo1_idx` (`Modulo_idModulo`),
  ADD KEY `fk_Asignaturas_Profesor1_idx` (`Profesor_idProfesor1`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id_clase`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idGrupos`);

--
-- Indices de la tabla `grupo_has_modulo`
--
ALTER TABLE `grupo_has_modulo`
  ADD PRIMARY KEY (`Grupo_idGrupos`,`Modulo_idModulo`),
  ADD KEY `fk_Grupo_has_Modulo_Modulo1_idx` (`Modulo_idModulo`),
  ADD KEY `fk_Grupo_has_Modulo_Grupo1_idx` (`Grupo_idGrupos`);

--
-- Indices de la tabla `misclases`
--
ALTER TABLE `misclases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idModulo`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`Alumno_idAlumno`,`Asignaturas_idAsignaturas`,`Asignaturas_Modulo_idModulo`,`Asignaturas_Profesor_idProfesor`),
  ADD KEY `fk_Notas_Asignaturas1_idx` (`Asignaturas_idAsignaturas`,`Asignaturas_Modulo_idModulo`,`Asignaturas_Profesor_idProfesor`);

--
-- Indices de la tabla `planificacion`
--
ALTER TABLE `planificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idProfesor`);

--
-- Indices de la tabla `profesor_has_grupo`
--
ALTER TABLE `profesor_has_grupo`
  ADD PRIMARY KEY (`Profesor_idProfesor`,`Grupo_idGrupos`),
  ADD KEY `fk_Profesor_has_Grupo_Grupo1_idx` (`Grupo_idGrupos`),
  ADD KEY `fk_Profesor_has_Grupo_Profesor1_idx` (`Profesor_idProfesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `misclases`
--
ALTER TABLE `misclases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `planificacion`
--
ALTER TABLE `planificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_Alumno_Grupo1` FOREIGN KEY (`Grupo_idGrupos`) REFERENCES `grupo` (`idGrupos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD CONSTRAINT `fk_Asignaturas_Modulo1` FOREIGN KEY (`Modulo_idModulo`) REFERENCES `modulo` (`idModulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Asignaturas_Profesor1` FOREIGN KEY (`Profesor_idProfesor1`) REFERENCES `profesor` (`idProfesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupo_has_modulo`
--
ALTER TABLE `grupo_has_modulo`
  ADD CONSTRAINT `fk_Grupo_has_Modulo_Grupo1` FOREIGN KEY (`Grupo_idGrupos`) REFERENCES `grupo` (`idGrupos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Grupo_has_Modulo_Modulo1` FOREIGN KEY (`Modulo_idModulo`) REFERENCES `modulo` (`idModulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `fk_Notas_Alumno1` FOREIGN KEY (`Alumno_idAlumno`) REFERENCES `alumno` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Notas_Asignaturas1` FOREIGN KEY (`Asignaturas_idAsignaturas`,`Asignaturas_Modulo_idModulo`,`Asignaturas_Profesor_idProfesor`) REFERENCES `asignaturas` (`idAsignaturas`, `Modulo_idModulo`, `Profesor_idProfesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `profesor_has_grupo`
--
ALTER TABLE `profesor_has_grupo`
  ADD CONSTRAINT `fk_Profesor_has_Grupo_Grupo1` FOREIGN KEY (`Grupo_idGrupos`) REFERENCES `grupo` (`idGrupos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Profesor_has_Grupo_Profesor1` FOREIGN KEY (`Profesor_idProfesor`) REFERENCES `profesor` (`idProfesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
