/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : db_inventory

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 15/08/2022 07:17:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mst_barang
-- ----------------------------
DROP TABLE IF EXISTS `mst_barang`;
CREATE TABLE `mst_barang`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_barang` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stok` int NULL DEFAULT NULL,
  `satuan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT current_timestamp NOT NULL;,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kode_barang`(`kode_barang`) USING BTREE,
  INDEX `nama_barang`(`nama_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mst_barang
-- ----------------------------
INSERT INTO `mst_barang` VALUES (6, 'BR52807080', 'Kain Flanel', 49, 'meter', '2022-04-21 08:54:42');
INSERT INTO `mst_barang` VALUES (7, 'BR93297231', 'Benang Hitam', 120, 'pcs', '0000-00-00 00:00:00');
INSERT INTO `mst_barang` VALUES (9, 'B85369882', 'benang sutra', 68, 'roll', '2022-07-01 16:02:12');

-- ----------------------------
-- Table structure for mst_satuan
-- ----------------------------
DROP TABLE IF EXISTS `mst_satuan`;
CREATE TABLE `mst_satuan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `satuan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp NOT NULL;,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mst_satuan
-- ----------------------------
INSERT INTO `mst_satuan` VALUES (2, 'pcs', '2022-04-18 12:23:57');
INSERT INTO `mst_satuan` VALUES (3, 'kg', '2022-04-18 12:30:01');
INSERT INTO `mst_satuan` VALUES (4, 'meter', '2022-04-21 08:54:24');

-- ----------------------------
-- Table structure for mst_supplier
-- ----------------------------
DROP TABLE IF EXISTS `mst_supplier`;
CREATE TABLE `mst_supplier`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `telepon` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT current_timestamp NOT NULL;,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kode_3`(`kode`) USING BTREE,
  INDEX `kode`(`kode`) USING BTREE,
  INDEX `kode_2`(`kode`) USING BTREE,
  INDEX `nama`(`nama`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mst_supplier
-- ----------------------------
INSERT INTO `mst_supplier` VALUES (1, 'SPL362', 'Bakul', 'coba@bakul', '085725215768', 'Sukoharjo', '2022-04-17 15:13:06');
INSERT INTO `mst_supplier` VALUES (2, 'SUP903', 'Ibu Agus', 'ibu.agus@berkah.com', '0198109', 'Baki\r\n', '2022-07-02 15:20:11');

-- ----------------------------
-- Table structure for mst_toko
-- ----------------------------
DROP TABLE IF EXISTS `mst_toko`;
CREATE TABLE `mst_toko`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_pemilik` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_telepon` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp NOT NULL;,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mst_toko
-- ----------------------------
INSERT INTO `mst_toko` VALUES (1, 'UD. Berkah Jaya', 'Ibu Sri Wahyuni', '0895379137092', 'Daleman, Jati, Gatak, Sukoharjo RT 01/01', '2022-04-17 11:06:25');

-- ----------------------------
-- Table structure for trs_keluar
-- ----------------------------
DROP TABLE IF EXISTS `trs_keluar`;
CREATE TABLE `trs_keluar`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_keluar` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_keluar` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jam_keluar` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_customer` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_petugas` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `no_keluar`(`no_keluar`) USING BTREE,
  INDEX `nama_petugas`(`nama_petugas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trs_keluar
-- ----------------------------
INSERT INTO `trs_keluar` VALUES (2, 'TRS1660517850', '2022-08-15', '05:57:30', 'Gus Samsudin', 'Administator');

-- ----------------------------
-- Table structure for trs_masuk
-- ----------------------------
DROP TABLE IF EXISTS `trs_masuk`;
CREATE TABLE `trs_masuk`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_terima` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_terima` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jam_terima` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_supplier` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_petugas` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `no_terima`(`no_terima`) USING BTREE,
  INDEX `nama_supplier`(`nama_supplier`) USING BTREE,
  INDEX `nama_petugas`(`nama_petugas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trs_masuk
-- ----------------------------
INSERT INTO `trs_masuk` VALUES (3, 'TRS1660519306', '2022-08-15', '06:21:46', 'Bakul', 'Administator');
INSERT INTO `trs_masuk` VALUES (4, 'TRS1660521687', '2022-08-15', '07:01:27', 'Ibu Agus', 'Administator');

-- ----------------------------
-- Table structure for trsdet_keluar
-- ----------------------------
DROP TABLE IF EXISTS `trsdet_keluar`;
CREATE TABLE `trsdet_keluar`  (
  `no_keluar` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_barang` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `satuan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  INDEX `nama_barang`(`nama_barang`) USING BTREE,
  INDEX `no_keluar`(`no_keluar`) USING BTREE,
  INDEX `nama_barang_2`(`nama_barang`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trsdet_keluar
-- ----------------------------
INSERT INTO `trsdet_keluar` VALUES ('TRS1660517850', 'Benang Hitam', 1, 'pcs', '2022-08-15 05:57:53', 'OKE');

-- ----------------------------
-- Table structure for trsdet_masuk
-- ----------------------------
DROP TABLE IF EXISTS `trsdet_masuk`;
CREATE TABLE `trsdet_masuk`  (
  `no_terima` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_barang` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `satuan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp NOT NULL;,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  INDEX `nama_barang`(`nama_barang`) USING BTREE,
  INDEX `no_terima`(`no_terima`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trsdet_masuk
-- ----------------------------
INSERT INTO `trsdet_masuk` VALUES ('TRS1660519306', 'Kain Flanel', 1, 'meter', '2022-08-15 06:21:55', 'KKKK');
INSERT INTO `trsdet_masuk` VALUES ('TRS1660521687', 'Kain Flanel', 1, 'meter', '2022-08-15 07:01:36', 'Coba');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL DEFAULT 2,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp NOT NULL;,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `nama`(`nama`) USING BTREE,
  INDEX `kode`(`kode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'ADMN', 'Administator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '2022-04-17 10:43:36');
INSERT INTO `users` VALUES (2, 'OWNER', 'Pimpinan', 'owner', '579233b2c479241523cba5e3af55d0f50f2d6414', 2, '2022-04-17 10:44:02');
INSERT INTO `users` VALUES (6, 'PETUGAS - 44', 'coba', 'PTGS44', 'coba', 2, '2022-07-14 05:00:37');

SET FOREIGN_KEY_CHECKS = 1;
