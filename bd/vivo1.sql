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

 Date: 11/10/2019 12:43:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for beneficiario
-- ----------------------------
DROP TABLE IF EXISTS `beneficiario`;
CREATE TABLE `beneficiario`  (
  `persona_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '(PK) Llave primaria de la tabla:persona',
  `condominio_id` int(11) NOT NULL,
  `nombres` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre o nombres de la persona',
  `paterno` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido paterno de la persona',
  `materno` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido paterno de la persona',
  `ci` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Cedula de identidad de la persona',
  `fec_nacimiento` date NOT NULL COMMENT 'Fecha de nacimiento de la persona',
  `direccion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Direccion del domicilio de la persona',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Correo electronico de la persona',
  `telefono_celular` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Telefono celular de la persona',
  `activo` int(11) NOT NULL DEFAULT 1 COMMENT 'Estado del registro dentro la tabla:persona',
  `usu_creacion` int(11) NOT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fec_creacion` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fec_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fec_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`persona_id`) USING BTREE,
  INDEX `condominio_id`(`condominio_id`) USING BTREE,
  CONSTRAINT `beneficiario_ibfk_1` FOREIGN KEY (`condominio_id`) REFERENCES `condominio` (`condominio_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci COMMENT = 'Tabla:persona que guarda los datos de las personas involucradas con el sistema' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of beneficiario
-- ----------------------------
INSERT INTO `beneficiario` VALUES (2, 7, 'CRISTIAN RODRIGO', 'CHAMBY', 'SALINAS', '9112739', '0000-00-00', 'abc', 'rodri07crisss@gmail.com', '78784079', 1, 0, NULL, NULL, '2019-10-11 10:33:00', NULL, NULL);

-- ----------------------------
-- Table structure for condominio
-- ----------------------------
DROP TABLE IF EXISTS `condominio`;
CREATE TABLE `condominio`  (
  `condominio_id` int(255) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `valor` decimal(65, 2) NOT NULL,
  `usu_creacion` int(11) NOT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fec_creacion` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fec_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fec_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`condominio_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of condominio
-- ----------------------------
INSERT INTO `condominio` VALUES (1, 'WIPHALA\r\n', 243600.00, 0, NULL, NULL, '2019-10-11 09:56:54', NULL, NULL);
INSERT INTO `condominio` VALUES (2, 'BARTOLINA', 268772.00, 0, NULL, NULL, '2019-10-11 09:57:15', NULL, NULL);
INSERT INTO `condominio` VALUES (3, 'SANTA ANA', 313876.00, 0, NULL, NULL, '2019-10-11 09:57:28', NULL, NULL);
INSERT INTO `condominio` VALUES (4, 'P. FRANCISCO', 198932.00, 0, NULL, NULL, '2019-10-11 09:57:44', NULL, NULL);
INSERT INTO `condominio` VALUES (5, 'PIRWA', 186719.50, 0, NULL, NULL, '2019-10-11 09:57:57', NULL, NULL);
INSERT INTO `condominio` VALUES (6, 'PATUJU', 202016.00, 0, NULL, NULL, '2019-10-11 09:58:06', NULL, NULL);
INSERT INTO `condominio` VALUES (7, 'A. COTOCA', 203249.55, 0, NULL, NULL, '2019-10-11 09:58:21', NULL, NULL);
INSERT INTO `condominio` VALUES (8, 'PACHA', 255500.00, 0, NULL, NULL, '2019-10-11 09:58:32', NULL, NULL);
INSERT INTO `condominio` VALUES (9, 'TAMBORADA', 208800.00, 0, NULL, NULL, '2019-10-11 09:58:41', NULL, NULL);

-- ----------------------------
-- Table structure for credito
-- ----------------------------
DROP TABLE IF EXISTS `credito`;
CREATE TABLE `credito`  (
  `credito_id` int(11) NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) NOT NULL,
  `ingreso_mensual` decimal(65, 2) NOT NULL,
  `ingreso_conyugue` decimal(65, 2) NULL DEFAULT NULL,
  `pago_banco` decimal(65, 2) NULL DEFAULT NULL COMMENT 'el pago de otro prestamo en otra entidad financiera',
  `alquiler` decimal(65, 2) NULL DEFAULT NULL,
  `miembros` int(255) NULL DEFAULT NULL,
  `aporte` decimal(65, 2) NULL DEFAULT NULL,
  `casado` int(255) NOT NULL,
  `prestamo` decimal(65, 2) NULL DEFAULT NULL,
  `cuota_mensual` decimal(65, 2) NULL DEFAULT NULL,
  `usu_creacion` int(11) NOT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fec_creacion` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fec_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fec_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`credito_id`) USING BTREE,
  INDEX `persona_id`(`persona_id`) USING BTREE,
  CONSTRAINT `credito_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `beneficiario` (`persona_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for familiar
-- ----------------------------
DROP TABLE IF EXISTS `familiar`;
CREATE TABLE `familiar`  (
  `familiar_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '(PK) Llave primaria de la tabla:conyugue',
  `persona_id` int(11) NOT NULL COMMENT '(PK) Llave primaria de la tabla:persona',
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
  PRIMARY KEY (`familiar_id`) USING BTREE,
  INDEX `conyugue_ibfk_1`(`persona_id`) USING BTREE,
  CONSTRAINT `familiar_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `beneficiario` (`persona_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci COMMENT = 'Tabla:persona que guarda los datos de las personas involucradas con el sistema' ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
