-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2017 a las 18:44:50
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `itca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `act_complementaria`
--

CREATE TABLE `act_complementaria` (
  `clave_act` int(11) NOT NULL,
  `nombre_actcomplementaria` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `act_complementaria`
--

INSERT INTO `act_complementaria` (`clave_act`, `nombre_actcomplementaria`) VALUES
(1, 'Danza'),
(2, 'Ajedrez'),
(3, 'MÃºsica'),
(4, 'futbol'),
(5, 'taller de lectura'),
(6, 'zumba'),
(7, 'voleibol'),
(8, 'forrajes'),
(9, 'reciclaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `clave_carrera` varchar(45) NOT NULL,
  `nombre_carrera` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`clave_carrera`, `nombre_carrera`) VALUES
('008321', 'Licenciatura en enfermeria'),
('0213457', 'Licenciatura en derecho'),
('765123', 'Licenciatura en ingles'),
('789456', 'Licenciatura en psicologia'),
('COPU-2010-205', 'Contador Publico'),
('IAGR-2010-214', 'Ingeniería en Agronomía'),
('IAMD-2010-213', 'Ingeniería en Administración'),
('IINF-2010-220', 'Ingeniería en Informática'),
('LADM-2010-234', 'Licenciatura en Administración'),
('LBIO-2010-233', 'Licenciatura en Biologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `Clave_depa` varchar(45) NOT NULL,
  `nombre_departamento` varchar(45) DEFAULT NULL,
  `trabajador_rfc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`Clave_depa`, `nombre_departamento`, `trabajador_rfc`) VALUES
('1', 'Departamento de lenguas extranjeras', 'BEBC811224AQ9'),
('2', 'Departamento de desarrollo academico', 'SAMA8608279W6'),
('3', 'Departamento de sistemas computacionales', 'RALE790418F8A'),
('4', 'Departamento de recursos financieros', 'NUMY840207KQ8 '),
('5', 'Departamento de escolares', 'REAR870506JT0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `No_contro` int(11) NOT NULL,
  `nombre_estudiante` varchar(45) DEFAULT NULL,
  `Apellido_Pestudiante` varchar(45) DEFAULT NULL,
  `Apeliido_Mestudiante` varchar(45) DEFAULT NULL,
  `semestre` varchar(45) DEFAULT NULL,
  `firma` varchar(45) DEFAULT NULL,
  `carrera` varchar(45) DEFAULT NULL,
  `carrera_clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`No_contro`, `nombre_estudiante`, `Apellido_Pestudiante`, `Apeliido_Mestudiante`, `semestre`, `firma`, `carrera`, `carrera_clave`) VALUES
(1693001, 'Alberto', 'Castillo', 'Peralta', 'III', NULL, NULL, 'LADM-2010-234'),
(15930129, 'Daniel', 'Macedonio', 'Bedolla', 'V', NULL, 'Ing. en Informatica', 'IINF-2010-220'),
(15930159, 'Citlali', 'Arroyo', 'Romero', 'V', NULL, 'Ing. en informatica', 'IINF-2010-220'),
(15930163, 'Alan Henrry', 'Alcantar', 'Medrano', 'V', NULL, 'Ing. en Informatica', 'IINF-2010-220'),
(15930164, 'Lucas Alberto', 'Alonso', 'Cruz', 'V', NULL, 'Ing. en informatica', 'IINF-2010-220'),
(15930167, 'Paola Rubi', 'Benitez', 'Bartolo', 'V', NULL, 'Ing. en Informatica', 'IINF-2010-220'),
(15930168, 'Neftali', 'Cabrera', 'Torres', 'V', NULL, NULL, 'IINF-2010-220'),
(15930170, 'Mario de Jesus', 'Carranza', 'Diaz', 'V', NULL, NULL, 'IINF-2010-220'),
(15930178, 'Ernesto Quintin', 'Garcia', 'Pineda', 'V', NULL, NULL, 'IINF-2010-220'),
(15930185, 'Alondra', 'Jaimes', 'Gutierrez', 'V', NULL, NULL, 'IINF-2010-220'),
(15930187, 'Evelia', 'Maldonado', 'Miranda', 'V', NULL, 'Ing. en Informatica', 'IINF-2010-220'),
(15930194, 'Jorge Luis', 'Ocampo', 'Millan', 'V', NULL, NULL, 'IINF-2010-220'),
(15930200, 'Jose RamÃ³n', 'Ortiz', 'Lopez', 'V', NULL, NULL, 'IINF-2010-220'),
(15930208, 'jorge', 'roque', 'pineda', 'V', '', '', 'IINF-2010-220'),
(15930210, 'Carlos Alberto', 'Ruiz', 'Gutierrez', 'V', NULL, NULL, 'IINF-2010-220'),
(15930216, 'Hernan', 'Santana', 'Benitez', 'V', NULL, NULL, 'IINF-2010-220'),
(15930218, 'Jonathan', 'Urieta', 'Albarran', 'V', NULL, NULL, 'IINF-2010-220'),
(15930219, 'Marco Antonio', 'Valle', 'Toledo', 'V', NULL, NULL, 'IINF-2010-220'),
(15930221, 'Agustin', 'Vivas', 'Pineda', 'V', NULL, NULL, 'IINF-2010-220'),
(15930227, 'Cristian', 'Alonso', 'Ignacio', 'V', NULL, NULL, 'IINF-2010-220');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituto`
--

CREATE TABLE `instituto` (
  `clave_instituto` varchar(45) NOT NULL,
  `nombreinstituto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `instituto`
--

INSERT INTO `instituto` (`clave_instituto`, `nombreinstituto`) VALUES
('121T0005B', 'Instituto Tecnológico de Ciudad Altamirano'),
('12DIT0001F', 'Instituto TecnolÃ³gico de Acapulco'),
('12DIT0002E ', 'Instituto TecnolÃ³gico de Chilpancingo'),
('15DIT0001C  ', 'Instituto TecnolÃ³gico de Toluca'),
('15PBH0079G', 'Instituto TecnolÃ³gico de Monterrey'),
('16DIT0012H ', 'Instituto TecnolÃ³gico de Morelia'),
('16EIT0007V ', 'Instituto TecnolÃ³gico de Huetamo'),
('17DIT0009T', 'Instituto TecnolÃ³gico de Zacatepec'),
('20DIT0002N ', 'Instituto TecnolÃ³gico de Oaxaca'),
('30DIT0002U ', 'Instituto TecnolÃ³gico de Veracruz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `rfc_instructor` varchar(45) NOT NULL,
  `nombre_instructor` varchar(45) DEFAULT NULL,
  `ApellidoP_instructor` varchar(45) DEFAULT NULL,
  `ApellidoM_instructor` varchar(45) DEFAULT NULL,
  `act_complementaria_clave_act` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`rfc_instructor`, `nombre_instructor`, `ApellidoP_instructor`, `ApellidoM_instructor`, `act_complementaria_clave_act`) VALUES
('GOVL801204159', 'Leonel', 'González', 'Vidales', 1),
('NUMY840207KQ8 ', 'Yuri', 'NuÃ±ez', 'Medrano', 6),
('RALE790418F8A', 'Edgar', 'Rangel', 'Lugo', 4),
('REAR870506JT0', 'Rosa Isabel', 'Reynoso', 'Andres', 2),
('SALA851105K36', 'Angelina', 'Salgado', 'Leon', 3),
('SAMA8608279W6 ', 'Aracely', 'Salgado', 'Mendoza', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `folio` int(11) NOT NULL,
  `asunto` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `lugar` varchar(45) DEFAULT NULL,
  `instituto_clave` varchar(45) NOT NULL,
  `instructor_rfc` varchar(45) NOT NULL,
  `estudiante_No_contro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`folio`, `asunto`, `fecha`, `lugar`, `instituto_clave`, `instructor_rfc`, `estudiante_No_contro`) VALUES
(1, 'descripción de solicitud', '2017-10-04', 'Ciudad Altamirano Gro', '121T0005B', 'GOVL801204159', 15930187),
(2, 'descripcion solicitud', '2017-11-10', 'Acapulco', '12DIT0001F', 'SALA851105K36', 15930129),
(3, 'futbol', '2017-12-04', 'Chilpancingo Gro;', '12DIT0002E ', 'SAMA8608279W6 ', 15930194),
(4, 'Danza', '2017-08-28', 'Toluca', '15DIT0001C  ', 'NUMY840207KQ8 ', 15930187),
(5, 'Taller de lectura', '2017-09-18', 'Morelia', '16DIT0012H ', 'SALA851105K36', 15930168),
(6, 'zumba', '2017-10-15', 'Morelos', '17DIT0009T', 'RALE790418F8A', 15930129);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `rfc` varchar(45) NOT NULL,
  `nombre_trabajador` varchar(45) DEFAULT NULL,
  `ApellidoP_trabajador` varchar(45) DEFAULT NULL,
  `ApellidoM_trabajador` varchar(45) DEFAULT NULL,
  `clave_presupuestal` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`rfc`, `nombre_trabajador`, `ApellidoP_trabajador`, `ApellidoM_trabajador`, `clave_presupuestal`) VALUES
('BEBC811224AQ9', 'Carlos Alberto', 'Bernal', 'Beltran', '45612387608'),
('NUMY840207KQ8 ', 'Yuri', 'NuÃ±ez', 'Medrano', '1099874321'),
('RALE790418F8A', 'Edgar', 'Rangel', 'Lugo', '9901184320'),
('REAR870506JT0', 'Rosa Isabel', 'Reynoso', 'Andres', '7281023217'),
('SAMA8608279W6', 'Aracely', 'Salgado', 'Mendoza', '0017892145');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `act_complementaria`
--
ALTER TABLE `act_complementaria`
  ADD PRIMARY KEY (`clave_act`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`clave_carrera`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`Clave_depa`),
  ADD KEY `fk_departamento_trabajador1_idx` (`trabajador_rfc`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`No_contro`,`carrera_clave`),
  ADD KEY `fk_estudiante_carrera1_idx` (`carrera_clave`);

--
-- Indices de la tabla `instituto`
--
ALTER TABLE `instituto`
  ADD PRIMARY KEY (`clave_instituto`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`rfc_instructor`),
  ADD KEY `fk_instructor_act_complementaria_idx` (`act_complementaria_clave_act`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `fk_solicitud_instituto1_idx` (`instituto_clave`),
  ADD KEY `fk_solicitud_instructor1_idx` (`instructor_rfc`),
  ADD KEY `fk_solicitud_estudiante1_idx` (`estudiante_No_contro`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`rfc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_departamento_trabajador1` FOREIGN KEY (`trabajador_rfc`) REFERENCES `trabajador` (`rfc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_carrera1` FOREIGN KEY (`carrera_clave`) REFERENCES `carrera` (`clave_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `fk_instructor_act_complementaria` FOREIGN KEY (`act_complementaria_clave_act`) REFERENCES `act_complementaria` (`clave_act`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_solicitud_estudiante1` FOREIGN KEY (`estudiante_No_contro`) REFERENCES `estudiante` (`No_contro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_instituto1` FOREIGN KEY (`instituto_clave`) REFERENCES `instituto` (`clave_instituto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_instructor1` FOREIGN KEY (`instructor_rfc`) REFERENCES `instructor` (`rfc_instructor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
