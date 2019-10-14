-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2019 a las 22:48:26
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vivo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

CREATE TABLE `beneficiario` (
  `id` int(11) NOT NULL COMMENT '(PK) Llave primaria de la tabla:persona',
  `condominio_id` int(11) NOT NULL,
  `nombres` varchar(150) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre o nombres de la persona',
  `paterno` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido paterno de la persona',
  `materno` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido paterno de la persona',
  `ci` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Cedula de identidad de la persona',
  `fec_nacimiento` date NOT NULL COMMENT 'Fecha de nacimiento de la persona',
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Direccion del domicilio de la persona',
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Correo electronico de la persona',
  `telefono_celular` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Telefono celular de la persona',
  `departamento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1' COMMENT 'Estado del registro dentro la tabla:persona',
  `usu_creacion` int(11) NOT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fec_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fec_modificacion` datetime DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fec_eliminacion` datetime DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla:persona que guarda los datos de las personas involucradas con el sistema' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `beneficiario`
--

INSERT INTO `beneficiario` (`id`, `condominio_id`, `nombres`, `paterno`, `materno`, `ci`, `fec_nacimiento`, `direccion`, `email`, `telefono_celular`, `departamento`, `activo`, `usu_creacion`, `usu_modificacion`, `usu_eliminacion`, `fec_creacion`, `fec_modificacion`, `fec_eliminacion`) VALUES
(2, 7, 'CRISTIAN RODRIGO', 'CHAMBY', 'SALINAS', '9112739', '0000-00-00', 'abc', 'rodri07crisss@gmail.com', '78784079', 'LA PAZ', 1, 0, NULL, NULL, '2019-10-11 10:33:00', NULL, NULL),
(6, 1, 'CRISTIAN RODRIGO', 'CHAMBY', 'SALINAS', '9112739', '1992-10-20', 'Calle a #5453', 'c@c.com', '99874561', 'La Paz', 1, 0, NULL, NULL, '2019-10-14 14:53:20', NULL, NULL),
(5, 1, 'CINTHIA ALIZON', 'RIVEROS', 'BALLON', '8441433', '1995-02-14', 'asdds', 'cr@crt.com', '98745631', 'La Paz', 1, 0, NULL, NULL, '2019-10-14 14:42:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condominio`
--

CREATE TABLE `condominio` (
  `id` int(255) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `valor` decimal(65,2) NOT NULL,
  `disponible` int(255) NOT NULL,
  `usu_creacion` int(11) NOT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fec_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fec_modificacion` datetime DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fec_eliminacion` datetime DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  `superficie` decimal(65,2) DEFAULT NULL,
  `cuota_mensual` decimal(65,2) DEFAULT NULL,
  `sueldo_prom` decimal(65,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `condominio`
--

INSERT INTO `condominio` (`id`, `descripcion`, `ciudad`, `valor`, `disponible`, `usu_creacion`, `usu_modificacion`, `usu_eliminacion`, `fec_creacion`, `fec_modificacion`, `fec_eliminacion`, `superficie`, `cuota_mensual`, `sueldo_prom`) VALUES
(1, 'WIPHALA', 'LA PAZ', '188579.00', 57, 0, NULL, NULL, '2019-10-11 09:56:54', NULL, NULL, '81.00', '1158.27', '2966.39'),
(2, 'CONDOMINIO BARTOLINA BLOQUE I', 'COCHABAMBA', '230187.00', 8, 0, NULL, NULL, '2019-10-11 09:57:15', NULL, NULL, '83.00', '1413.83', '3620.90'),
(4, 'URBANIZACIÓN PAPA FRANCISCO', 'SANTA CRUZ', '154942.00', 348, 0, NULL, NULL, '2019-10-11 09:57:44', NULL, NULL, '64.00', '951.67', '2437.28'),
(10, 'CONDOMINIO BARTOLINA BLOQUE II', 'COCHABAMBA', '230187.00', 8, 0, NULL, NULL, '2019-10-14 09:09:27', NULL, NULL, '83.00', '1413.83', '3620.90'),
(11, 'CONDOMINIO PACHA', 'LA PAZ', '220011.00', 7, 0, NULL, NULL, '2019-10-14 09:15:51', NULL, NULL, '80.00', '1351.33', '3460.83'),
(16, 'ALTOS DE COTOCA', 'SANTA CRUZ', '149315.00', 680, 0, NULL, NULL, '2019-10-14 09:30:10', NULL, NULL, '91.00', '917.11', '2348.77'),
(15, 'CONDOMINIO PATUJU', 'SANTA CRUZ', '202016.00', 90, 0, NULL, NULL, '2019-10-14 09:26:28', NULL, NULL, '93.00', '1240.80', '3177.76');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credencial`
--

CREATE TABLE `credencial` (
  `credencial_id` int(11) NOT NULL COMMENT '(PK) Llave primaria de la tabla:credencial',
  `persona_perfil_id` int(11) NOT NULL COMMENT '(FK) Llave foranea de la tabla:persona_perfil',
  `usuario` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre de usuario para acceder al sistema',
  `contrasenia` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Contraseña para acceder al sistema',
  `activo` int(11) NOT NULL COMMENT 'Estado del registro dentro la tabla:credencial',
  `usu_creacion` int(11) DEFAULT NULL COMMENT 'Usuario que creo el registro dentro la tabla:credencial',
  `usu_modificacion` int(11) DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:credencial',
  `usu_eliminacion` int(11) DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:credencial',
  `fec_creacion` datetime NOT NULL COMMENT 'Fecha que se creo el registro dentro la tabla:credencial',
  `fec_modificacion` datetime DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:credencial',
  `fec_eliminacion` datetime DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:credencial'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabla:persona_perfil que guarda la relacion entre las tablas persona y perfil' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `credencial`
--

INSERT INTO `credencial` (`credencial_id`, `persona_perfil_id`, `usuario`, `contrasenia`, `activo`, `usu_creacion`, `usu_modificacion`, `usu_eliminacion`, `fec_creacion`, `fec_modificacion`, `fec_eliminacion`) VALUES
(1, 1, 'adm', 'b09c600fddc573f117449b3723f23d64', 1, NULL, NULL, NULL, '2019-05-23 18:28:21', '2019-07-08 10:57:26', NULL),
(32, 28, 'daniel', '827ccb0eea8a706c4c34a16891f84e7b', 1, NULL, NULL, NULL, '2019-09-25 10:36:05', '2019-10-09 15:49:57', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito`
--

CREATE TABLE `credito` (
  `id` int(11) NOT NULL,
  `beneficiario_id` int(11) NOT NULL,
  `condominio_id` int(11) DEFAULT NULL,
  `ingreso_mensual` decimal(65,2) NOT NULL,
  `ingreso_conyugue` decimal(65,2) DEFAULT '0.00',
  `deuda` tinyint(1) NOT NULL COMMENT '1:V 0:F en caso de tener una deuda con otro banco',
  `deuda_banco` decimal(65,2) DEFAULT NULL COMMENT 'el pago a la entidad financiera',
  `alquiler` tinyint(1) NOT NULL COMMENT '1:V 0:F',
  `pago_alquiler` decimal(65,2) DEFAULT NULL COMMENT 'pago del alquiler',
  `miembros` int(65) DEFAULT NULL,
  `aporte` tinyint(1) DEFAULT NULL COMMENT '1:V 0:F en caso de que el beneficiario tenga aporte',
  `aporte_beneficiario` decimal(65,2) DEFAULT NULL,
  `casado` tinyint(1) NOT NULL,
  `prestamo` decimal(65,2) DEFAULT NULL COMMENT 'prestamo disponible',
  `cuota_mensual` decimal(65,2) DEFAULT NULL,
  `usu_creacion` int(11) NOT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fec_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fec_modificacion` datetime DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fec_eliminacion` datetime DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `credito`
--

INSERT INTO `credito` (`id`, `beneficiario_id`, `condominio_id`, `ingreso_mensual`, `ingreso_conyugue`, `deuda`, `deuda_banco`, `alquiler`, `pago_alquiler`, `miembros`, `aporte`, `aporte_beneficiario`, `casado`, `prestamo`, `cuota_mensual`, `usu_creacion`, `usu_modificacion`, `usu_eliminacion`, `fec_creacion`, `fec_modificacion`, `fec_eliminacion`) VALUES
(1, 2, NULL, '2500.00', '0.00', 0, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2019-10-12 10:01:32', NULL, NULL),
(5, 2, NULL, '1000.00', '1500.00', 1, '200.00', 0, '0.00', 2, 0, '0.00', 0, '0.00', '0.00', 0, NULL, NULL, '2019-10-14 14:54:51', NULL, NULL),
(3, 4, NULL, '2000.00', '2000.00', 1, '500.00', 0, '0.00', 3, 0, '0.00', 0, '0.00', '0.00', 0, NULL, NULL, '2019-10-14 14:39:58', NULL, NULL),
(4, 5, NULL, '1000.00', '1000.00', 0, '0.00', 0, '0.00', 6, 0, '0.00', 0, '0.00', '0.00', 0, NULL, NULL, '2019-10-14 14:43:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiar`
--

CREATE TABLE `familiar` (
  `id` int(11) NOT NULL COMMENT '(PK) Llave primaria de la tabla:conyugue',
  `beneficiario_id` int(11) NOT NULL COMMENT '(PK) Llave primaria de la tabla:persona',
  `relacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(150) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre o nombres de la persona',
  `paterno` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido paterno de la persona',
  `materno` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido paterno de la persona',
  `ci` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Cedula de identidad de la persona',
  `fec_nacimiento` date NOT NULL COMMENT 'Fecha de nacimiento de la persona',
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Correo electronico de la persona',
  `telefono_celular` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Telefono celular de la persona',
  `activo` int(11) NOT NULL DEFAULT '1' COMMENT 'Estado del registro dentro la tabla:persona',
  `usu_creacion` int(11) NOT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fec_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fec_modificacion` datetime DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fec_eliminacion` datetime DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla:persona que guarda los datos de las personas involucradas con el sistema' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `familiar`
--

INSERT INTO `familiar` (`id`, `beneficiario_id`, `relacion`, `nombres`, `paterno`, `materno`, `ci`, `fec_nacimiento`, `email`, `telefono_celular`, `activo`, `usu_creacion`, `usu_modificacion`, `usu_eliminacion`, `fec_creacion`, `fec_modificacion`, `fec_eliminacion`) VALUES
(4, 2, 'conyugue', 'XIMENA STEFANIA', 'CORDERO', 'MAYDANA', '10913746', '1993-07-13', 'a@a.com', '78965412', 1, 0, NULL, NULL, '2019-10-14 14:53:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `beneficiario_id` int(11) DEFAULT NULL,
  `condominio_id` int(11) NOT NULL,
  `conyuge_id` int(11) DEFAULT NULL,
  `papabeneficiario_id` int(11) DEFAULT NULL,
  `mamabeneficiario_id` int(11) DEFAULT NULL,
  `papaconyugue_id` int(11) DEFAULT NULL,
  `mamaconyugue_id` int(11) DEFAULT NULL,
  `ingreso_beneficiario` decimal(15,0) NOT NULL DEFAULT '0',
  `ingreso_conyugue` decimal(15,0) NOT NULL DEFAULT '0',
  `ipb` decimal(15,0) NOT NULL DEFAULT '0',
  `imb` decimal(15,0) NOT NULL DEFAULT '0',
  `ipc` decimal(15,0) NOT NULL DEFAULT '0',
  `imc` decimal(15,0) NOT NULL DEFAULT '0',
  `interes` decimal(3,0) NOT NULL DEFAULT '0',
  `meses` int(4) NOT NULL DEFAULT '0',
  `monto` decimal(15,0) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fec_creacion` datetime DEFAULT NULL,
  `fec_modificacion` datetime DEFAULT NULL,
  `fec_eliminacion` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `condominio`
--
ALTER TABLE `condominio`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `credencial`
--
ALTER TABLE `credencial`
  ADD PRIMARY KEY (`credencial_id`) USING BTREE,
  ADD KEY `fk_credencial_persona_perfil` (`persona_perfil_id`) USING BTREE;

--
-- Indices de la tabla `credito`
--
ALTER TABLE `credito`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `familiar`
--
ALTER TABLE `familiar`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '(PK) Llave primaria de la tabla:persona', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `condominio`
--
ALTER TABLE `condominio`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `credito`
--
ALTER TABLE `credito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `familiar`
--
ALTER TABLE `familiar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '(PK) Llave primaria de la tabla:conyugue', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
