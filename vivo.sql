/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : vivo

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 15/10/2019 08:48:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for beneficiario
-- ----------------------------
DROP TABLE IF EXISTS `beneficiario`;
CREATE TABLE `beneficiario`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '(PK) Llave primaria de la tabla:persona',
  `condominio_id` int(11) NOT NULL,
  `nombres` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre o nombres de la persona',
  `paterno` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido paterno de la persona',
  `materno` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido paterno de la persona',
  `ci` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Cedula de identidad de la persona',
  `fec_nacimiento` date NOT NULL COMMENT 'Fecha de nacimiento de la persona',
  `direccion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Direccion del domicilio de la persona',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Correo electronico de la persona',
  `telefono_celular` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Telefono celular de la persona',
  `departamento` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1 COMMENT 'Estado del registro dentro la tabla:persona',
  `usu_creacion` int(11) NOT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fec_creacion` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fec_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fec_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci COMMENT = 'Tabla:persona que guarda los datos de las personas involucradas con el sistema' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of beneficiario
-- ----------------------------
INSERT INTO `beneficiario` VALUES (1, 2, 'CRISTIAN RODRIGO', 'CHAMBY', 'SALINAS', '9112739', '1992-10-20', 'Av. Mariscal Santa Cruz N° 1092', 'rodri7crisss@hotmail.com', '78784079', 'La Paz', 1, 0, NULL, NULL, '2019-10-14 15:14:35', NULL, NULL);
INSERT INTO `beneficiario` VALUES (2, 1, 'PEDRO ARIEL', 'FERNANDEZ', 'ALI', '5991376', '1990-02-01', 'Avenida Vino Tinta N°123', 'ariel@gmail.com', '60681290', 'La Paz', 1, 0, NULL, NULL, '2019-10-14 15:16:01', NULL, NULL);
INSERT INTO `beneficiario` VALUES (3, 1, 'XIMENA STEFANIA', 'CORDERO', 'MAYDANA', '10913746', '1993-07-13', 'Av. Mariscal Santa Cruz N° 1092', 'cor@gmail.com', '78784079', 'La Paz', 1, 0, NULL, NULL, '2019-10-15 07:30:00', NULL, NULL);

-- ----------------------------
-- Table structure for condominio
-- ----------------------------
DROP TABLE IF EXISTS `condominio`;
CREATE TABLE `condominio`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `valor` decimal(65, 2) NOT NULL,
  `disponible` int(255) NOT NULL,
  `usu_creacion` int(11) NOT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fec_creacion` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fec_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fec_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  `superficie` decimal(65, 2) NULL DEFAULT NULL,
  `cuota_mensual` decimal(65, 2) NULL DEFAULT NULL,
  `sueldo_prom` decimal(65, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of condominio
-- ----------------------------
INSERT INTO `condominio` VALUES (1, 'WIPHALA', 'LA PAZ', 188579.00, 57, 0, NULL, NULL, '2019-10-11 09:56:54', NULL, NULL, 81.00, 1158.27, 2966.39);
INSERT INTO `condominio` VALUES (2, 'CONDOMINIO BARTOLINA BLOQUE I', 'COCHABAMBA', 230187.00, 8, 0, NULL, NULL, '2019-10-11 09:57:15', NULL, NULL, 83.00, 1413.83, 3620.90);
INSERT INTO `condominio` VALUES (4, 'URBANIZACIÓN PAPA FRANCISCO', 'SANTA CRUZ', 154942.00, 348, 0, NULL, NULL, '2019-10-11 09:57:44', NULL, NULL, 64.00, 951.67, 2437.28);
INSERT INTO `condominio` VALUES (10, 'CONDOMINIO BARTOLINA BLOQUE II', 'COCHABAMBA', 230187.00, 8, 0, NULL, NULL, '2019-10-14 09:09:27', NULL, NULL, 83.00, 1413.83, 3620.90);
INSERT INTO `condominio` VALUES (11, 'CONDOMINIO PACHA', 'LA PAZ', 220011.00, 7, 0, NULL, NULL, '2019-10-14 09:15:51', NULL, NULL, 80.00, 1351.33, 3460.83);
INSERT INTO `condominio` VALUES (16, 'ALTOS DE COTOCA', 'SANTA CRUZ', 149315.00, 680, 0, NULL, NULL, '2019-10-14 09:30:10', NULL, NULL, 91.00, 917.11, 2348.77);
INSERT INTO `condominio` VALUES (15, 'CONDOMINIO PATUJU', 'SANTA CRUZ', 202016.00, 90, 0, NULL, NULL, '2019-10-14 09:26:28', NULL, NULL, 93.00, 1240.80, 3177.76);

-- ----------------------------
-- Table structure for credencial
-- ----------------------------
DROP TABLE IF EXISTS `credencial`;
CREATE TABLE `credencial`  (
  `credencial_id` int(11) NOT NULL COMMENT '(PK) Llave primaria de la tabla:credencial',
  `persona_perfil_id` int(11) NOT NULL COMMENT '(FK) Llave foranea de la tabla:persona_perfil',
  `usuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre de usuario para acceder al sistema',
  `contrasenia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Contraseña para acceder al sistema',
  `activo` int(11) NOT NULL COMMENT 'Estado del registro dentro la tabla:credencial',
  `usu_creacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que creo el registro dentro la tabla:credencial',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:credencial',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:credencial',
  `fec_creacion` datetime(0) NOT NULL COMMENT 'Fecha que se creo el registro dentro la tabla:credencial',
  `fec_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:credencial',
  `fec_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:credencial',
  PRIMARY KEY (`credencial_id`) USING BTREE,
  INDEX `fk_credencial_persona_perfil`(`persona_perfil_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Tabla:persona_perfil que guarda la relacion entre las tablas persona y perfil' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of credencial
-- ----------------------------
INSERT INTO `credencial` VALUES (1, 1, 'adm', 'b09c600fddc573f117449b3723f23d64', 1, NULL, NULL, NULL, '2019-05-23 18:28:21', '2019-07-08 10:57:26', NULL);
INSERT INTO `credencial` VALUES (32, 28, 'daniel', '827ccb0eea8a706c4c34a16891f84e7b', 1, NULL, NULL, NULL, '2019-09-25 10:36:05', '2019-10-09 15:49:57', NULL);

-- ----------------------------
-- Table structure for credito
-- ----------------------------
DROP TABLE IF EXISTS `credito`;
CREATE TABLE `credito`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beneficiario_id` int(11) NOT NULL,
  `ingreso_mensual` decimal(65, 2) NOT NULL,
  `ingreso_conyugue` decimal(65, 2) NULL DEFAULT NULL,
  `deuda` tinyint(1) NOT NULL COMMENT '1:V 0:F en caso de tener una deuda con otro banco',
  `deuda_banco` decimal(65, 2) NULL DEFAULT NULL COMMENT 'el pago a la entidad financiera',
  `alquiler` tinyint(1) NOT NULL COMMENT '1:V 0:F',
  `pago_alquiler` decimal(65, 2) NULL DEFAULT NULL COMMENT 'pago del alquiler',
  `miembros` int(65) NULL DEFAULT NULL,
  `aporte` tinyint(1) NULL DEFAULT NULL COMMENT '1:V 0:F en caso de que el beneficiario tenga aporte',
  `aporte_beneficiario` decimal(65, 2) NULL DEFAULT NULL,
  `casado` tinyint(1) NOT NULL,
  `prestamo` decimal(65, 2) NULL DEFAULT NULL COMMENT 'prestamo disponible',
  `cuota_mensual` decimal(65, 2) NULL DEFAULT NULL,
  `usu_creacion` int(11) NOT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fec_creacion` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fec_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fec_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  `condominio_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of credito
-- ----------------------------
INSERT INTO `credito` VALUES (1, 3, 4000.00, 4000.00, 1, 2000.00, 0, 0.00, 5, 0, 0.00, 0, 0.00, 0.00, 0, NULL, NULL, '2019-10-15 08:39:22', NULL, NULL, 1);

-- ----------------------------
-- Table structure for familiar
-- ----------------------------
DROP TABLE IF EXISTS `familiar`;
CREATE TABLE `familiar`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '(PK) Llave primaria de la tabla:conyugue',
  `beneficiario_id` int(11) NOT NULL COMMENT '(PK) Llave primaria de la tabla:persona',
  `relacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre o nombres de la persona',
  `paterno` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido paterno de la persona',
  `materno` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido paterno de la persona',
  `ci` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Cedula de identidad de la persona',
  `fec_nacimiento` date NOT NULL COMMENT 'Fecha de nacimiento de la persona',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Correo electronico de la persona',
  `telefono_celular` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Telefono celular de la persona',
  `activo` int(11) NOT NULL DEFAULT 1 COMMENT 'Estado del registro dentro la tabla:persona',
  `usu_creacion` int(11) NOT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fec_creacion` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fec_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fec_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci COMMENT = 'Tabla:persona que guarda los datos de las personas involucradas con el sistema' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of familiar
-- ----------------------------
INSERT INTO `familiar` VALUES (1, 2, 'conyugue', 'CINTHIA ALIZON', 'RIVEROS', 'BALLON', '8441433', '1995-02-14', 'cin@gmail.com', '78965423', 1, 0, NULL, NULL, '2019-10-14 15:16:01', NULL, NULL);
INSERT INTO `familiar` VALUES (2, 3, 'conyugue', 'BRAYAN EDIL', 'CRUZ', 'INCA', '8444813', '1994-03-09', 'brayan@gmail.com', '70689654', 1, 0, NULL, NULL, '2019-10-15 07:30:00', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
