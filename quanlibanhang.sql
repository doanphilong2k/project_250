-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2020 at 02:39 PM
-- Server version: 8.0.22-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlibanhang`
--
CREATE DATABASE IF NOT EXISTS `quanlibanhang` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `quanlibanhang`;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` varchar(5) NOT NULL,
  `MSHH` varchar(5) NOT NULL,
  `SoLuong` tinyint NOT NULL,
  `GiaDatHang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` varchar(5) NOT NULL,
  `MSKH` varchar(5) NOT NULL,
  `MSNV` varchar(5) DEFAULT NULL,
  `NgayDH` datetime NOT NULL,
  `TrangThai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` varchar(5) NOT NULL,
  `TenHH` varchar(50) NOT NULL,
  `Gia` int NOT NULL,
  `SoLuongHang` tinyint NOT NULL,
  `MaNhom` varchar(5) NOT NULL,
  `Hinh` varchar(50) NOT NULL,
  `MoTaHH` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` varchar(5) NOT NULL,
  `HoTenKH` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` varchar(5) NOT NULL,
  `HoTenNV` varchar(50) NOT NULL,
  `ChucVu` varchar(50) NOT NULL,
  `Diachi` varchar(50) DEFAULT NULL,
  `SoDienThoai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `Diachi`, `SoDienThoai`) VALUES
('B1', 'Trần Võ Xuân Vinh', 'Nhân viên', 'Đại học Cần Thơ khu Hòa An', '0999567897'),
('B2', 'Lanlei', 'Nhân viên', 'Tokyo Nhật Bản', '0456346734'),
('B3', 'Kleed', 'Quản lí', 'Tokyo Nhật Bản', '0135367456'),
('B4', 'Phan Hoàng Ân', 'Nhân viên', 'Đà Lạt, Việt Nam', '099956789'),
('B5', 'Niu', 'Nhân viên', 'USA', '0764657855'),
('B6', 'Trần Võ Huân Dinh', 'Nhân viên', 'Đà Nẵng, Việt Nam', '0866421467'),
('B7', 'Niu Ton', 'Nhân viên', 'Phúc Kiến, Trung Quốc', '0567412347'),
('B8', 'Trần Võ Xuân Vinh', 'Nhân viên', 'Đại học FPT', '096721798');

-- --------------------------------------------------------

--
-- Table structure for table `nhomhanghoa`
--

CREATE TABLE `nhomhanghoa` (
  `MaNhom` varchar(5) NOT NULL,
  `TenNhom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `MSNV` (`MSNV`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaNhom` (`MaNhom`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Indexes for table `nhomhanghoa`
--
ALTER TABLE `nhomhanghoa`
  ADD PRIMARY KEY (`MaNhom`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`),
  ADD CONSTRAINT `chitietdathang_ibfk_2` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`);

--
-- Constraints for table `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaNhom`) REFERENCES `nhomhanghoa` (`MaNhom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
