/*
 Navicat Premium Data Transfer

 Source Server         : cultura4.1
 Source Server Type    : MySQL
 Source Server Version : 40121
 Source Host           : 192.168.32.199:3308
 Source Schema         : cultura

 Target Server Type    : MySQL
 Target Server Version : 40121
 File Encoding         : 65001

 Date: 07/09/2023 14:13:11
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for baja
-- ----------------------------
DROP TABLE IF EXISTS `baja`;
CREATE TABLE `baja`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Bajas',
  `tipo_baja_id` int(11) NULL DEFAULT 0 COMMENT 'tipo baja',
  `numero_tipo_baja` int(11) NULL DEFAULT NULL COMMENT 'Numero de Resolucion/expediente, etc de la baja del bien',
  `anio_tipo_baja` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Fecha baja del bien',
  `motivo_baja` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Motivo de la baja del bien',
  `entidad_externa_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Entidad externa',
  `sf_guard_user_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Usuario',
  `borrado` tinyint(4) NULL DEFAULT 0 COMMENT 'Indica si el registro esta borrado',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha baja del bien',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `baja_FI_1` USING BTREE(`tipo_baja_id`),
  INDEX `baja_FI_2` USING BTREE(`entidad_externa_id`),
  INDEX `baja_FI_3` USING BTREE(`sf_guard_user_id`),
  CONSTRAINT `baja_FK_1` FOREIGN KEY (`tipo_baja_id`) REFERENCES `tipo_baja` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `baja_FK_2` FOREIGN KEY (`entidad_externa_id`) REFERENCES `entidad_externa` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `baja_FK_3` FOREIGN KEY (`sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Bajas del Patrimonio; InnoDB free: 10240 kB; (`tipo_baja_id`) REFER `cultura/tipo_baja`(`id`); (`entidad_externa_id`) REFER `cultura/entidad_externa`(`id`); (`sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of baja
-- ----------------------------

-- ----------------------------
-- Table structure for contenido
-- ----------------------------
DROP TABLE IF EXISTS `contenido`;
CREATE TABLE `contenido`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id datos',
  `menu` int(11) NOT NULL DEFAULT 0 COMMENT 'Id Menu',
  `titulo` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Titulo',
  `contenido` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Contenido de la pagina | enlace',
  `visible` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Visible',
  `borrado` tinyint(4) NULL DEFAULT 0 COMMENT 'Indica si el registro esta borrado',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha Ãºltima modificaciÃ³n',
  PRIMARY KEY USING BTREE (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Datos' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contenido
-- ----------------------------

-- ----------------------------
-- Table structure for dependencia
-- ----------------------------
DROP TABLE IF EXISTS `dependencia`;
CREATE TABLE `dependencia`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Dependencia Id',
  `parent_id` int(11) NULL DEFAULT 0 COMMENT 'Id Dependencia.',
  `nombre_dependencia` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Dependencia',
  `calle` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Calle de la dependencia',
  `numero` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'NÃºmero calle de la dependencia',
  `piso` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Piso',
  `departamento` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Departamento',
  `codigo_postal` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'CÃ³digo Postal',
  `localidad` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Localidad',
  `telefono` varchar(22) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'TelÃ©fono',
  `provincia_id` int(11) NULL DEFAULT 0 COMMENT 'Provincia',
  `sf_guard_user_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Usuario',
  `borrado` tinyint(4) NULL DEFAULT 0 COMMENT 'Indica si el registro esta borrado',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha Ãºltima modificaciÃ³n',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `dependencia_FI_1` USING BTREE(`parent_id`),
  INDEX `dependencia_FI_2` USING BTREE(`provincia_id`),
  INDEX `dependencia_FI_3` USING BTREE(`sf_guard_user_id`),
  CONSTRAINT `dependencia_FK_1` FOREIGN KEY (`parent_id`) REFERENCES `dependencia` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `dependencia_FK_2` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `dependencia_FK_3` FOREIGN KEY (`sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Dependencias; InnoDB free: 10240 kB; (`parent_id`) REFER `cultura/dependencia`(`id`); (`provincia_id`) REFER `cultura/provincia`(`id`); (`sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dependencia
-- ----------------------------

-- ----------------------------
-- Table structure for direccion
-- ----------------------------
DROP TABLE IF EXISTS `direccion`;
CREATE TABLE `direccion`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'DirecciÃ³n Id',
  `calle` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Calle de la dependencia',
  `numero` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'NÃºmero calle de la dependencia',
  `piso` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Piso',
  `departamento` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Departamento',
  `codigo_postal` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'CÃ³digo Postal',
  `localidad` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Localidad',
  `telefono` varchar(22) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'TelÃ©fono',
  `provincia_id` int(11) NULL DEFAULT 0 COMMENT 'Provincia',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha Ãºltima modificaciÃ³n',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `direccion_FI_1` USING BTREE(`provincia_id`),
  CONSTRAINT `direccion_FK_1` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'DirecciÃ³n/Domicilio; InnoDB free: 10240 kB; (`provincia_id`) REFER `cultura/provincia`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of direccion
-- ----------------------------

-- ----------------------------
-- Table structure for entidad_externa
-- ----------------------------
DROP TABLE IF EXISTS `entidad_externa`;
CREATE TABLE `entidad_externa`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Entidades sin fines de lucro',
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha baja del bien',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha Ãºltima modificaciÃ³n',
  PRIMARY KEY USING BTREE (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Entidades sin fines de lucro o externas' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of entidad_externa
-- ----------------------------

-- ----------------------------
-- Table structure for estado_relevamiento
-- ----------------------------
DROP TABLE IF EXISTS `estado_relevamiento`;
CREATE TABLE `estado_relevamiento`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Estado de relevamiento',
  `inicio_tramite_sf_guard_user_id` int(11) NULL DEFAULT NULL COMMENT 'Id de usuario',
  `fin_tramite_sf_guard_user_id` int(11) NULL DEFAULT NULL COMMENT 'Id de usuario',
  `conformado` tinyint(4) NULL DEFAULT 1 COMMENT 'Transferencia en trÃ¡mite?',
  `observaciones` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Observaciones del relevamiento',
  `responsable_id` int(11) NULL DEFAULT NULL COMMENT 'Id del Responsable',
  `remito_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Id remito',
  `firmante_id` int(11) NULL DEFAULT NULL COMMENT 'Id del Firmante',
  `borrado` tinyint(4) NULL DEFAULT 0 COMMENT 'Indica si el registro esta borrado',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha inicio de la relevamiento del bien',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha de la relevamiento del bien',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `estado_relevamiento_FI_1` USING BTREE(`inicio_tramite_sf_guard_user_id`),
  INDEX `estado_relevamiento_FI_2` USING BTREE(`fin_tramite_sf_guard_user_id`),
  INDEX `estado_relevamiento_FI_3` USING BTREE(`responsable_id`),
  INDEX `estado_relevamiento_FI_4` USING BTREE(`remito_id`),
  INDEX `estado_relevamiento_FI_5` USING BTREE(`firmante_id`),
  CONSTRAINT `estado_relevamiento_FK_1` FOREIGN KEY (`inicio_tramite_sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estado_relevamiento_FK_2` FOREIGN KEY (`fin_tramite_sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estado_relevamiento_FK_3` FOREIGN KEY (`responsable_id`) REFERENCES `responsable` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estado_relevamiento_FK_4` FOREIGN KEY (`remito_id`) REFERENCES `remito` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estado_relevamiento_FK_5` FOREIGN KEY (`firmante_id`) REFERENCES `responsable` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Estado de relevamiento; InnoDB free: 10240 kB; (`inicio_tramite_sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`); (`fin_tramite_sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`); (`responsable_id`) REFER `cultura/responsable`(`id`); (`remito_id`) REFER `cultura/remito`(`id`); (`firmante_id`) REFER `cultura/responsable`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estado_relevamiento
-- ----------------------------

-- ----------------------------
-- Table structure for estado_transferencia
-- ----------------------------
DROP TABLE IF EXISTS `estado_transferencia`;
CREATE TABLE `estado_transferencia`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Estado de transferencia',
  `inicio_tramite_sf_guard_user_id` int(11) NULL DEFAULT NULL COMMENT 'Id de usuario',
  `fin_tramite_sf_guard_user_id` int(11) NULL DEFAULT NULL COMMENT 'Id de usuario',
  `en_tramite` tinyint(4) NULL DEFAULT 1 COMMENT 'Transferencia en trÃ¡mite?',
  `remito_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Id remito',
  `descripcion_transferencia` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'DescripciÃ³n de la transferencia',
  `responsable_id` int(11) NULL DEFAULT NULL COMMENT 'Id del Responsable',
  `firmante_id` int(11) NULL DEFAULT NULL COMMENT 'Id del Firmante',
  `borrado` tinyint(4) NULL DEFAULT 0 COMMENT 'Indica si el registro esta borrado',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha inicio de la transferencia del bien',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha de la transferencia del bien',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `estado_transferencia_FI_1` USING BTREE(`inicio_tramite_sf_guard_user_id`),
  INDEX `estado_transferencia_FI_2` USING BTREE(`fin_tramite_sf_guard_user_id`),
  INDEX `estado_transferencia_FI_3` USING BTREE(`remito_id`),
  INDEX `estado_transferencia_FI_4` USING BTREE(`responsable_id`),
  INDEX `estado_transferencia_FI_5` USING BTREE(`firmante_id`),
  CONSTRAINT `estado_transferencia_FK_1` FOREIGN KEY (`inicio_tramite_sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estado_transferencia_FK_2` FOREIGN KEY (`fin_tramite_sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estado_transferencia_FK_3` FOREIGN KEY (`remito_id`) REFERENCES `remito` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estado_transferencia_FK_4` FOREIGN KEY (`responsable_id`) REFERENCES `responsable` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estado_transferencia_FK_5` FOREIGN KEY (`firmante_id`) REFERENCES `responsable` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Estado de transferencia; InnoDB free: 10240 kB; (`inicio_tramite_sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`); (`fin_tramite_sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`); (`remito_id`) REFER `cultura/remito`(`id`); (`responsable_id`) REFER `cultura/responsable`(`id`); (`firmante_id`) REFER `cultura/responsable`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estado_transferencia
-- ----------------------------

-- ----------------------------
-- Table structure for historico
-- ----------------------------
DROP TABLE IF EXISTS `historico`;
CREATE TABLE `historico`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id histÃ³rico dependencia',
  `patrimonio_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Id Patrimonio',
  `dependencia_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Id Dependencia',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `historico_FI_1` USING BTREE(`patrimonio_id`),
  INDEX `historico_FI_2` USING BTREE(`dependencia_id`),
  CONSTRAINT `historico_FK_1` FOREIGN KEY (`patrimonio_id`) REFERENCES `patrimonio` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `historico_FK_2` FOREIGN KEY (`dependencia_id`) REFERENCES `dependencia` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'HistÃ³rico de Patrimonio; InnoDB free: 10240 kB; (`patrimonio_id`) REFER `cultura/patrimonio`(`id`); (`dependencia_id`) REFER `cultura/dependencia`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of historico
-- ----------------------------

-- ----------------------------
-- Table structure for patrimonio
-- ----------------------------
DROP TABLE IF EXISTS `patrimonio`;
CREATE TABLE `patrimonio`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Patrimonio',
  `saf` smallint(6) NOT NULL DEFAULT 337 COMMENT 'Sucursal NaciÃ³n',
  `nro_inventario` int(11) NULL DEFAULT NULL COMMENT 'NÃºmero de inventario',
  `dependencia_id` int(11) NULL DEFAULT 0 COMMENT 'Dependencia',
  `tipo_bien_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Tipo de bien',
  `proveedor_id` int(11) NULL DEFAULT 0 COMMENT 'Proveedor',
  `tipo_ingreso_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Tipo de Ingreso',
  `universo_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Universo',
  `orden_compra` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Orden de compra',
  `fecha_orden` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha orden compra',
  `nro_expediente` varchar(53) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'NÃºmero de expediente',
  `nro_factura` varchar(101) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'NÃºmero de factura',
  `fecha_factura` datetime NULL DEFAULT NULL COMMENT 'Fecha factura',
  `importe` double NULL DEFAULT 1 COMMENT 'Importe/valor del bien',
  `nro_serie` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'NÃºmero de serie',
  `descripcion_patrimonio` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'DescripciÃ³n',
  `nombre_image` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Nonmbre de la imagen del Bien',
  `descripcion_estado` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'DescripciÃ³n Estado',
  `baja_id` int(11) NULL DEFAULT NULL COMMENT 'Bien dado de baja',
  `sf_guard_user_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Usuario',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha Alta',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha Ãºltima modificaciÃ³n',
  `borrado` tinyint(4) NULL DEFAULT 0 COMMENT 'Indica si el registro esta borrado',
  PRIMARY KEY USING BTREE (`id`),
  UNIQUE INDEX `patrimonio_U_1` USING BTREE(`nro_inventario`),
  INDEX `patrimonio_FI_1` USING BTREE(`dependencia_id`),
  INDEX `patrimonio_FI_2` USING BTREE(`tipo_bien_id`),
  INDEX `patrimonio_FI_3` USING BTREE(`proveedor_id`),
  INDEX `patrimonio_FI_4` USING BTREE(`tipo_ingreso_id`),
  INDEX `patrimonio_FI_5` USING BTREE(`universo_id`),
  INDEX `patrimonio_FI_6` USING BTREE(`baja_id`),
  INDEX `patrimonio_FI_7` USING BTREE(`sf_guard_user_id`),
  CONSTRAINT `patrimonio_FK_1` FOREIGN KEY (`dependencia_id`) REFERENCES `dependencia` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `patrimonio_FK_2` FOREIGN KEY (`tipo_bien_id`) REFERENCES `tipo_bien` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `patrimonio_FK_3` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `patrimonio_FK_4` FOREIGN KEY (`tipo_ingreso_id`) REFERENCES `tipo_ingreso` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `patrimonio_FK_5` FOREIGN KEY (`universo_id`) REFERENCES `universo` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `patrimonio_FK_6` FOREIGN KEY (`baja_id`) REFERENCES `baja` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `patrimonio_FK_7` FOREIGN KEY (`sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Patrimonio; InnoDB free: 10240 kB; (`dependencia_id`) REFER `cultura/dependencia`(`id`); (`tipo_bien_id`) REFER `cultura/tipo_bien`(`id`); (`proveedor_id`) REFER `cultura/proveedor`(`id`); (`tipo_ingreso_id`) REFER `cultura/tipo_ingreso`(`id`); (`universo_id`) REFER `cultura/universo`(`id`); (`baja_id`) REFER `cultura/baja`(`id`); (`sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of patrimonio
-- ----------------------------

-- ----------------------------
-- Table structure for proveedor
-- ----------------------------
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Proveedor',
  `nombre_proveedor` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Proveedor',
  `descripcion_proveedor` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'DescripciÃ³n',
  `calle` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Calle de la dependencia',
  `numero` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'NÃºmero calle de la dependencia',
  `piso` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Piso',
  `departamento` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Departamento',
  `codigo_postal` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'CÃ³digo Postal',
  `localidad` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Localidad',
  `telefono` varchar(22) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'TelÃ©fono',
  `provincia_id` int(11) NULL DEFAULT 0 COMMENT 'Provincia',
  `sf_guard_user_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Usuario',
  `borrado` tinyint(4) NULL DEFAULT 0 COMMENT 'Indica si el registro esta borrado',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha Alta',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha Ãºltima modificaciÃ³n',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `proveedor_FI_1` USING BTREE(`provincia_id`),
  INDEX `proveedor_FI_2` USING BTREE(`sf_guard_user_id`),
  CONSTRAINT `proveedor_FK_1` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `proveedor_FK_2` FOREIGN KEY (`sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Proveedor; InnoDB free: 10240 kB; (`provincia_id`) REFER `cultura/provincia`(`id`); (`sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of proveedor
-- ----------------------------

-- ----------------------------
-- Table structure for provincia
-- ----------------------------
DROP TABLE IF EXISTS `provincia`;
CREATE TABLE `provincia`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Provincia Id',
  `nombre_provincia` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Provincias',
  `inicial_provincia` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Inicial Provincia',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha Ãºltima modificaciÃ³n',
  PRIMARY KEY USING BTREE (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Provincias' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of provincia
-- ----------------------------

-- ----------------------------
-- Table structure for remito
-- ----------------------------
DROP TABLE IF EXISTS `remito`;
CREATE TABLE `remito`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id remitos',
  `tipo_remito_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Id Tipo de remito',
  `nro_remito` int(11) NULL DEFAULT NULL COMMENT 'NÃºmero de remito',
  `anio_remito` int(11) NULL DEFAULT NULL COMMENT 'AÃ±o del remito',
  `inicio_tramite_sf_guard_user_id` int(11) NULL DEFAULT NULL COMMENT 'Id de usuario',
  `fin_tramite_sf_guard_user_id` int(11) NULL DEFAULT NULL COMMENT 'Id de usuario',
  `en_tramite` tinyint(4) NULL DEFAULT 1 COMMENT 'Transferencia en trÃ¡mite?',
  `borrado` tinyint(4) NULL DEFAULT 0 COMMENT 'Indica si el registro esta borrado',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `remito_FI_1` USING BTREE(`tipo_remito_id`),
  INDEX `remito_FI_2` USING BTREE(`inicio_tramite_sf_guard_user_id`),
  INDEX `remito_FI_3` USING BTREE(`fin_tramite_sf_guard_user_id`),
  CONSTRAINT `remito_FK_1` FOREIGN KEY (`tipo_remito_id`) REFERENCES `tipo_remito` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `remito_FK_2` FOREIGN KEY (`inicio_tramite_sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `remito_FK_3` FOREIGN KEY (`fin_tramite_sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Remitos de Impresiones; InnoDB free: 10240 kB; (`tipo_remito_id`) REFER `cultura/tipo_remito`(`id`); (`inicio_tramite_sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`); (`fin_tramite_sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of remito
-- ----------------------------

-- ----------------------------
-- Table structure for remito_patrimonio
-- ----------------------------
DROP TABLE IF EXISTS `remito_patrimonio`;
CREATE TABLE `remito_patrimonio`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Id Remito-Patrimonio',
  `patrimonio_id` int(11) NULL DEFAULT NULL COMMENT 'Id del patrimonio',
  `remito_id` int(11) NULL DEFAULT NULL COMMENT 'Id del Remito',
  `borrado` tinyint(4) NULL DEFAULT 0 COMMENT 'Indica si el registro esta borrado',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha alta',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha de traspaso del patrimonio',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `remito_patrimonio_FI_1` USING BTREE(`patrimonio_id`),
  INDEX `remito_patrimonio_FI_2` USING BTREE(`remito_id`),
  CONSTRAINT `remito_patrimonio_FK_1` FOREIGN KEY (`patrimonio_id`) REFERENCES `patrimonio` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `remito_patrimonio_FK_2` FOREIGN KEY (`remito_id`) REFERENCES `remito` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Remito-Patrimonio; InnoDB free: 10240 kB; (`patrimonio_id`) REFER `cultura/patrimonio`(`id`); (`remito_id`) REFER `cultura/remito`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of remito_patrimonio
-- ----------------------------

-- ----------------------------
-- Table structure for responsable
-- ----------------------------
DROP TABLE IF EXISTS `responsable`;
CREATE TABLE `responsable`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Responsable',
  `dependencia_id` int(11) NULL DEFAULT 0 COMMENT 'Dependencia',
  `tipo_responsable_id` int(11) NULL DEFAULT 0 COMMENT 'Id Tipo responsable',
  `nombre` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Nombres',
  `apellido` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Apellidos',
  `dni` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'D.N.I.',
  `mail` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'E-Mail',
  `tipo_asignacion_id` int(11) NULL DEFAULT 0 COMMENT 'AsignaciÃ³n por decreto/resoluciÃ³n/etc.',
  `nro_asignacion` int(11) NULL DEFAULT 0 COMMENT 'NÃºmero de decreto/resoluciÃ³n/etc.',
  `anio_asignacion` int(11) NULL DEFAULT 0 COMMENT 'AÃ±o de decreto/resoluciÃ³n/etc.',
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'DescripciÃ³n',
  `sf_guard_user_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Usuario',
  `borrado` tinyint(4) NULL DEFAULT 0 COMMENT 'Indica si el registro esta borrado',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha Alta',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha Ãºltima modificaciÃ³n',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `responsable_FI_1` USING BTREE(`dependencia_id`),
  INDEX `responsable_FI_2` USING BTREE(`tipo_responsable_id`),
  INDEX `responsable_FI_3` USING BTREE(`tipo_asignacion_id`),
  INDEX `responsable_FI_4` USING BTREE(`sf_guard_user_id`),
  CONSTRAINT `responsable_FK_1` FOREIGN KEY (`dependencia_id`) REFERENCES `dependencia` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `responsable_FK_2` FOREIGN KEY (`tipo_responsable_id`) REFERENCES `tipo_responsable` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `responsable_FK_3` FOREIGN KEY (`tipo_asignacion_id`) REFERENCES `tipo_asignacion` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `responsable_FK_4` FOREIGN KEY (`sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Responsable; InnoDB free: 10240 kB; (`dependencia_id`) REFER `cultura/dependencia`(`id`); (`tipo_responsable_id`) REFER `cultura/tipo_responsable`(`id`); (`tipo_asignacion_id`) REFER `cultura/tipo_asignacion`(`id`); (`sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of responsable
-- ----------------------------

-- ----------------------------
-- Table structure for sf_guard_group
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_group`;
CREATE TABLE `sf_guard_group`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY USING BTREE (`id`),
  UNIQUE INDEX `sf_guard_group_U_1` USING BTREE(`name`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sf_guard_group
-- ----------------------------

-- ----------------------------
-- Table structure for sf_guard_group_permission
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_group_permission`;
CREATE TABLE `sf_guard_group_permission`  (
  `group_id` int(11) NOT NULL DEFAULT 0,
  `permission_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY USING BTREE (`group_id`, `permission_id`),
  INDEX `sf_guard_group_permission_FI_2` USING BTREE(`permission_id`),
  CONSTRAINT `sf_guard_group_permission_FK_1` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `sf_guard_group_permission_FK_2` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'InnoDB free: 10240 kB; (`group_id`) REFER `cultura/sf_guard_group`(`id`) ON DELETE CASCADE; (`permission_id`) REFER `cultura/sf_guard_permission`(`id`) ON DELETE CASCADE' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sf_guard_group_permission
-- ----------------------------

-- ----------------------------
-- Table structure for sf_guard_permission
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_permission`;
CREATE TABLE `sf_guard_permission`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY USING BTREE (`id`),
  UNIQUE INDEX `sf_guard_permission_U_1` USING BTREE(`name`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sf_guard_permission
-- ----------------------------

-- ----------------------------
-- Table structure for sf_guard_remember_key
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_remember_key`;
CREATE TABLE `sf_guard_remember_key`  (
  `user_id` int(11) NOT NULL DEFAULT 0,
  `remember_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ip_address` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY USING BTREE (`user_id`, `ip_address`),
  CONSTRAINT `sf_guard_remember_key_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'InnoDB free: 10240 kB; (`user_id`) REFER `cultura/sf_guard_user`(`id`) ON DELETE CASCADE' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sf_guard_remember_key
-- ----------------------------

-- ----------------------------
-- Table structure for sf_guard_user
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_user`;
CREATE TABLE `sf_guard_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `algorithm` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `password` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `created_at` datetime NULL DEFAULT NULL,
  `last_login` datetime NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_super_admin` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY USING BTREE (`id`),
  UNIQUE INDEX `sf_guard_user_U_1` USING BTREE(`username`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sf_guard_user
-- ----------------------------

-- ----------------------------
-- Table structure for sf_guard_user_group
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_user_group`;
CREATE TABLE `sf_guard_user_group`  (
  `user_id` int(11) NOT NULL DEFAULT 0,
  `group_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY USING BTREE (`user_id`, `group_id`),
  INDEX `sf_guard_user_group_FI_2` USING BTREE(`group_id`),
  CONSTRAINT `sf_guard_user_group_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `sf_guard_user_group_FK_2` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'InnoDB free: 10240 kB; (`user_id`) REFER `cultura/sf_guard_user`(`id`) ON DELETE CASCADE; (`group_id`) REFER `cultura/sf_guard_group`(`id`) ON DELETE CASCADE' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sf_guard_user_group
-- ----------------------------

-- ----------------------------
-- Table structure for sf_guard_user_permission
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_user_permission`;
CREATE TABLE `sf_guard_user_permission`  (
  `user_id` int(11) NOT NULL DEFAULT 0,
  `permission_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY USING BTREE (`user_id`, `permission_id`),
  INDEX `sf_guard_user_permission_FI_2` USING BTREE(`permission_id`),
  CONSTRAINT `sf_guard_user_permission_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `sf_guard_user_permission_FK_2` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'InnoDB free: 10240 kB; (`user_id`) REFER `cultura/sf_guard_user`(`id`) ON DELETE CASCADE; (`permission_id`) REFER `cultura/sf_guard_permission`(`id`) ON DELETE CASCADE' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sf_guard_user_permission
-- ----------------------------

-- ----------------------------
-- Table structure for sf_guard_user_profile
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_user_profile`;
CREATE TABLE `sf_guard_user_profile`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Usuarios',
  `user_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Id Usuarios sfGuardUser',
  `dependencia_id` int(11) NULL DEFAULT NULL COMMENT 'Id Dependencia',
  `nombre` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Nombres',
  `apellido` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Apellidos',
  `dni` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'D.N.I.',
  `nick` varchar(22) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'NickName',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ContraseÃ±a',
  `mail` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'E-Mail',
  `habilitado` tinyint(4) NULL DEFAULT 1 COMMENT 'Usuario habilitado',
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'DescripciÃ³n',
  `created_at` datetime NULL DEFAULT NULL COMMENT 'Fecha Alta',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha Ãºltima modificaciÃ³n',
  `borrado` tinyint(4) NULL DEFAULT 0 COMMENT 'Indica si el registro esta borrado',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `sf_guard_user_profile_FI_1` USING BTREE(`user_id`),
  INDEX `sf_guard_user_profile_FI_2` USING BTREE(`dependencia_id`),
  CONSTRAINT `sf_guard_user_profile_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `sf_guard_user_profile_FK_2` FOREIGN KEY (`dependencia_id`) REFERENCES `dependencia` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Perfiles de usuarios para sfGuardUser; InnoDB free: 10240 kB; (`user_id`) REFER `cultura/sf_guard_user`(`id`) ON DELETE CASCADE; (`dependencia_id`) REFER `cultura/dependencia`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sf_guard_user_profile
-- ----------------------------

-- ----------------------------
-- Table structure for sf_guard_user_profile_dependencia
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_user_profile_dependencia`;
CREATE TABLE `sf_guard_user_profile_dependencia`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id sfGuardUserProfileDependencia',
  `user_profile_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Id Usuarios sfGuardUserProfile',
  `dependencia_id` int(11) NULL DEFAULT NULL COMMENT 'Id Dependencia',
  `created_at` datetime NULL DEFAULT NULL COMMENT 'Fecha Alta',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha Ãºltima modificaciÃ³n',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `sf_guard_user_profile_dependencia_FI_1` USING BTREE(`user_profile_id`),
  INDEX `sf_guard_user_profile_dependencia_FI_2` USING BTREE(`dependencia_id`),
  CONSTRAINT `sf_guard_user_profile_dependencia_FK_1` FOREIGN KEY (`user_profile_id`) REFERENCES `sf_guard_user_profile` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `sf_guard_user_profile_dependencia_FK_2` FOREIGN KEY (`dependencia_id`) REFERENCES `dependencia` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'RelaciÃ³n entre los perfiles de usuarios y dependencia; InnoDB free: 10240 kB; (`user_profile_id`) REFER `cultura/sf_guard_user_profile`(`id`) ON DELETE CASCADE; (`dependencia_id`) REFER `cultura/dependencia`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sf_guard_user_profile_dependencia
-- ----------------------------

-- ----------------------------
-- Table structure for syslog
-- ----------------------------
DROP TABLE IF EXISTS `syslog`;
CREATE TABLE `syslog`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de Logs',
  `sf_guard_user_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Id usuario',
  `registro` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Registro de actividad',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha y hora del registro',
  `ip` varchar(33) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'IP Remote',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `syslog_FI_1` USING BTREE(`sf_guard_user_id`),
  CONSTRAINT `syslog_FK_1` FOREIGN KEY (`sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Sistema de Logs; InnoDB free: 10240 kB; (`sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of syslog
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_asignacion
-- ----------------------------
DROP TABLE IF EXISTS `tipo_asignacion`;
CREATE TABLE `tipo_asignacion`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del tipo de asignaciÃ³n al cargo',
  `tipo_asignacion` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Tipo',
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'DescripciÃ³n',
  `sf_guard_user_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Usuario',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha Alta',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha Ãºltima modificaciÃ³n',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `tipo_asignacion_FI_1` USING BTREE(`sf_guard_user_id`),
  CONSTRAINT `tipo_asignacion_FK_1` FOREIGN KEY (`sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'AsignaciÃ³n por decreto/resoluciÃ³n/etc.; InnoDB free: 10240 kB; (`sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_asignacion
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_baja
-- ----------------------------
DROP TABLE IF EXISTS `tipo_baja`;
CREATE TABLE `tipo_baja`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del tipo de baja',
  `tipo_baja` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Tipo',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha Alta',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha Ãºltima modificaciÃ³n',
  PRIMARY KEY USING BTREE (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = ' Tipo de baja por resoluciÃ³n/exp/nota/duplicidad/etc.' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_baja
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_bien
-- ----------------------------
DROP TABLE IF EXISTS `tipo_bien`;
CREATE TABLE `tipo_bien`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Bienes Id',
  `parent_id` int(11) NULL DEFAULT 0 COMMENT 'Id Bienes',
  `codigo_presup` int(11) NOT NULL DEFAULT 0 COMMENT 'CÃ³digo presupuestario',
  `tipo_bien` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Tipo de bien',
  `descripcion_bien` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'DescripciÃ³n de bien',
  `sf_guard_user_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Usuario',
  `borrado` tinyint(4) NULL DEFAULT 0 COMMENT 'Indica si el registro esta borrado',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha Ãºltima modificaciÃ³n',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `tipo_bien_FI_1` USING BTREE(`parent_id`),
  INDEX `tipo_bien_FI_2` USING BTREE(`codigo_presup`),
  INDEX `tipo_bien_FI_3` USING BTREE(`sf_guard_user_id`),
  CONSTRAINT `tipo_bien_FK_1` FOREIGN KEY (`parent_id`) REFERENCES `tipo_bien` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tipo_bien_FK_2` FOREIGN KEY (`codigo_presup`) REFERENCES `tipo_bien_amortizacion` (`codigo_presup`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tipo_bien_FK_3` FOREIGN KEY (`sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Bienes; InnoDB free: 10240 kB; (`parent_id`) REFER `cultura/tipo_bien`(`id`); (`codigo_presup`) REFER `cultura/tipo_bien_amortizacion`(`codigo_presup`); (`sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_bien
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_bien_amortizacion
-- ----------------------------
DROP TABLE IF EXISTS `tipo_bien_amortizacion`;
CREATE TABLE `tipo_bien_amortizacion`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo presupuestario = Id',
  `codigo_presup` int(11) NOT NULL DEFAULT 0 COMMENT 'CÃ³digo presupuestario',
  `plazo_amortizacion` smallint(6) NOT NULL DEFAULT 0 COMMENT 'AmortizaciÃ³n',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha Ãºltima modificaciÃ³n',
  PRIMARY KEY USING BTREE (`id`),
  UNIQUE INDEX `tipo_bien_amortizacion_U_1` USING BTREE(`codigo_presup`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'AmortizaciÃ³n' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_bien_amortizacion
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_ingreso
-- ----------------------------
DROP TABLE IF EXISTS `tipo_ingreso`;
CREATE TABLE `tipo_ingreso`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id ingreso',
  `ingreso` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Ingreso',
  `sf_guard_user_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Usuario',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha Alta',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `tipo_ingreso_FI_1` USING BTREE(`sf_guard_user_id`),
  CONSTRAINT `tipo_ingreso_FK_1` FOREIGN KEY (`sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Tipo de ingreso; InnoDB free: 10240 kB; (`sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_ingreso
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_remito
-- ----------------------------
DROP TABLE IF EXISTS `tipo_remito`;
CREATE TABLE `tipo_remito`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Tipo de remito',
  `tipo_remito` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Tipo Remito',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha',
  PRIMARY KEY USING BTREE (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Tipo de Remitos' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_remito
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_responsable
-- ----------------------------
DROP TABLE IF EXISTS `tipo_responsable`;
CREATE TABLE `tipo_responsable`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del tipo de responsabilidad',
  `tipo_responsable` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Tipo responsabilidad',
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'DescripciÃ³n',
  `sf_guard_user_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Usuario',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `tipo_responsable_FI_1` USING BTREE(`sf_guard_user_id`),
  CONSTRAINT `tipo_responsable_FK_1` FOREIGN KEY (`sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Tipo de responsabilidad sobre el patrimonio; InnoDB free: 10240 kB; (`sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_responsable
-- ----------------------------

-- ----------------------------
-- Table structure for transferencia_patrimonio
-- ----------------------------
DROP TABLE IF EXISTS `transferencia_patrimonio`;
CREATE TABLE `transferencia_patrimonio`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Estado de transferencia',
  `patrimonio_id` int(11) NULL DEFAULT NULL COMMENT 'Id del patrimonio',
  `dependencia_anterior_id` int(11) NULL DEFAULT NULL COMMENT 'Id de la dependencia anterior',
  `dependencia_final_id` int(11) NULL DEFAULT NULL COMMENT 'Id de la dependencia asignada el patrimonio',
  `estado_transferencia_id` int(11) NULL DEFAULT NULL COMMENT 'Id del Estado en la transferencia del patrimonio',
  `borrado` tinyint(4) NULL DEFAULT 0 COMMENT 'Indica si el registro esta borrado',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha alta',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'Fecha de traspaso del patrimonio',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `transferencia_patrimonio_FI_1` USING BTREE(`patrimonio_id`),
  INDEX `transferencia_patrimonio_FI_2` USING BTREE(`dependencia_anterior_id`),
  INDEX `transferencia_patrimonio_FI_3` USING BTREE(`dependencia_final_id`),
  INDEX `transferencia_patrimonio_FI_4` USING BTREE(`estado_transferencia_id`),
  CONSTRAINT `transferencia_patrimonio_FK_1` FOREIGN KEY (`patrimonio_id`) REFERENCES `patrimonio` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `transferencia_patrimonio_FK_2` FOREIGN KEY (`dependencia_anterior_id`) REFERENCES `dependencia` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `transferencia_patrimonio_FK_3` FOREIGN KEY (`dependencia_final_id`) REFERENCES `dependencia` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `transferencia_patrimonio_FK_4` FOREIGN KEY (`estado_transferencia_id`) REFERENCES `estado_transferencia` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Transferencia-Patrimonio; InnoDB free: 10240 kB; (`patrimonio_id`) REFER `cultura/patrimonio`(`id`); (`dependencia_anterior_id`) REFER `cultura/dependencia`(`id`); (`dependencia_final_id`) REFER `cultura/dependencia`(`id`); (`estado_transferencia_id`) REFER `cultura/estado_transferencia`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transferencia_patrimonio
-- ----------------------------

-- ----------------------------
-- Table structure for universo
-- ----------------------------
DROP TABLE IF EXISTS `universo`;
CREATE TABLE `universo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Universo',
  `universo` varchar(252) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Universo',
  `sf_guard_user_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Usuario',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha Alta',
  PRIMARY KEY USING BTREE (`id`),
  INDEX `universo_FI_1` USING BTREE(`sf_guard_user_id`),
  CONSTRAINT `universo_FK_1` FOREIGN KEY (`sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Universo; InnoDB free: 10240 kB; (`sf_guard_user_id`) REFER `cultura/sf_guard_user`(`id`)' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of universo
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
