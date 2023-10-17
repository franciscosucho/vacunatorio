-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2023 a las 18:53:06
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
  `id_clinica` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  PRIMARY KEY (`id_clinica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clinica`
--

INSERT INTO `clinica` (`id_clinica`, `nombre`, `direccion`, `telefono`) VALUES
(1, 'Clinica A', 'Calle 123', '123-456-7890'),
(2, 'Clinica B', 'Avenida 456', '987-654-3210'),
(3, 'Clinica C', 'Calle 789', '555-123-4567'),
(4, 'Clinica D', 'Avenida 1011', '111-222-3333'),
(5, 'Clinica E', 'Calle 1213', '444-555-6666'),
(6, 'Clinica F', 'Avenida 1415', '777-888-9999'),
(7, 'Clinica G', 'Calle 1617', '333-444-5555'),
(8, 'Clinica H', 'Avenida 1819', '666-777-8888'),
(9, 'Clinica I', 'Calle 2021', '999-111-2222'),
(10, 'Clinica J', 'Avenida 2223', '222-333-4444'),
(11, 'Clinica K', 'Calle 2425', '888-999-0000'),
(12, 'Clinica L', 'Avenida 2627', '444-555-6666'),
(13, 'Clinica M', 'Calle 2829', '111-222-3333'),
(14, 'Clinica N', 'Avenida 3031', '555-666-7777'),
(15, 'Clinica O', 'Calle 3233', '999-888-7777');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `contacto` varchar(30) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `clinica` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  UNIQUE KEY `clinica` (`clinica`),
  FOREIGN KEY (`clinica`) REFERENCES `clinica` (`id_clinica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `apellido`, `contacto`, `cargo`, `clinica`) VALUES
(1, 'Juan', 'Pérez', 'jperez@email.com', 'Médico', 1),
(2, 'María', 'López', 'mlopez@email.com', 'Enfermero', 2),
(3, 'Pedro', 'García', 'pgarcia@email.com', 'Administrativo', 3),
(4, 'Ana', 'Rodríguez', 'arodriguez@email.com', 'Médico', 4),
(5, 'Luis', 'Martínez', 'lmartinez@email.com', 'Enfermero', 5),
(6, 'Laura', 'Sánchez', 'lsanchez@email.com', 'Administrativo', 6),
(7, 'Carlos', 'Ramírez', 'cramirez@email.com', 'Médico', 7),
(8, 'Sofía', 'Torres', 'storres@email.com', 'Enfermero', 8),
(9, 'Diego', 'González', 'dgonzalez@email.com', 'Administrativo', 9),
(10, 'Valentina', 'Pérez', 'vperez@email.com', 'Médico', 10),
(11, 'Mateo', 'López', 'mlopez2@email.com', 'Enfermero', 11),
(12, 'Camila', 'García', 'cgarcia@email.com', 'Administrativo', 12),
(13, 'Andrés', 'Rodríguez', 'arodriguez2@email.com', 'Médico', 13),
(14, 'Isabella', 'Martínez', 'imartinez@email.com', 'Enfermero', 14),
(15, 'Lucas', 'Sánchez', 'lsanchez2@email.com', 'Administrativo', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_vacunas`
--

CREATE TABLE `historial_vacunas` (
  `id_vacuna` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_vacuna` varchar(30) NOT NULL,
  `fecha_aplicacion` date NOT NULL,
  `observaciones` varchar(90) NOT NULL,
  `cod_historia` int(11) NOT NULL,
  PRIMARY KEY (`id_vacuna`),
  UNIQUE KEY `cod_historia` (`cod_historia`),
  FOREIGN KEY (`cod_historia`) REFERENCES `historia_clinica` (`cod_historial`)
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
  `cod_historial` int(11) NOT NULL AUTO_INCREMENT,
  `enfermedades` varchar(30) NOT NULL,
  `alergias` varchar(30) NOT NULL,
  `tipo_sangre` varchar(3) NOT NULL,
  `ultima_visita` date NOT NULL,
  `paciente` int(11) NOT NULL,
  PRIMARY KEY (`cod_historial`),
  UNIQUE KEY `paciente` (`paciente`),
  FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`dni`)
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
  `id_producto` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(33) NOT NULL,
  `fabricante` varchar(33) NOT NULL,
  `stock` int(11) NOT NULL,
  `efectividad_en_dias` int(11) NOT NULL,
  `dirigido_para` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`nombre`, `fabricante`, `stock`, `efectividad_en_dias`, `dirigido_para`) VALUES
('Hepatitis B', 'Bayern', 200, 20, 'Recién nacidos'),
('BCG (Tuberculosis)', 'Galeno', 30, 10, 'Recién nacidos'),
('Polio IPV (Salk)', '', 200, 10, 'Lactantes'),
('Quíntuple / Pentavalente', '', 200, 10, 'Lactantes'),
('Neumococo Conjugada (Neumo 13)', '', 200, 10, 'Lactantes'),
('Rotavirus', '', 100, 20, 'Lactantes'),
('Meningococo', '', 200, 40, '3 Meses'),
('Polio IPV (Salk)', '', 40, 30, '4 Meses'),
('Quíntuple / Pentavalente', '', 40, 300, '4 Meses'),
('Neumococo Conjugada (Neumo 13)', '', 20, 40, '4 Meses'),
('Rotavirus', '', 200, 100, '4 Meses'),
('Doble Bacteriana (cada 10 años)', '', 0, 0, 'ADULTOS'),
('Hepatitis B', '', 0, 0, 'ADULTOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada_laboral`
--

CREATE TABLE `jornada_laboral` (
  `dia` date NOT NULL,
  `horario_entrada` time NOT NULL,
  `horario_salida` time NOT NULL,
  `empleado` int(11) NOT NULL,
  PRIMARY KEY (`dia`,`empleado`),
  FOREIGN KEY (`empleado`) REFERENCES `empleado` (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `jornada_laboral`
--

INSERT INTO `jornada_laboral` (`dia`, `horario_entrada`, `horario_salida`, `empleado`) VALUES
('2023-09-25', '08:00:00', '17:00:00', 1),
('2023-09-26', '08:00:00', '17:00:00', 1),
('2023-09-27', '08:00:00', '17:00:00', 1),
('2023-09-28', '08:00:00', '17:00:00', 1),
('2023-09-29', '08:00:00', '17:00:00', 1),
('2023-09-25', '07:00:00', '16:00:00', 2),
('2023-09-26', '07:00:00', '16:00:00', 2),
('2023-09-27', '07:00:00', '16:00:00', 2),
('2023-09-28', '07:00:00', '16:00:00', 2),
('2023-09-29', '07:00:00', '16:00:00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `dni` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `nacimiento` date NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`dni`, `nombre`, `apellido`, `telefono`, `direccion`, `nacimiento`) VALUES
(4634635, 'Paciente A', 'Apellido A', '123-456-7890', 'Dirección A', '2000-01-01'),
(7891234, 'Paciente B', 'Apellido B', '987-654-3210', 'Dirección B', '1985-03-15'),
(2345678, 'Paciente C', 'Apellido C', '555-123-4567', 'Dirección C', '1999-07-20'),
(1234567, 'Paciente D', 'Apellido D', '111-222-3333', 'Dirección D', '1972-11-30'),
(9876543, 'Paciente E', 'Apellido E', '444-555-6666', 'Dirección E', '2005-04-05'),
(3456789, 'Paciente F', 'Apellido F', '777-888-9999', 'Dirección F', '1993-12-10'),
(5678901, 'Paciente G', 'Apellido G', '333-444-5555', 'Dirección G', '1982-06-25'),
(8901234, 'Paciente H', 'Apellido H', '666-777-8888', 'Dirección H', '1968-09-18'),
(6789012, 'Paciente I', 'Apellido I', '999-111-2222', 'Dirección I', '1990-07-31'),
(4567890, 'Paciente J', 'Apellido J', '222-333-4444', 'Dirección J', '1977-08-09'),
(1237890, 'Paciente K', 'Apellido K', '888-999-0000', 'Dirección K', '1994-11-05');
COMMIT;
