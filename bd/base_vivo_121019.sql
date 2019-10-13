-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2019 at 12:46 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vivo`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficiario`
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
-- Dumping data for table `beneficiario`
--

INSERT INTO `beneficiario` (`id`, `condominio_id`, `nombres`, `paterno`, `materno`, `ci`, `fec_nacimiento`, `direccion`, `email`, `telefono_celular`, `departamento`, `activo`, `usu_creacion`, `usu_modificacion`, `usu_eliminacion`, `fec_creacion`, `fec_modificacion`, `fec_eliminacion`) VALUES
(2, 7, 'CRISTIAN RODRIGO', 'CHAMBY', 'SALINAS', '9112739', '0000-00-00', 'abc', 'rodri07crisss@gmail.com', '78784079', 'LA PAZ', 1, 0, NULL, NULL, '2019-10-11 10:33:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `condominio`
--

CREATE TABLE `condominio` (
  `id` int(255) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `valor` decimal(65,2) NOT NULL,
  `usu_creacion` int(11) NOT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fec_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fec_modificacion` datetime DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fec_eliminacion` datetime DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `condominio`
--

INSERT INTO `condominio` (`id`, `descripcion`, `valor`, `usu_creacion`, `usu_modificacion`, `usu_eliminacion`, `fec_creacion`, `fec_modificacion`, `fec_eliminacion`) VALUES
(1, 'WIPHALA\r\n', '243600.00', 0, NULL, NULL, '2019-10-11 09:56:54', NULL, NULL),
(2, 'BARTOLINA', '268772.00', 0, NULL, NULL, '2019-10-11 09:57:15', NULL, NULL),
(3, 'SANTA ANA', '313876.00', 0, NULL, NULL, '2019-10-11 09:57:28', NULL, NULL),
(4, 'P. FRANCISCO', '198932.00', 0, NULL, NULL, '2019-10-11 09:57:44', NULL, NULL),
(5, 'PIRWA', '186719.50', 0, NULL, NULL, '2019-10-11 09:57:57', NULL, NULL),
(6, 'PATUJU', '202016.00', 0, NULL, NULL, '2019-10-11 09:58:06', NULL, NULL),
(7, 'A. COTOCA', '203249.55', 0, NULL, NULL, '2019-10-11 09:58:21', NULL, NULL),
(8, 'PACHA', '255500.00', 0, NULL, NULL, '2019-10-11 09:58:32', NULL, NULL),
(9, 'TAMBORADA', '208800.00', 0, NULL, NULL, '2019-10-11 09:58:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `credito`
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
-- Dumping data for table `credito`
--

INSERT INTO `credito` (`id`, `beneficiario_id`, `condominio_id`, `ingreso_mensual`, `ingreso_conyugue`, `deuda`, `deuda_banco`, `alquiler`, `pago_alquiler`, `miembros`, `aporte`, `aporte_beneficiario`, `casado`, `prestamo`, `cuota_mensual`, `usu_creacion`, `usu_modificacion`, `usu_eliminacion`, `fec_creacion`, `fec_modificacion`, `fec_eliminacion`) VALUES
(1, 2, NULL, '4500.00', '0.00', 0, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2019-10-12 10:01:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `familiar`
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

-- --------------------------------------------------------

--
-- Table structure for table `solicitudes`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `condominio`
--
ALTER TABLE `condominio`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `credito`
--
ALTER TABLE `credito`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `familiar`
--
ALTER TABLE `familiar`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beneficiario`
--
ALTER TABLE `beneficiario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '(PK) Llave primaria de la tabla:persona', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `condominio`
--
ALTER TABLE `condominio`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `credito`
--
ALTER TABLE `credito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `familiar`
--
ALTER TABLE `familiar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '(PK) Llave primaria de la tabla:conyugue';

--
-- AUTO_INCREMENT for table `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
