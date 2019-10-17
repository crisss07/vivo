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

 Date: 17/10/2019 16:15:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for solicitudes
-- ----------------------------
DROP TABLE IF EXISTS `solicitudes`;
CREATE TABLE `solicitudes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beneficiario_id` int(11) NULL DEFAULT NULL,
  `condominio_id` int(11) NOT NULL,
  `conyuge_id` int(11) NULL DEFAULT NULL,
  `papabeneficiario_id` int(11) NULL DEFAULT NULL,
  `mamabeneficiario_id` int(11) NULL DEFAULT NULL,
  `papaconyugue_id` int(11) NULL DEFAULT NULL,
  `mamaconyugue_id` int(11) NULL DEFAULT NULL,
  `ingreso_beneficiario` decimal(15, 0) NOT NULL DEFAULT 0,
  `ingreso_conyugue` decimal(15, 0) NOT NULL DEFAULT 0,
  `ipb` decimal(15, 0) NOT NULL DEFAULT 0,
  `imb` decimal(15, 0) NOT NULL DEFAULT 0,
  `ipc` decimal(15, 0) NOT NULL DEFAULT 0,
  `imc` decimal(15, 0) NOT NULL DEFAULT 0,
  `tpb` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmb` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tpc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `interes` decimal(3, 0) NOT NULL DEFAULT 0,
  `meses` int(4) NOT NULL DEFAULT 0,
  `monto` decimal(15, 0) NOT NULL,
  `fecha` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fec_creacion` datetime(0) NULL DEFAULT NULL,
  `fec_modificacion` datetime(0) NULL DEFAULT NULL,
  `fec_eliminacion` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
