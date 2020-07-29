-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2020 a las 01:43:34
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `flujohotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `nro` int(11) NOT NULL,
  `codFlujo` varchar(4) DEFAULT NULL,
  `codProceso` varchar(4) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `idr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`nro`, `codFlujo`, `codProceso`, `usuario`, `fechainicio`, `fechafin`, `idr`) VALUES
(2, 'f1', 'P9', 'admin', '2020-07-28', '2020-07-28', 47),
(3, 'f1', 'P9', 'erik', '2020-07-28', NULL, 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(30) DEFAULT NULL,
  `codRol` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`usuario`, `clave`, `codRol`) VALUES
('admin', 'admin', 'A'),
('erik', 'erik', 'A'),
('moises', 'moises', 'U');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `codFlujo` varchar(3) NOT NULL,
  `codProceso` varchar(4) NOT NULL,
  `codProcesoSiguiente` varchar(4) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `codRol` varchar(3) DEFAULT NULL,
  `pantalla` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`codFlujo`, `codProceso`, `codProcesoSiguiente`, `tipo`, `codRol`, `pantalla`) VALUES
('F1', 'P1', 'P2', 'I', 'U', 'informacion.php'),
('F1', 'P10', NULL, 'P', 'A', 'comprobante.php'),
('F1', 'P2', 'P3', 'P', 'U', 'THabitacion.php'),
('F1', 'P3', 'P4', 'E', 'U', 'fecha.php'),
('F1', 'P4', NULL, 'C', 'A', 'disponibilidad.php'),
('F1', 'P5', NULL, 'C', 'A', 'continua_busqueda.php'),
('F1', 'P6', 'P7', 'E', 'U', 'ingresa_datos.php'),
('F1', 'P7', 'P8', 'E', 'U', 'pago.php'),
('F1', 'P8', NULL, 'C', 'B', 'verifica_cuenta.php'),
('F1', 'P9', NULL, 'C', 'B', 'continua_intentando.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesocondicion`
--

CREATE TABLE `procesocondicion` (
  `codFlujo` varchar(3) DEFAULT NULL,
  `codProceso` varchar(4) DEFAULT NULL,
  `codProcesoSI` varchar(4) DEFAULT NULL,
  `codProcesoNO` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `procesocondicion`
--

INSERT INTO `procesocondicion` (`codFlujo`, `codProceso`, `codProcesoSI`, `codProcesoNO`) VALUES
('F1', 'P4', 'P6', 'P5'),
('F1', 'P5', 'P2', NULL),
('F1', 'P8', 'P10', 'P9'),
('F1', 'P9', 'P7', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `codRol` varchar(3) NOT NULL,
  `descripcion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`codRol`, `descripcion`) VALUES
('A', 'Administra'),
('B', 'Banco'),
('U', 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`nro`),
  ADD KEY `fk_us` (`usuario`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `fk_cr` (`codRol`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`codFlujo`,`codProceso`),
  ADD KEY `fk_pr` (`codRol`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`codRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `nro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `fk_us` FOREIGN KEY (`usuario`) REFERENCES `login` (`usuario`);

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_cr` FOREIGN KEY (`codRol`) REFERENCES `rol` (`codRol`);

--
-- Filtros para la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD CONSTRAINT `fk_pr` FOREIGN KEY (`codRol`) REFERENCES `rol` (`codRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
