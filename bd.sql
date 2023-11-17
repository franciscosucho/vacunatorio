-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2023 a las 01:17:40
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `vacunatorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinica`
--

CREATE TABLE `clinica` (
  `id_clinica` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `horario_atencion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clinica`
--

INSERT INTO `clinica` (`id_clinica`, `nombre`, `direccion`, `telefono`, `horario_atencion`) VALUES
(1, 'Clinica A', 'Calle 123', '123-456-7890', 'De 7AM A 6PM'),
(2, 'Clinica B', 'Avenida 456', '987-654-3210', 'De 8AM A 7PM'),
(3, 'Clinica C', 'Calle 789', '555-123-4567', 'De 7AM A 6PM'),
(4, 'Clinica D', 'Avenida 1011', '111-222-3333', 'De 5AM A 6PM'),
(5, 'Clinica E', 'Calle 1213', '444-555-6666', 'De 6AM A 6PM'),
(6, 'Clinica F', 'Avenida 1415', '777-888-9999', 'De 6.30AM A 6PM'),
(7, 'Clinica G', 'Calle 1617', '333-444-5555', 'De 7AM A 7PM'),
(8, 'Clinica H', 'Avenida 1819', '666-777-8888', 'De 7AM A 6PM'),
(9, 'Clinica I', 'Calle 2021', '999-111-2222', 'De 7AM A 6PM'),
(10, 'Clinica J', 'Avenida 2223', '222-333-4444', 'De 7AM A 6PM'),
(11, 'Clinica K', 'Calle 2425', '888-999-0000', 'De 7AM A 4PM'),
(12, 'Clinica L', 'Avenida 2627', '444-555-6666', 'De 7AM A 6PM'),
(13, 'Clinica M', 'Calle 2829', '111-222-3333', 'De 7AM A 6PM'),
(14, 'Clinica N', 'Avenida 3031', '555-666-7777', 'De 7AM A 6PM'),
(15, 'Clinica O', 'Calle 3233', '999-888-7777', 'De 7AM A 6PM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_vacunas`
--

CREATE TABLE `historial_vacunas` (
  `id_vacuna` int(11) NOT NULL,
  `nombre_vacuna` varchar(30) NOT NULL,
  `fecha_aplicacion` date NOT NULL,
  `observaciones` varchar(90) NOT NULL,
  `cod_historia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `historial_vacunas`
--

INSERT INTO `historial_vacunas` (`id_vacuna`, `nombre_vacuna`, `fecha_aplicacion`, `observaciones`, `cod_historia`) VALUES
(1, 'eska', '2023-09-22', 'asdasd lasd fbjksdfjksdffglsgklsdgjhsg klgj fdg dfhdgu z', 1),
(2, 'VacunaXYZ', '2023-09-12', 'Primera dosis', 2),
(3, 'VacunaABC', '2023-09-13', 'Segunda dosis', 3),
(4, 'Vacuna123', '2023-09-14', 'Vacunación completa', 4),
(5, 'Vacuna456', '2023-09-15', 'Revisión médica posterior', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `cod_historial` int(11) NOT NULL,
  `enfermedades` varchar(30) NOT NULL,
  `alergias` varchar(30) NOT NULL,
  `tipo_sangre` varchar(3) NOT NULL,
  `ultima_visita` date NOT NULL,
  `paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `historia_clinica`
--

INSERT INTO `historia_clinica` (`cod_historial`, `enfermedades`, `alergias`, `tipo_sangre`, `ultima_visita`, `paciente`) VALUES
(1, 'fds', 'fds', 'a+', '2023-09-14', 4634635),
(2, 'Diabetes', 'Polen', 'B-', '2023-07-25', 7891234),
(3, 'Asma', 'Ninguna', 'O+', '2023-09-02', 2345678),
(4, 'Artritis', 'Ninguna', 'AB+', '2023-08-15', 1234567),
(5, 'Alergia a los mariscos', 'Mariscos', 'A-', '2023-09-05', 9876543),
(6, 'Migraña', 'Ninguna', 'B+', '2023-08-30', 3456789),
(7, 'Enfermedad cardiovascular', 'Ninguna', 'O-', '2023-09-01', 5678901),
(8, 'Osteoporosis', 'Ninguna', 'AB-', '2023-08-22', 8901234),
(9, 'Depresión', 'Ninguna', 'A+', '2023-08-18', 6789012),
(10, 'Gastritis', 'Ninguna', 'B+', '2023-07-31', 4567890),
(11, 'Alergia al polvo', 'Polvo', 'O-', '2023-08-28', 1237890);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(33) NOT NULL,
  `fabricante` varchar(33) NOT NULL,
  `stock` int(11) NOT NULL,
  `efectividad_en_dias` varchar(11) NOT NULL,
  `dirigido_para` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_producto`, `nombre`, `fabricante`, `stock`, `efectividad_en_dias`, `dirigido_para`) VALUES
(1, 'Producto A', 'Fabricante 1', 344, '24 dias', ''),
(2, 'Producto B', 'Fabricante 2', 75, '270 dias', ''),
(3, 'Producto C', 'Fabricante 3', 50, '180 dias', ''),
(4, 'Producto D', 'Fabricante 4', 125, '300 dias', ''),
(5, 'Producto E', 'Fabricante 5', 90, '240 dias', ''),
(6, 'Producto F', 'Fabricante 6', 60, '120', ''),
(7, 'Producto G', 'Fabricante 7', 110, '210 dias', ''),
(8, 'Producto H', 'Fabricante 8', 70, '150 dias', ''),
(9, 'Producto I', 'Fabricante 9', 85, '180 dias', ''),
(10, 'Producto J', 'Fabricante 10', 120, '365 dias', ''),
(11, 'Producto K', 'Fabricante 11', 55, '90 dias', ''),
(12, 'Producto L', 'Fabricante 12', 95, '210 dias', ''),
(13, 'Producto M', 'Fabricante 13', 70, '120 dias', ''),
(14, 'Producto N', 'Fabricante 14', 150, '365 dias', ''),
(15, 'Producto O', 'Fabricante 15', 80, '240 dias', ''),
(16, 'Hepatitis B', 'Bayern', 200, '20 dias', 'Recién nacidos'),
(17, 'BCG (Tuberculosis)', 'Galeno', 30, '10 dias', 'Recién nacidos'),
(18, 'Polio IPV (Salk)', '', 200, '10 dias', 'Lactantes'),
(19, 'Quíntuple / Pentavalente', '', 200, '10 dias', 'Lactantes'),
(20, 'Neumococo Conjugada (Neumo 13)', '', 200, '10 dias', 'Lactantes'),
(21, 'Rotavirus', '', 100, '20 dias', 'Lactantes'),
(22, 'Meningococo', '', 200, '40 dias', '3 Meses'),
(23, 'Polio IPV (Salk)', '', 40, '30 dias', '4 Meses'),
(24, 'Quíntuple / Pentavalente', '', 40, '300 dias', '4 Meses'),
(25, 'Neumococo Conjugada (Neumo 13)', '', 20, '40 dias', '4 Meses'),
(26, 'Rotavirus', '', 200, '100', '4 Meses'),
(27, 'Doble Bacteriana (cada 10 años)', '', 0, '0', 'ADULTOS'),
(28, 'Hepatitis B', '', 0, '0', 'ADULTOS'),
(29, 'eumococo Conjugada (Neumo 11)', 'bayern', 100, '10', '3 Meses');

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `pacientes`


CREATE TABLE `pacientes` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `contacto` varchar(30) NOT NULL,
  `fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`dni`, `nombre`, `apellido`, `contacto`, `fecha_nac`) VALUES
(1234567, 'Ana', 'Rodríguez', 'ana@email.com', '1988-05-03'),
(1237890, 'Mateo', 'López', 'mateo@email.com', '1996-02-19'),
(2345678, 'Pedro', 'García', 'pedro@email.com', '1992-07-10'),
(3456789, 'Laura', 'Sánchez', 'laura@email.com', '1984-09-17'),
(4567890, 'Valentina', 'Pérez', 'valentina@email.com', '1994-08-30'),
(4634635, 'Maria', 'Polardo', 'polardo@gmail.com', '1999-06-02'),
(5678901, 'Carlos', 'Ramírez', 'carlos@email.com', '1997-04-08'),
(6789012, 'Diego', 'González', 'diego@email.com', '1993-06-14'),
(7891234, 'María', 'López', 'maria@email.com', '1985-03-22'),
(8901234, 'Sofía', 'Torres', 'sofia@email.com', '1991-12-01'),
(9876543, 'Luis', 'Martínez', 'luis@email.com', '1995-11-28');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_turno`
--

CREATE TABLE `solicitud_turno` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `localidad` varchar(30) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  `telefono` int(20) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `dia` date NOT NULL,
  `dni` int (15)NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitud_turno`
--

INSERT INTO `solicitud_turno` (`id`, `nombre`, `localidad`, `descripcion`, `telefono`, `correo`, `dia`, `hora`) VALUES
(1, 'jose', 'Olivos', 'vacunarme contra el covid', 12141241, 'dante@gmail.com', '2023-11-17', '23:08:00'),
(2, 'jose', 'Olivos', 'vacunarme contra el covid', 12141241, 'dante@gmail.com', '0000-00-00', '00:00:00'),
(3, '', 'Boulogne', '', 0, '', '0000-00-00', '00:00:00'),
(4, '', 'Boulogne', '', 0, '', '0000-00-00', '00:00:00'),
(5, '', 'Boulogne', '', 0, '', '0000-00-00', '00:00:00'),
(6, '', 'Boulogne', '', 0, '', '0000-00-00', '00:00:00'),
(7, '', 'Boulogne', '', 0, '', '0000-00-00', '00:00:00'),
(8, '', 'Boulogne', '', 0, '', '0000-00-00', '00:00:00'),
(9, '', 'Boulogne', '', 0, '', '0000-00-00', '00:00:00'),
(10, '', 'Boulogne', '', 0, '', '0000-00-00', '00:00:00'),
(11, '', 'Boulogne', '', 0, '', '0000-00-00', '00:00:00'),
(12, '', 'Boulogne', '', 0, '', '0000-00-00', '00:00:00'),
(13, '', 'Boulogne', '', 0, '', '0000-00-00', '00:00:00'),
(14, 'maria', 'vicentelopez', 'vacunarme contra el covid', 12141241, 'dante@gmail.com', '0000-00-00', '00:00:00'),
(15, 'fran', 'Boulogne', 'vacunarme contra el covid', 12141241, 'anabarrio@gmal.com', '0000-00-00', '00:00:00'),
(16, 'milo j', 'Villa Adelina', 'vacunarme para la gripe', 124142121, 'miloj.@gmail.com', '0000-00-00', '00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clinica`
--
ALTER TABLE `clinica`
  ADD PRIMARY KEY (`id_clinica`);

--



--
-- Indices de la tabla `historial_vacunas`
--
ALTER TABLE `historial_vacunas`
  ADD PRIMARY KEY (`id_vacuna`),
  ADD UNIQUE KEY `cod_historia` (`cod_historia`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`cod_historial`),
  ADD UNIQUE KEY `paciente` (`paciente`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `jornada_laboral`
--

--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`dni`);

--

--
ALTER TABLE `solicitud_turno`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clinica`
--
ALTER TABLE `clinica`
  MODIFY `id_clinica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `historial_vacunas`
--
ALTER TABLE `historial_vacunas`
  MODIFY `id_vacuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `cod_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `dni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9876544;

--
-- AUTO_INCREMENT de la tabla `registro`
--

--
-- AUTO_INCREMENT de la tabla `solicitud_turno`
--
ALTER TABLE `solicitud_turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--

-- Filtros para la tabla `historial_vacunas`
--
ALTER TABLE `historial_vacunas`
  ADD CONSTRAINT `historial_vacunas_ibfk_1` FOREIGN KEY (`cod_historia`) REFERENCES `historia_clinica` (`cod_historial`);

--
-- Filtros para la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD CONSTRAINT `historia_clinica_ibfk_1` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`dni`);

