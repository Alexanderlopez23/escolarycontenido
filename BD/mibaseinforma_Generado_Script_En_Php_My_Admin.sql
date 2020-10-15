-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2020 a las 15:29:05
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mibaseinforma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `IdContacto` int(12) NOT NULL COMMENT 'Este campo es para guardar el numero de documento del contacto ',
  `ConNombres` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Este campo es para guardar los nombres del contacto ',
  `ConApellidos` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Este campo es para guardar los apellidos del contacto \\n',
  `ConCorreo` varchar(55) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Este campo es para guardar el correo del contacto ',
  `Estado` tinyint(1) NOT NULL DEFAULT 1,
  `Ususesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Created` timestamp NULL DEFAULT current_timestamp(),
  `Update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rolcontacto_Idrolcontacto` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`IdContacto`, `ConNombres`, `ConApellidos`, `ConCorreo`, `Estado`, `Ususesion`, `Created`, `Update`, `rolcontacto_Idrolcontacto`) VALUES
(1, 'Maria', 'Caicedo', 'Maria@gmail.com', 1, NULL, '2020-09-10 15:03:21', '2020-09-19 14:56:57', 1),
(2, 'Carlos', 'hernandez', 'car@gmail.com', 1, NULL, '2020-09-10 15:03:30', '2020-09-10 15:08:10', 2),
(3, 'Richard ', 'Maldonado', 'maldonado@gmail.com', 1, NULL, '2020-09-10 15:03:47', '2020-09-10 15:08:14', 3),
(4, 'Paola', 'Marin', 'paola@gmail.com', 0, NULL, '2020-10-01 21:44:02', '2020-10-13 22:32:23', 2),
(234, 'Sofia', 'Brons', 'metagmail@g.com', 0, NULL, '2020-10-04 02:00:17', '2020-10-13 14:15:17', 1),
(123487, 'Luis', 'Forero', 'Luis@gmail.com', 0, NULL, '2020-10-15 01:17:27', '2020-10-15 01:19:27', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `IdCurso` int(5) NOT NULL COMMENT 'Este sera el valor id para identificar el curso de un vocero',
  `CurNum` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Este campo guardara los cursos que puede tener un vocero ejemplo: 801',
  `Estado` tinyint(1) NOT NULL DEFAULT 1,
  `Ususesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Created` timestamp NULL DEFAULT current_timestamp(),
  `Update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`IdCurso`, `CurNum`, `Estado`, `Ususesion`, `Created`, `Update`) VALUES
(1, '601', 1, NULL, '2020-09-10 14:34:18', '2020-09-10 14:35:07'),
(2, '701', 1, NULL, '2020-09-10 14:34:21', '2020-09-10 14:35:14'),
(3, '801', 1, NULL, '2020-09-10 14:34:25', '2020-09-10 14:35:30'),
(4, '901', 1, NULL, '2020-09-10 14:34:28', '2020-09-10 14:35:37'),
(5, '1001', 1, NULL, '2020-09-10 14:34:34', '2020-09-10 14:35:40'),
(6, '1101', 1, NULL, '2020-09-10 14:34:38', '2020-09-10 14:35:52'),
(7, '1101A', 1, NULL, '2020-09-10 14:34:41', '2020-09-10 14:35:56'),
(8, '1101B', 1, NULL, '2020-09-10 14:34:44', '2020-09-10 14:36:00'),
(9, '1101C', 1, NULL, '2020-09-10 14:34:49', '2020-09-10 14:36:04'),
(10, '1101D', 1, NULL, '2020-09-10 14:34:53', '2020-09-10 14:36:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `IdJornada` int(3) NOT NULL,
  `JorNombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`IdJornada`, `JorNombre`) VALUES
(1, 'Mañana\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `IdMateria` int(5) NOT NULL COMMENT 'Este sera el valor id para identificar la materia que dicta un profesor',
  `NomMat` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Este campo guardara las materias que esta dictando  un profesor ejemplo: SOCIALES',
  `Estado` tinyint(1) NOT NULL DEFAULT 1,
  `Ususesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Created` timestamp NULL DEFAULT current_timestamp(),
  `Update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`IdMateria`, `NomMat`, `Estado`, `Ususesion`, `Created`, `Update`) VALUES
(1, 'español', 1, NULL, '2020-09-10 15:09:18', '2020-09-10 15:09:49'),
(2, 'sociales', 1, NULL, '2020-09-10 15:09:21', '2020-09-10 15:09:56'),
(3, 'quimica', 1, NULL, '2020-09-10 15:09:24', '2020-09-10 15:10:02'),
(4, 'ingles', 1, NULL, '2020-09-10 15:09:28', '2020-09-10 15:10:04'),
(5, 'artes', 1, NULL, '2020-09-10 15:09:32', '2020-09-10 15:10:11'),
(6, 'tecnologia', 1, NULL, '2020-09-10 15:09:35', '2020-09-10 15:10:18'),
(7, 'Fisica', 1, NULL, '2020-09-11 17:17:46', '2020-09-11 17:17:46'),
(8, 'Biologia', 1, NULL, '2020-09-11 17:18:18', '2020-09-11 17:18:18'),
(9, 'Pensamiento', 1, NULL, '2020-09-11 23:11:47', '2020-09-11 23:11:47'),
(10, 'Calculo', 1, NULL, '2020-09-19 17:42:38', '2020-09-19 17:42:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `perId` int(11) NOT NULL COMMENT 'Nos muetsra el Id de la tabla persona',
  `perDocumento` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nos muestra el documento de la persona',
  `perNombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nos muestra el nombre de la persona',
  `perApellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nos muestra el apellido de la persona',
  `perEstado` tinyint(1) NOT NULL DEFAULT 1,
  `perUsuSesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `per_created_at` timestamp NULL DEFAULT current_timestamp(),
  `per_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_s_usuId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Esta tabla nos muestra los datos de la persona ';

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`perId`, `perDocumento`, `perNombre`, `perApellido`, `perEstado`, `perUsuSesion`, `per_created_at`, `per_updated_at`, `usuario_s_usuId`) VALUES
(1, '1000332279', 'Jeisson Alexander', 'Lopez Leal', 1, NULL, '2020-10-01 16:28:26', '2020-10-01 16:28:26', 1),
(2, '123456789', 'Henry', 'Garzon', 1, NULL, '2020-09-10 15:11:07', '2020-09-10 15:14:36', 2),
(3, '1234', 'Daniel', 'Mora', 1, NULL, '2020-09-10 15:11:52', '2020-09-10 15:14:49', 3),
(4, '6789', 'Marco', 'Hernandez', 1, NULL, '2020-09-10 15:12:03', '2020-09-10 15:15:04', 4),
(5, '123456', 'Martin', 'Doo', 1, NULL, '2020-09-10 15:12:52', '2020-09-10 15:15:18', 5),
(6, '123', 'PRUEBA', 'INVITADO', 1, NULL, '2020-09-10 15:13:10', '2020-09-10 15:15:31', 6),
(7, '1', 'Alex', 'leal', 1, NULL, '2020-09-10 15:13:22', '2020-09-10 15:16:03', 7),
(8, '12', 'Coordinador', 'Juanito', 1, NULL, '2020-09-11 00:43:46', '2020-09-11 00:43:46', 8),
(9, '12092020', 'feee', 'Supremo', 1, NULL, '2020-09-12 20:37:57', '2020-09-12 20:37:57', 9),
(10, '100', 'Alexander', 'lopez', 1, NULL, '2020-09-19 19:16:30', '2020-09-19 19:16:30', 10),
(11, '12345', 'Daniel', 'Torres', 1, NULL, '2020-09-19 19:31:16', '2020-09-19 19:31:16', 11),
(12, '12345678765432', 'ci', 'lopez', 1, NULL, '2020-10-01 14:29:18', '2020-10-01 14:29:18', 12),
(26, '98765432', 'Cristian', 'Leal', 1, NULL, '2020-10-03 21:34:43', '2020-10-03 21:34:43', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `IdProfesor` int(12) NOT NULL COMMENT 'Este campo es para guardar el numero de documento del profesor',
  `ProNombres` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Este campo es para guardar los nombres del vocero',
  `ProApellidos` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Este campo es para guardar los apellidos del profesor',
  `ProCorreo` varchar(55) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Este campo es para guardar el correo del profesor',
  `Estado` tinyint(1) NOT NULL DEFAULT 1,
  `Ususesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Created` timestamp NULL DEFAULT current_timestamp(),
  `Update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `materias_IdMateria` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`IdProfesor`, `ProNombres`, `ProApellidos`, `ProCorreo`, `Estado`, `Ususesion`, `Created`, `Update`, `materias_IdMateria`) VALUES
(2, 'William ', 'Moscoso', 'moscoso@gmail.com', 1, NULL, '2020-09-10 15:17:04', '2020-09-10 15:19:14', 2),
(3, 'Bibiana', 'villa', 'bibiana@gamil.com', 1, NULL, '2020-09-10 15:17:19', '2020-09-10 15:19:31', 3),
(4, 'Orlando', 'Romero', 'orlando@gmail.com', 1, NULL, '2020-09-10 15:17:26', '2020-09-10 15:19:45', 4),
(5, 'Luz', 'Marina', 'luz@gmail.com', 1, NULL, '2020-09-10 15:17:32', '2020-10-03 21:17:39', 3),
(78, 'Camilo', 'Ordoñez', 'ordonez@gmail.com', 1, NULL, '2020-10-01 21:54:37', '2020-10-01 21:54:37', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rolId` int(11) NOT NULL,
  `rolNombre` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `rolDescripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rolEstado` tinyint(1) NOT NULL DEFAULT 1,
  `rolUsuSesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rol_created_at` timestamp NULL DEFAULT current_timestamp(),
  `rol_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rolId`, `rolNombre`, `rolDescripcion`, `rolEstado`, `rolUsuSesion`, `rol_created_at`, `rol_updated_at`) VALUES
(1, 'Profesor', 'crud voceros y curso', 1, NULL, '2020-09-10 14:49:02', '2020-09-10 14:49:25'),
(2, 'Coordinador ', 'crud profesor y materia', 1, NULL, '2020-09-10 14:49:31', '2020-09-10 14:50:02'),
(3, 'Invitado', 'Rol definido por defecto', 1, NULL, '2020-09-10 14:50:07', '2020-09-10 14:50:26'),
(4, 'Desarrollador', 'Obtiene acceso a todo ', 1, NULL, '2020-09-10 14:50:41', '2020-09-10 14:50:50'),
(5, 'Rector', 'crud contacto y rol contacto', 1, NULL, '2020-09-10 14:50:56', '2020-09-10 14:51:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolcontacto`
--

CREATE TABLE `rolcontacto` (
  `Idrolcontacto` int(5) NOT NULL COMMENT 'Este sera el valor id para identificar el rol de un contacto',
  `Nomrol` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Este campo guardara los nombres de los roles que puede tener una colaborador: ejemplo vigilante',
  `Estado` tinyint(1) NOT NULL DEFAULT 1,
  `Ususesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Created` timestamp NULL DEFAULT current_timestamp(),
  `Update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rolcontacto`
--

INSERT INTO `rolcontacto` (`Idrolcontacto`, `Nomrol`, `Estado`, `Ususesion`, `Created`, `Update`) VALUES
(1, 'Vigilante', 1, NULL, '2020-09-10 15:02:05', '2020-09-10 15:02:05'),
(2, 'Secretario', 1, NULL, '2020-09-10 15:02:08', '2020-09-10 15:02:25'),
(3, 'Coordinador', 1, NULL, '2020-09-10 15:02:11', '2020-09-10 15:02:33'),
(4, 'profesor', 1, NULL, '2020-09-10 15:02:15', '2020-09-10 15:02:42'),
(5, 'Recreador', 1, NULL, '2020-09-10 15:02:18', '2020-09-10 15:02:48'),
(6, 'Orientador', 1, NULL, '2020-09-19 14:07:00', '2020-09-19 14:07:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_s`
--

CREATE TABLE `usuario_s` (
  `usuId` int(11) NOT NULL,
  `usuLogin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuPassword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuUsuSesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuEstado` tinyint(1) NOT NULL DEFAULT 1,
  `usuRemember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usu_created_at` timestamp NULL DEFAULT current_timestamp(),
  `usu_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario_s`
--

INSERT INTO `usuario_s` (`usuId`, `usuLogin`, `usuPassword`, `usuUsuSesion`, `usuEstado`, `usuRemember_token`, `usu_created_at`, `usu_updated_at`) VALUES
(1, 'metall23alexleal@gmail.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2020-10-01 16:27:36', '2020-10-01 16:27:39'),
(2, 'HAGS@si.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2020-09-10 14:43:58', '2020-09-10 14:44:10'),
(3, 'mora@gmail.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2020-09-10 14:44:29', '2020-09-10 14:44:33'),
(4, 'hernandez@gmail.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2020-09-10 14:44:36', '2020-09-10 14:44:57'),
(5, 'Rector@gmail.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2020-09-10 14:45:13', '2020-09-10 14:45:17'),
(6, 'invitadop@gmail.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2020-09-10 14:45:54', '2020-09-10 14:45:58'),
(7, 'metall23alexlealq@gmail.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2020-09-10 14:46:12', '2020-09-10 14:46:17'),
(8, 'Coordianadora@gmail.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2020-09-10 14:56:03', '2020-09-11 00:43:11'),
(9, 'sl@gmail.com', '493f4a7d25319dce3349f3f57df19241', NULL, 1, '', '2020-09-12 20:37:57', '2020-09-12 20:37:57'),
(10, 'jalopez9722@misena.edu.co', '493f4a7d25319dce3349f3f57df19241', NULL, 1, '', '2020-09-19 19:16:30', '2020-09-19 19:16:30'),
(11, 'torres@gmail.com', '493f4a7d25319dce3349f3f57df19241', NULL, 1, '', '2020-09-19 19:31:16', '2020-09-19 19:31:36'),
(12, 'miller@gmail.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2020-10-01 14:29:18', '2020-10-01 14:29:18'),
(26, 'Crisitian@gmail.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2020-10-03 21:34:43', '2020-10-03 21:34:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_s_roles`
--

CREATE TABLE `usuario_s_roles` (
  `id_usuario_s` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fechaUserRol` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `obsFechaUserRol` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuRolUsuSesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario_s_roles`
--

INSERT INTO `usuario_s_roles` (`id_usuario_s`, `id_rol`, `estado`, `fechaUserRol`, `obsFechaUserRol`, `usuRolUsuSesion`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2020-10-01 16:27:56', NULL, NULL, '2020-10-01 16:27:56', '2020-10-01 16:27:56'),
(2, 4, 1, '2020-09-10 15:20:24', NULL, NULL, '2020-09-10 15:20:24', '2020-09-10 15:20:24'),
(3, 3, 1, '2020-09-10 15:20:35', NULL, NULL, '2020-09-10 15:20:35', '2020-09-10 15:20:35'),
(4, 1, 1, '2020-09-10 15:20:41', NULL, NULL, '2020-09-10 15:20:41', '2020-09-10 15:20:41'),
(5, 5, 1, '2020-09-10 15:20:51', NULL, NULL, '2020-09-10 15:20:51', '2020-09-10 15:20:51'),
(6, 3, 1, '2020-09-10 15:20:58', NULL, NULL, '2020-09-10 15:20:58', '2020-09-10 15:20:58'),
(7, 3, 1, '2020-09-10 15:21:07', NULL, NULL, '2020-09-10 15:21:07', '2020-09-10 15:21:07'),
(8, 2, 1, '2020-09-11 00:43:57', NULL, NULL, '2020-09-10 14:56:04', '2020-09-11 00:43:57'),
(9, 3, 1, '2020-09-12 20:37:57', NULL, NULL, '2020-09-12 20:37:57', '2020-09-12 20:37:57'),
(10, 3, 1, '2020-09-19 19:16:30', NULL, NULL, '2020-09-19 19:16:30', '2020-09-19 19:16:30'),
(11, 4, 1, '2020-09-19 19:32:04', NULL, NULL, '2020-09-19 19:31:16', '2020-09-19 19:32:04'),
(12, 3, 1, '2020-10-01 14:29:18', NULL, NULL, '2020-10-01 14:29:18', '2020-10-01 14:29:18'),
(26, 3, 1, '2020-10-08 14:36:49', NULL, NULL, '2020-10-03 21:34:43', '2020-10-08 14:36:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voceros`
--

CREATE TABLE `voceros` (
  `IdVoceros` int(12) NOT NULL COMMENT 'Este campo es para guardar el numero de documento del vocero',
  `VocNombres` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Este campo es para guardar los nombres del vocero',
  `VocApellidos` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Este campo es para guardar los apellidos del vocero',
  `VocCorreo` varchar(55) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Este campo es para guardar el correo del vocero',
  `Estado` tinyint(1) NOT NULL DEFAULT 1,
  `Ususesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Created` timestamp NULL DEFAULT current_timestamp(),
  `Update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `curso_IdCurso` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `voceros`
--

INSERT INTO `voceros` (`IdVoceros`, `VocNombres`, `VocApellidos`, `VocCorreo`, `Estado`, `Ususesion`, `Created`, `Update`, `curso_IdCurso`) VALUES
(200, 'Valentina', 'Morales', 'morales@gmail.com', 1, NULL, '2020-10-01 20:32:50', '2020-10-11 18:58:08', 4),
(300, 'AQUI', 'CAMBIO', 'Cmabio@gmail.com', 1, NULL, '2020-09-17 00:13:35', '2020-10-13 22:17:45', 1),
(1300, 'Sofia', 'Pardo', 'Pardos@gmail.com', 1, NULL, '2020-09-10 14:37:01', '2020-10-13 14:13:22', 10),
(1400, 'Alexander', 'Lopez', 'lopez@gmail.com', 1, NULL, '2020-09-10 14:38:19', '2020-10-01 14:11:19', 4),
(1600, 'Daniela', 'Castañeda', 'Castañadeda@gmail.com', 0, NULL, '2020-10-01 21:01:12', '2020-10-09 01:07:48', 8),
(123454, 'Matias', 'Velandia', 'errores@gmail.com', 1, NULL, '2020-10-13 13:49:15', '2020-10-13 13:50:16', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`IdContacto`,`rolcontacto_Idrolcontacto`),
  ADD KEY `fk_contacto_rolcontacto1_idx` (`rolcontacto_Idrolcontacto`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`IdCurso`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`IdJornada`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`IdMateria`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`perId`,`usuario_s_usuId`),
  ADD UNIQUE KEY `uniq_documento` (`perDocumento`),
  ADD KEY `fk_persona_usuario_s1_idx` (`usuario_s_usuId`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`IdProfesor`,`materias_IdMateria`),
  ADD KEY `fk_profesor_materias1_idx` (`materias_IdMateria`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rolId`),
  ADD UNIQUE KEY `uniq_nombrerol` (`rolNombre`);

--
-- Indices de la tabla `rolcontacto`
--
ALTER TABLE `rolcontacto`
  ADD PRIMARY KEY (`Idrolcontacto`);

--
-- Indices de la tabla `usuario_s`
--
ALTER TABLE `usuario_s`
  ADD PRIMARY KEY (`usuId`),
  ADD UNIQUE KEY `uniq_login` (`usuLogin`);

--
-- Indices de la tabla `usuario_s_roles`
--
ALTER TABLE `usuario_s_roles`
  ADD PRIMARY KEY (`id_usuario_s`,`id_rol`),
  ADD KEY `usuario_s_roles_fk_rolidrol` (`id_rol`);

--
-- Indices de la tabla `voceros`
--
ALTER TABLE `voceros`
  ADD PRIMARY KEY (`IdVoceros`,`curso_IdCurso`),
  ADD KEY `fk_voceros_curso1_idx` (`curso_IdCurso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `IdCurso` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Este sera el valor id para identificar el curso de un vocero', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rolId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rolcontacto`
--
ALTER TABLE `rolcontacto`
  MODIFY `Idrolcontacto` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Este sera el valor id para identificar el rol de un contacto', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario_s`
--
ALTER TABLE `usuario_s`
  MODIFY `usuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_contacto_rolcontacto1` FOREIGN KEY (`rolcontacto_Idrolcontacto`) REFERENCES `rolcontacto` (`Idrolcontacto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_usuario_s1` FOREIGN KEY (`usuario_s_usuId`) REFERENCES `usuario_s` (`usuId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `fk_profesor_materias1` FOREIGN KEY (`materias_IdMateria`) REFERENCES `materias` (`IdMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_s_roles`
--
ALTER TABLE `usuario_s_roles`
  ADD CONSTRAINT `usuario_s_roles_fk_rolidrol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`rolId`),
  ADD CONSTRAINT `usuario_s_roles_fk_usuario_sid` FOREIGN KEY (`id_usuario_s`) REFERENCES `usuario_s` (`usuId`);

--
-- Filtros para la tabla `voceros`
--
ALTER TABLE `voceros`
  ADD CONSTRAINT `fk_voceros_curso1` FOREIGN KEY (`curso_IdCurso`) REFERENCES `curso` (`IdCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
