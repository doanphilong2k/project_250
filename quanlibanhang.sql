/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : quanlibanhang

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 05/12/2020 23:47:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for chitietdathang
-- ----------------------------
DROP TABLE IF EXISTS `chitietdathang`;
CREATE TABLE `chitietdathang`  (
  `SoDonDH` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MSHH` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SoLuong` tinyint(4) NOT NULL,
  `GiaDatHang` double NOT NULL,
  PRIMARY KEY (`SoDonDH`, `MSHH`) USING BTREE,
  INDEX `MSHH`(`MSHH`) USING BTREE,
  CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `chitietdathang_ibfk_2` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dangnhap
-- ----------------------------
DROP TABLE IF EXISTS `dangnhap`;
CREATE TABLE `dangnhap`  (
  `MSNV` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `taikhoan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `matkhau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MSNV`) USING BTREE,
  CONSTRAINT `FK_dangnhap_nhanvien` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dangnhap
-- ----------------------------
INSERT INTO `dangnhap` VALUES ('B1', 'admin', 'admin123');

-- ----------------------------
-- Table structure for dathang
-- ----------------------------
DROP TABLE IF EXISTS `dathang`;
CREATE TABLE `dathang`  (
  `SoDonDH` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MSKH` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MSNV` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `NgayDH` datetime(0) NOT NULL,
  `TrangThai` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`SoDonDH`) USING BTREE,
  INDEX `MSNV`(`MSNV`) USING BTREE,
  INDEX `MSKH`(`MSKH`) USING BTREE,
  CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hanghoa
-- ----------------------------
DROP TABLE IF EXISTS `hanghoa`;
CREATE TABLE `hanghoa`  (
  `MSHH` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenHH` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongHang` tinyint(4) NOT NULL,
  `MaNhom` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MoTaHH` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`MSHH`) USING BTREE,
  INDEX `MaNhom`(`MaNhom`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hanghoa
-- ----------------------------
INSERT INTO `hanghoa` VALUES ('MS001', 'Áo Len Cao Cổ ', 2000000, 10, '', '..\\Assets\\Images\\SP01.jpg', NULL);
INSERT INTO `hanghoa` VALUES ('MS002', 'Áo Gucci', 30000000, 3, '', '..\\Assets\\Images\\jacket-gucci.jpg', NULL);

-- ----------------------------
-- Table structure for khachhang
-- ----------------------------
DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE `khachhang`  (
  `MSKH` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `HoTenKH` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DiaChi` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SoDienThoai` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`MSKH`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for nhanvien
-- ----------------------------
DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE `nhanvien`  (
  `MSNV` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `HoTenNV` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ChucVu` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Diachi` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `SoDienThoai` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`MSNV`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nhanvien
-- ----------------------------
INSERT INTO `nhanvien` VALUES ('B1', 'Trần Võ Xuân Vinh', 'Nhân viên', 'Đại học Cần Thơ khu Hòa An', '0999567897');
INSERT INTO `nhanvien` VALUES ('B2', 'Lanlei', 'Nhân viên', 'Tokyo Nhật Bản', '0456346734');
INSERT INTO `nhanvien` VALUES ('B3', 'Kleed', 'Quản lí', 'Tokyo Nhật Bản', '0135367456');
INSERT INTO `nhanvien` VALUES ('B4', 'Phan Hoàng Ân', 'Nhân viên', 'Đà Lạt, Việt Nam', '099956789');
INSERT INTO `nhanvien` VALUES ('B5', 'Niu', 'Nhân viên', 'USA', '0764657855');
INSERT INTO `nhanvien` VALUES ('B6', 'Trần Võ Huân Dinh', 'Nhân viên', 'Đà Nẵng, Việt Nam', '0866421467');
INSERT INTO `nhanvien` VALUES ('B7', 'Niu Ton', 'Nhân viên', 'Phúc Kiến, Trung Quốc', '0567412347');
INSERT INTO `nhanvien` VALUES ('B8', 'Trần Võ Xuân Vinh', 'Nhân viên', 'Đại học FPT', '096721798');

-- ----------------------------
-- Table structure for nhomhanghoa
-- ----------------------------
DROP TABLE IF EXISTS `nhomhanghoa`;
CREATE TABLE `nhomhanghoa`  (
  `MaNhom` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenNhom` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`MaNhom`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nhomhanghoa
-- ----------------------------
INSERT INTO `nhomhanghoa` VALUES ('', 'Áo Len Nam');

SET FOREIGN_KEY_CHECKS = 1;
