-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2020 a las 01:43:46
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
-- Base de datos: `hotelcibeles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `id` int(11) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `camas` varchar(20) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id`, `tipo`, `camas`, `precio`) VALUES
(1, 'habitacion superior', 'doble', 440),
(2, 'habitacion superior', 'triple', 660),
(3, 'habitacion sencilla', 'cuadruple', 600),
(4, 'habitacion superior', 'cuadruple', 880),
(5, 'habitacion de lujo', 'simple', 320),
(6, 'habitacion de lujo', 'doble', 640),
(7, 'habitacion de lujo', 'triple', 960),
(8, 'habitacion de lujo', 'cuadruple', 1280),
(9, 'casa de huespedes', 'simple', 180),
(10, 'casa de huespedes', 'doble', 360),
(11, 'casa de huespedes', 'cuadruple', 720),
(12, 'habitacion sencilla', 'simple', 150),
(13, 'habitacion sencilla', 'doble', 300),
(14, 'habitacion sencilla', 'triple', 450),
(15, 'habitacion superior', 'simple', 220),
(16, 'casa de huespedes', 'triple', 540);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huesped`
--

CREATE TABLE `huesped` (
  `dni` varchar(30) NOT NULL,
  `paterno` varchar(30) DEFAULT NULL,
  `materno` varchar(30) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `fechanac` date DEFAULT NULL,
  `nacionalidad` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `huesped`
--

INSERT INTO `huesped` (`dni`, `paterno`, `materno`, `nombre`, `fechanac`, `nacionalidad`, `email`, `telefono`) VALUES
('123', 'sss', 'ddd', 'aaa', '2020-07-17', 'Bahamas', 'asdadsadasd@gmail.com', '5212'),
('4545', 'dasd', 'dasd', 'kjkik', '2020-07-08', 'Aruba', 'sdfdf@gmailc', '4545'),
('555555', 'tyt', 'oo', 'hhh', '2020-07-01', 'Argentina', 'asdadsadasd@gmail.com', '4587');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regimen`
--

CREATE TABLE `regimen` (
  `idr` int(11) NOT NULL,
  `tipor` varchar(30) DEFAULT NULL,
  `cantidad` varchar(30) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `regimen`
--

INSERT INTO `regimen` (`idr`, `tipor`, `cantidad`, `costo`) VALUES
(1, 'ninguna', 'ninguna', 0),
(2, 'desayuno', 'simple', 20),
(3, 'desayuno', 'doble', 40),
(4, 'desayuno', 'triple', 60),
(5, 'desayuno', 'cuadruple', 80),
(6, 'media pizarra', 'simple', 50),
(7, 'media pizarra', 'doble', 100),
(8, 'media pizarra', 'triple', 150),
(9, 'media pizarra', 'cuadruple', 200),
(10, 'pension completa', 'simple', 80),
(11, 'pension completa', 'doble', 160),
(12, 'pension completa', 'triple', 240),
(13, 'pension completa', 'cuadruple', 320);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `nro_res` int(11) NOT NULL,
  `dni` varchar(30) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `idr` int(11) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`nro_res`, `dni`, `id`, `idr`, `fecha_ingreso`, `total`, `fecha_salida`, `estado`) VALUES
(45, '123', 10, 11, '2020-07-01', 1040, '2020-07-03', 'confirmado'),
(46, '555555', 6, 3, '2020-07-01', 14280, '2020-07-22', 'sin confirmar'),
(47, '4545', 5, 2, '2020-07-06', 680, '2020-07-08', 'confirmado'),
(48, '123', 12, 2, '2020-07-06', 340, '2020-07-08', 'sin confirmar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `huesped`
--
ALTER TABLE `huesped`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `regimen`
--
ALTER TABLE `regimen`
  ADD PRIMARY KEY (`idr`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`nro_res`),
  ADD KEY `fk_dn` (`dni`),
  ADD KEY `fk_id` (`id`),
  ADD KEY `fk_idr` (`idr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `regimen`
--
ALTER TABLE `regimen`
  MODIFY `idr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `nro_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_dn` FOREIGN KEY (`dni`) REFERENCES `huesped` (`dni`),
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `habitacion` (`id`),
  ADD CONSTRAINT `fk_idr` FOREIGN KEY (`idr`) REFERENCES `regimen` (`idr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
