-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 07:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_gio_binh_luan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `id_san_pham`, `id_khach_hang`, `noi_dung`, `ngay_gio_binh_luan`) VALUES
(1, 11, 10, 'Sản phẩm tốt, nhân viên nhiệt tình, sẽ quay lại lần sau', '2024-04-05 19:16:45'),
(2, 1, 7, 'Tuyệt vời', '2024-04-01 14:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int(11) NOT NULL,
  `id_don_hang` int(11) DEFAULT NULL,
  `id_san_pham` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `gia` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `id_don_hang`, `id_san_pham`, `so_luong`, `gia`) VALUES
(1, 1, 6, 1, '6990000.00'),
(2, 2, 11, 1, '34990000.00'),
(3, 3, 2, 1, '1590000.00'),
(4, 3, 15, 1, '10990000.00'),
(5, 4, 25, 1, '4790000.00'),
(6, 5, 1, 1, '22990000.00'),
(7, 6, 10, 1, '14890000.00'),
(8, 7, 8, 1, '40990000.00'),
(9, 8, 12, 1, '29490000.00'),
(10, 8, 17, 1, '22990000.00'),
(11, 9, 21, 1, '680000.00'),
(12, 9, 24, 1, '4990000.00'),
(13, 10, 16, 1, '13990000.00'),
(14, 11, 14, 1, '14890000.00'),
(15, 12, 16, 1, '13990000.00'),
(16, 13, 5, 1, '37490000.00'),
(17, 14, 26, 1, '7990000.00'),
(18, 15, 21, 1, '680000.00'),
(19, 15, 19, 1, '990000.00'),
(20, 16, 15, 1, '8990000.00'),
(21, 17, 10, 1, '14890000.00'),
(22, 18, 9, 1, '7990000.00'),
(23, 19, 13, 1, '11790000.00'),
(24, 20, 25, 1, '4799000.00'),
(25, 21, 18, 1, '10990000.00'),
(26, 22, 8, 1, '40990000.00'),
(27, 23, 14, 1, '14890000.00'),
(28, 24, 20, 1, '720000.00'),
(29, 24, 23, 1, '2490000.00'),
(30, 25, 7, 1, '25990000.00'),
(31, 26, 11, 1, '34990000.00'),
(32, 27, 27, 1, '14990000.00'),
(33, 28, 15, 1, '8990000.00'),
(35, 29, 9, 1, '7990000.00'),
(36, 29, 24, 1, '4990000.00'),
(37, 30, 12, 1, '29490000.00'),
(38, 30, 10, 1, '14890000.00'),
(39, 31, 11, 1, '34990000.00'),
(40, 32, 16, 1, '13990000.00'),
(41, 32, 27, 1, '14990000.00'),
(42, 33, 21, 1, '680000.00'),
(43, 33, 19, 1, '990000.00'),
(44, 34, 26, 1, '7990000.00'),
(45, 35, 8, 1, '40990000.00'),
(46, 36, 15, 1, '8990000.00'),
(47, 36, 2, 1, '1590000.00'),
(48, 37, 14, 1, '14890000.00'),
(49, 38, 5, 1, '37490000.00'),
(50, 39, 25, 1, '4790000.00'),
(51, 40, 11, 1, '34990000.00'),
(52, 40, 8, 1, '40990000.00'),
(53, 41, 15, 1, '8990000.00'),
(54, 41, 19, 1, '990000.00'),
(55, 42, 16, 1, '13990000.00'),
(56, 42, 27, 1, '14990000.00'),
(57, 43, 21, 1, '680000.00'),
(58, 43, 20, 1, '720000.00'),
(66, 69, 14, 1, '14890000.00'),
(67, 70, 8, 1, '40990000.00'),
(68, 71, 21, 1, '680000.00'),
(69, 71, 19, 1, '990000.00'),
(70, 72, 11, 1, '34990000.00'),
(71, 73, 16, 1, '13990000.00'),
(72, 73, 27, 1, '14990000.00'),
(73, 74, 26, 1, '7990000.00'),
(74, 78, 2, 1, '1590000.00'),
(75, 78, 3, 1, '22990000.00'),
(76, 78, 4, 1, '10990000.00'),
(77, 78, 1, 1, '22990000.00');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_nhap_kho`
--

CREATE TABLE `chi_tiet_nhap_kho` (
  `id` int(11) NOT NULL,
  `id_nhap_kho` int(11) DEFAULT NULL,
  `id_san_pham` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `gia` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chi_tiet_nhap_kho`
--

INSERT INTO `chi_tiet_nhap_kho` (`id`, `id_nhap_kho`, `id_san_pham`, `so_luong`, `gia`) VALUES
(1, 1, 1, 30, '21000000.00'),
(2, 1, 4, 20, '10000000.00'),
(3, 2, 19, 20, '850000.00'),
(4, 2, 2, 50, '1400000.00'),
(5, 3, 11, 21, '33350000.00'),
(6, 3, 12, 30, '27550000.00'),
(7, 4, 5, 30, '35990000.00'),
(8, 4, 6, 50, '6000000.00'),
(9, 4, 9, 47, '6790000.00'),
(10, 5, 7, 35, '23990000.00'),
(11, 5, 8, 32, '39250000.00'),
(12, 5, 10, 40, '13790000.00'),
(13, 6, 3, 32, '20999.00'),
(14, 6, 15, 52, '7290000.00'),
(15, 6, 23, 43, '2190000.00'),
(16, 7, 13, 29, '10890000.00'),
(17, 7, 14, 44, '13290000.00'),
(18, 8, 20, 40, '680000.00'),
(19, 8, 21, 75, '590000.00'),
(20, 8, 22, 33, '500000.00'),
(21, 9, 16, 22, '12490000.00'),
(22, 9, 17, 55, '20599000.00'),
(23, 9, 18, 33, '9790000.00'),
(24, 10, 24, 20, '4280000.00'),
(25, 10, 25, 29, '4000000.00'),
(26, 10, 26, 31, '7280000.00'),
(27, 10, 27, 38, '13590000.00'),
(28, 11, 28, 27, '22990000.00'),
(29, 11, 29, 32, '8790000.00'),
(30, 11, 30, 22, '13599000.00'),
(31, 11, 31, 26, '4699000.00'),
(32, 11, 32, 21, '3159000.00'),
(33, 12, 20, 50, '650000.00'),
(34, 12, 2, 30, '1400000.00'),
(35, 13, 11, 40, '33350000.00'),
(36, 13, 12, 30, '27550000.00'),
(37, 14, 5, 50, '35990000.00'),
(38, 14, 8, 40, '39250000.00'),
(39, 14, 17, 30, '19990000.00'),
(40, 15, 9, 40, '6790000.00'),
(41, 15, 10, 30, '13790000.00'),
(42, 16, 16, 40, '12490000.00'),
(43, 16, 27, 50, '13590000.00'),
(44, 17, 26, 50, '7280000.00'),
(45, 17, 24, 30, '4280000.00'),
(46, 18, 19, 30, '850000.00'),
(47, 18, 19, 30, '850000.00'),
(48, 22, 3, 30, '22990000.00'),
(49, 22, 12, 20, '27550000.00'),
(50, 23, 8, 40, '39250000.00'),
(51, 23, 1, 30, '21000000.00'),
(52, 24, 6, 30, '6000000.00'),
(53, 24, 9, 20, '6790000.00'),
(54, 25, 4, 40, '10000000.00'),
(55, 25, 16, 30, '12490000.00'),
(56, 26, 21, 30, '590000.00'),
(57, 26, 20, 20, '680000.00'),
(64, 42, 14, 20, '13290000.00'),
(65, 43, 8, 40, '39250000.00'),
(66, 44, 21, 50, '590000.00'),
(67, 44, 19, 30, '850000.00'),
(68, 45, 11, 30, '33350000.00'),
(69, 46, 16, 40, '12490000.00'),
(70, 46, 27, 30, '13590000.00'),
(71, 47, 26, 30, '7280000.00');

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc_san_pham`
--

CREATE TABLE `danh_muc_san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danh_muc_san_pham`
--

INSERT INTO `danh_muc_san_pham` (`id`, `ten`) VALUES
(1, 'SamSung'),
(2, 'iPhone'),
(3, 'Oppo'),
(4, 'realme'),
(5, 'Xiaomi'),
(6, 'Nokia');

-- --------------------------------------------------------

--
-- Table structure for table `don_dat_hang`
--

CREATE TABLE `don_dat_hang` (
  `id` int(11) NOT NULL,
  `id_khach_hang` int(11) DEFAULT NULL,
  `ngay` datetime DEFAULT NULL,
  `tong_tien` decimal(10,2) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `tinh_trang` varchar(224) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `don_dat_hang`
--

INSERT INTO `don_dat_hang` (`id`, `id_khach_hang`, `ngay`, `tong_tien`, `ghi_chu`, `tinh_trang`) VALUES
(1, 9, '2024-05-02 09:28:49', '6990000.00', '1 Samsung Galaxy A25 5G', 'Đang giao'),
(2, 10, '2024-05-02 10:15:56', '34990000.00', '1 iPhone 15 Pro Max', 'Đang xử lý'),
(3, 12, '2024-05-02 11:13:39', '12580000.00', '1 Nokia 8210 4G, 1 OPPO Reno11 5G', 'Đang xử lý'),
(4, 8, '2024-05-02 11:14:29', '4790000.00', '1 realme C67', 'Đang xử lý'),
(5, 7, '2024-05-02 11:37:12', '22990000.00', '1 Samsung Galaxy S24 5G', 'Đang xử lý'),
(6, 15, '2024-05-13 13:30:35', '14890000.00', '1 Samsung Galaxy S23 FE 5G', 'Đang xử lý'),
(7, 19, '2024-05-02 14:29:35', '40990000.00', '1 Samsung Galaxy Z Fold5 5G', 'Đang xử lý'),
(8, 10, '2024-05-02 14:45:35', '52480000.00', '1 iPhone 14 Pro Max, 1 OPPO Find N3 Flip 5G', 'Đang xử lý'),
(9, 21, '2024-05-02 15:44:35', '1179000.00', '1 Nokia 105 4G Pro, 1 realme C55', 'Đang xử lý'),
(10, 17, '2024-05-02 16:36:35', '13990000.00', '1 OPPO Reno10 Pro 5G', 'Đang xử lý'),
(11, 16, '2024-05-03 08:13:44', '14890000.00', '1 iPhone 12', 'Đang xử lý'),
(12, 14, '2024-05-03 10:15:35', '13990000.00', '1 OPPO Reno10 Pro 5G', 'Đang xử lý'),
(13, 17, '2024-05-03 11:15:35', '37490000.00', '1 Samsung Galaxy S24 Ultra 5G', 'Đang xử lý'),
(14, 13, '2024-05-03 14:13:44', '7990000.00', '1 realme 11', 'Đang xử lý'),
(15, 21, '2024-05-03 15:21:35', '1670000.00', '1 Nokia 105 4G Pro, 1 Nokia 215 4G', 'Đang xử lý'),
(16, 18, '2024-05-03 16:15:35', '8990000.00', '1 OPPO Reno11 F 5G', 'Đang xử lý'),
(17, 13, '2024-05-04 08:39:38', '14890000.00', '1 Samsung Galaxy S23 FE 5G', 'Đang xử lý'),
(18, 14, '2024-05-04 09:39:38', '7990000.00', '1 Samsung Galaxy M34 5G', 'Đang xử lý'),
(19, 17, '2024-05-04 10:39:38', '11790000.00', '1 iPhone 11', 'Đang xử lý'),
(20, 8, '2024-05-04 13:39:38', '4790000.00', '1 realme C67', 'Đang xử lý'),
(21, 19, '2024-05-04 14:39:38', '10990000.00', '1 OPPO Reno8 T 5G', 'Đang xử lý'),
(22, 22, '2024-05-04 15:43:38', '40990000.00', '1 Samsung Galaxy Z Fold5 5G', 'Đang xử lý'),
(23, 15, '2024-05-05 08:58:21', '14890000.00', '1 iPhone 12', 'Đang xử lý'),
(24, 17, '2024-05-05 09:58:21', '3210000.00', '1 Nokia 110 4G Pro, 1 realme Note 50', 'Đang xử lý'),
(25, 20, '2024-05-05 10:58:21', '25990000.00', '1 Samsung Galaxy Z Flip5 5G', 'Đang xử lý'),
(26, 16, '2024-05-05 13:58:21', '34990000.00', '1 iPhone 15 Pro Max', 'Đang xử lý'),
(27, 9, '2024-05-05 14:58:21', '14990000.00', '1 realme 11 Pro+ 5G', 'Đang xử lý'),
(28, 12, '2024-05-05 16:58:21', '8990000.00', '1 OPPO Reno11 F 5G', 'Đang xử lý'),
(29, 8, '2024-06-01 10:30:00', '7980000.00', '1 Samsung Galaxy M34 5G, 1 realme C55', 'Đang xử lý'),
(30, 15, '2024-06-02 14:45:00', '22880000.00', '1 iPhone 14 Pro Max, 1 Samsung Galaxy S23 FE 5G', 'Đang xử lý'),
(31, 10, '2024-06-03 09:15:00', '34990000.00', '1 iPhone 15 Pro Max', 'Đang xử lý'),
(32, 17, '2024-06-04 11:20:00', '24980000.00', '1 OPPO Reno10 Pro 5G, 1 realme 11 Pro+ 5G', 'Đang xử lý'),
(33, 21, '2024-06-05 16:30:00', '1370000.00', '1 Nokia 105 4G Pro, 1 Nokia 215 4G', 'Đang xử lý'),
(34, 13, '2024-06-06 13:00:00', '7990000.00', '1 realme 11', 'Đang xử lý'),
(35, 19, '2024-06-07 10:45:00', '40990000.00', '1 Samsung Galaxy Z Fold5 5G', 'Đang xử lý'),
(36, 12, '2024-06-08 15:30:00', '20780000.00', '1 OPPO Reno11 F 5G, 1 Nokia 8210 4G', 'Đang xử lý'),
(37, 14, '2024-06-09 09:00:00', '14890000.00', '1 iPhone 12', 'Đang xử lý'),
(38, 16, '2024-06-10 12:15:00', '37490000.00', '1 Samsung Galaxy S24 Ultra 5G', 'Đang xử lý'),
(39, 8, '2024-07-01 09:15:00', '4790000.00', '1 realme C67', 'Đang xử lý'),
(40, 10, '2024-07-02 14:30:00', '64480000.00', '1 iPhone 15 Pro Max, 1 Samsung Galaxy Z Fold5 5G', 'Đang xử lý'),
(41, 12, '2024-07-03 11:00:00', '10580000.00', '1 OPPO Reno11 F 5G, 1 Nokia 215 4G', 'Đang xử lý'),
(42, 17, '2024-07-04 16:45:00', '28980000.00', '1 OPPO Reno10 Pro 5G, 1 realme 11 Pro+ 5G', 'Đang xử lý'),
(43, 21, '2024-07-05 10:30:00', '1360000.00', '1 Nokia 105 4G Pro, 1 Nokia 110 4G Pro', 'Đang xử lý'),
(44, 9, '2024-08-01 14:00:00', '6990000.00', '1 Samsung Galaxy A25 5G', 'Đang xử lý'),
(45, 14, '2024-08-02 10:30:00', '22880000.00', '1 iPhone 14 Pro Max', 'Đang xử lý'),
(46, 18, '2024-08-03 16:45:00', '8990000.00', '1 OPPO Reno11 F 5G', 'Đang xử lý'),
(47, 20, '2024-08-04 09:15:00', '25990000.00', '1 Samsung Galaxy Z Flip5 5G', 'Đang xử lý'),
(48, 13, '2024-08-05 13:30:00', '22980000.00', '1 realme 11 Pro+ 5G', 'Đang xử lý'),
(49, 15, '2024-08-06 11:00:00', '14890000.00', '1 iPhone 12', 'Đang xử lý'),
(50, 17, '2024-08-07 17:15:00', '13990000.00', '1 OPPO Reno10 Pro 5G', 'Đang xử lý'),
(51, 19, '2024-08-08 14:45:00', '40990000.00', '1 Samsung Galaxy Z Fold5 5G', 'Đang xử lý'),
(52, 21, '2024-08-09 10:15:00', '1370000.00', '1 Nokia 105 4G Pro, 1 Nokia 215 4G', 'Đang xử lý'),
(53, 22, '2024-08-10 15:30:00', '40990000.00', '1 Samsung Galaxy Z Fold5 5G', 'Đang xử lý'),
(54, 10, '2024-09-01 09:45:00', '34990000.00', '1 iPhone 15 Pro Max', 'Đang xử lý'),
(55, 12, '2024-09-02 14:15:00', '13580000.00', '1 OPPO Reno11 F 5G, 1 Nokia 8210 4G', 'Đang xử lý'),
(56, 16, '2024-09-03 11:30:00', '37490000.00', '1 Samsung Galaxy S24 Ultra 5G', 'Đang xử lý'),
(57, 8, '2024-09-04 16:00:00', '9580000.00', '1 Samsung Galaxy M34 5G, 1 realme C55', 'Đang xử lý'),
(58, 7, '2024-09-05 10:45:00', '22990000.00', '1 Samsung Galaxy S24 5G', 'Đang xử lý'),
(59, 11, '2024-09-06 13:15:00', '22990000.00', '1 Samsung Galaxy S24 5G', 'Đang xử lý'),
(60, 15, '2024-09-07 17:30:00', '29490000.00', '1 iPhone 14 Pro Max', 'Đang xử lý'),
(61, 19, '2024-09-08 09:00:00', '40990000.00', '1 Samsung Galaxy Z Fold5 5G', 'Đang xử lý'),
(62, 21, '2024-09-09 14:30:00', '1360000.00', '1 Nokia 105 4G Pro, 1 Nokia 110 4G Pro', 'Đang xử lý'),
(63, 17, '2024-09-10 11:45:00', '28980000.00', '1 OPPO Reno10 Pro 5G, 1 realme 11 Pro+ 5G', 'Đang xử lý'),
(64, 9, '2024-05-02 09:28:49', '6990000.00', '1 Samsung Galaxy A25 5G', 'Đang giao'),
(65, 10, '2024-05-02 10:15:56', '34990000.00', '1 iPhone 15 Pro Max', 'Đang xử lý'),
(66, 12, '2024-05-02 11:13:39', '12580000.00', '1 Nokia 8210 4G, 1 OPPO Reno11 5G', 'Đang xử lý'),
(67, 8, '2024-05-02 11:14:29', '4790000.00', '1 realme C67', 'Đang xử lý'),
(68, 7, '2024-05-02 11:37:12', '22990000.00', '1 Samsung Galaxy S24 5G', 'Đang xử lý'),
(69, 15, '2024-04-01 09:00:00', '14890000.00', '1 iPhone 12', 'Đang xử lý'),
(70, 19, '2024-04-10 14:30:00', '40990000.00', '1 Samsung Galaxy Z Fold5 5G', 'Đang xử lý'),
(71, 21, '2024-04-20 11:15:00', '1670000.00', '1 Nokia 105 4G Pro, 1 Nokia 215 4G', 'Đang xử lý'),
(72, 10, '2024-06-01 15:45:00', '34990000.00', '1 iPhone 15 Pro Max', 'Đang xử lý'),
(73, 17, '2024-06-10 11:00:00', '28980000.00', '1 OPPO Reno10 Pro 5G, 1 realme 11 Pro+ 5G', 'Đang xử lý'),
(74, 13, '2024-06-20 16:30:00', '7990000.00', '1 realme 11', 'Đang xử lý'),
(75, 12, '2024-07-05 14:15:00', '20780000.00', '1 OPPO Reno11 F 5G, 1 Nokia 8210 4G', 'Đang xử lý'),
(76, 16, '2024-07-15 10:30:00', '37490000.00', '1 Samsung Galaxy S24 Ultra 5G', 'Đang xử lý'),
(77, 8, '2024-07-25 16:45:00', '9580000.00', '1 Samsung Galaxy M34 5G, 1 realme C55', 'Đang xử lý'),
(78, 1, '2024-05-14 12:23:24', '58560000.00', '', 'Chờ xác nhận');

-- --------------------------------------------------------

--
-- Table structure for table `giam_gia`
--

CREATE TABLE `giam_gia` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `dieu_kien_mua` decimal(10,3) DEFAULT NULL,
  `phan_tram_giam_gia` decimal(5,2) DEFAULT NULL,
  `ngay_bat_dau` datetime DEFAULT NULL,
  `ngay_ket_thuc` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `giam_gia`
--

INSERT INTO `giam_gia` (`id`, `ten`, `dieu_kien_mua`, `phan_tram_giam_gia`, `ngay_bat_dau`, `ngay_ket_thuc`) VALUES
(3, 'ĐÓN HÈ RỰC RỠ', '8000000.000', '9.99', '2024-05-15 00:00:00', '2024-05-15 23:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `id_nguoi_dung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten`, `so_dien_thoai`, `email`, `dia_chi`, `id_nguoi_dung`) VALUES
(1, 'Nguyễn Văn An', '0901234567', 'nguyenvanan@gmail.com', '123 Đường ABC, Quận 1, Thành phố Hồ Chí Minh', 1),
(2, 'Trần Thị B', '0987654321', 'tranthib@gmail.com', '456 Đường XYZ, Quận 2, Thành phố Hồ Chí Minh', 2),
(3, 'Phạm Văn Cao', '0912345678', 'phamvancao@gmail.com', '789 Đường KLM, Quận 5, Thành phố Hồ Chí Minh', 3),
(4, 'Lê Thị Duyên', '0976543210', 'lethiduyen@gmail.com', '321 Đường DEF, Quận 4, Thành phố Hồ Chí Minh', 4),
(5, 'Hoàng Văn Bé', '0908765432', 'builebichnhung123@gmail.com', '234 Đường HIJ, Quận 5, Thành phố Hồ Chí Minh', 5),
(6, 'Mai Thị Phấn', '0912876543', 'maithiphan@gmail.com', '567 Đường LMN, Quận 6, Thành phố Hồ Chí Minh', 6),
(7, 'Đặng Văn Giang', '0987654321', 'dangvangiang@gmail.com', '78 Đường NOP, Quận 7, Thành phố Hồ Chí Minh', 7),
(8, 'Nguyễn Thị Hạnh', '0909876543', 'nguyenthihanh@gmail.com', '987 Đường QRS, Quận 8, Thành phố Hồ Chí Minh', 8),
(9, 'Trần Văn An', '0976543210', 'tranvanan@gmail.com', '543 Đường TUV, Quận 9, Thành phố Hồ Chí Minh', 9),
(10, 'Lê Văn Khang', '0912345678', 'levankhang@gmail.com', '876 Đường WXY, Quận 10, Thành phố Hồ Chí Minh', 10),
(11, 'Nguyễn Văn Linh', '0901234567', 'nguyenvanlinh@gmail.com', '123 Đường ABC, Quận 11, Thành phố Hồ Chí Minh', 11),
(12, 'Phạm Văn Nam', '0912345678', 'phamvannam@gmail.com', '789 Đường KLM, Quận Gò Vấp, Thành phố Hồ Chí Minh', 12),
(13, 'John Doe', '0912345678', 'johndoe@example.com', '123 Đường ABC, Quận 1, Thành phố Hồ Chí Minh', 13),
(14, 'Sarah Smith', '0987654321', 'sarah.smith@example.com', '456 Đường XYZ, Quận 2, Thành phố Hồ Chí Minh', 14),
(15, 'Mike Jones', '0905556666', 'mike.jones@example.com', '789 Đường KLM, Quận 3, Thành phố Hồ Chí Minh', 15),
(16, 'Emily Brown', '0911122333', 'emily.brown@example.com', '321 Đường DEF, Quận 4, Thành phố Hồ Chí Minh', 16),
(17, 'David Wilson', '0904445556', 'david.wilson@example.com', '654 Đường GHI, Quận 5, Thành phố Hồ Chí Minh', 17),
(18, 'Amy Carter', '0977788999', 'amy.carter@example.com', '987 Đường JKL, Quận 6, Thành phố Hồ Chí Minh', 18),
(19, 'Chris Green', '0902223334', 'chris.green@example.com', '741 Đường MNO, Quận 7, Thành phố Hồ Chí Minh', 19),
(20, 'Lisa Jackson', '0908889990', 'lisa.jackson@example.com', '852 Đường PQR, Quận 8, Thành phố Hồ Chí Minh', 20),
(21, 'Sam Roberts', '0903334445', 'sam.roberts@example.com', '963 Đường STU, Quận 9, Thành phố Hồ Chí Minh', 21),
(22, 'Anna Miller', '0905554443', 'anna.miller@example.com', '159 Đường VWX, Quận 10, Thành phố Hồ Chí Minh', 22);

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(255) DEFAULT NULL,
  `mat_khau` varchar(255) DEFAULT NULL,
  `vai_tro` varchar(255) DEFAULT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `ten_dang_nhap`, `mat_khau`, `vai_tro`, `trang_thai`) VALUES
(1, 'admin', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 'Quản trị viên', 1),
(2, 'staff1', 'b99165cd2609bbb891390120ed2df1cb', 'nhân viên bán hàng', 1),
(3, 'staff2', '58a40d67814f7c33403552549c47e59f', 'nhân viên bán hàng', 1),
(4, 'manager1', '9b50bb25814ff13d1a38c5ec2393bceb', 'quản lý', 1),
(5, 'manager2', 'c3c2bd601f0ec6a02ed4a4e55cc15b0b', 'quản lý', 1),
(6, 'staff3', '039c75d23427e1081b521228cec7fabd', 'nhân viên tư vấn', 1),
(7, 'dvgiang', '5a30c9609b52fe348fb6925896e061de', 'Khách hàng', 1),
(8, 'nthanh123', '0cc175b9c0f1b6a831c399e269772661', 'khách hàng', 1),
(9, 'tranvanan111', '9ca92a21c8d996d3bf338e055418fb75', 'Khách hàng', 1),
(10, 'levankhang999', '5a63076094baf553c641307cbbff5b92', 'Khách hàng', 1),
(11, 'nvlinh777', '372f6a6744fcfe2a765356c41ca85d22', 'Khách hàng', 1),
(12, 'pvnammmm', '244beb9eb0e5eb8dec8391fd8360020f', 'Khách hàng', 1),
(13, 'john_doe', '61bd60c60d9fb60cc8fc7767669d40a1', 'Khách hàng', 1),
(14, 'sarah_smith', '42f749ade7f9e195bf475f37a44cafcb', 'Khách hàng', 1),
(15, 'mike_jones', 'f925916e2754e5e03f75dd58a5733251', 'Khách hàng', 1),
(16, 'emily_brown', 'd0aabe9a362cb2712ee90e04810902f3', 'Khách hàng', 1),
(17, 'david_wilson', 'c52b5afdc517074f9e56babd934edb2b', 'Khách hàng', 1),
(18, 'amy_carter', '11178edaf44a1555a847150ad697fcf7', 'Khách hàng', 1),
(19, 'chris_green', '46b48e7bfaa1b29af37177af17674e44', 'Khách hàng', 1),
(20, 'lisa_jackson', '906449b66d0c0f2a12836fd864094bd9', 'Khách hàng', 1),
(21, 'sam_roberts', 'c3f70a11636234afe331904dbc4b4992', 'Khách hàng', 1),
(22, 'anna_miller', '3f5bef187838d9cf326168d61686bf61', 'Khách hàng', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhap_kho`
--

CREATE TABLE `nhap_kho` (
  `id` int(11) NOT NULL,
  `id_nha_cung_cap` int(11) DEFAULT NULL,
  `ngay` datetime DEFAULT NULL,
  `tong_tien` decimal(15,3) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhap_kho`
--

INSERT INTO `nhap_kho` (`id`, `id_nha_cung_cap`, `ngay`, `tong_tien`, `ghi_chu`) VALUES
(1, 1, '2024-03-09 09:46:51', '830000000.000', '30 Samsung Galaxy S24 5G, 20 OPPO Reno11 5G'),
(2, 2, '2024-03-15 10:59:54', '87000000.000', '20 Nokia 215 4G, 50 Nokia 8210 4G'),
(3, 4, '2024-03-27 14:04:48', '1526850000.000', '21 iPhone 15 Pro Max, 30 iPhone 14 Pro Max'),
(4, 5, '2024-04-03 08:52:10', '1698830000.000', '30 Samsung Galaxy S24 Ultra 5G, 50 Samsung Galaxy A25 5G, 47 Samsung Galaxy M34 5G'),
(5, 4, '2024-04-09 21:52:10', '2647250000.000', '35 Samsung Galaxy Z Flip5 5G, 32 Samsung Galaxy Z Fold5 5G, 40 Samsung Galaxy S23 FE 5G'),
(6, 1, '2024-04-15 13:21:44', '1130638000.000', '32 iPhone 15, 52 OPPO Reno11 F 5G, 43 realme Note 50'),
(7, 4, '2024-05-16 15:21:44', '900570000.000', '29 iPhone 11, 44 iPhone 12'),
(8, 2, '2024-04-19 09:38:15', '87950000.000', '40 Nokia 110 4G Pro, 75 Nokia 105 4G Pro, 33 Nokia 105 '),
(9, 5, '2024-04-26 10:29:12', '1730795000.000', '22 OPPO Reno10 Pro 5G, 55 OPPO Find N3 Flip 5G, 33 OPPO Reno8 T 5G'),
(10, 5, '2024-05-02 07:47:48', '943700.000', '20 realme C55, 29 realme C67, 31 realme 11, 38 realme 11 Pro+ 5G  '),
(11, 5, '2024-05-08 16:47:48', '1389701000.000', '27 Xiaomi 14 5G, 32 Xiaomi Redmi Note 13 Pro 5G, 22 Xiaomi 13T Pro 5G, 26 Xiaomi Redmi Note 13, 21 Xiaomi Redmi 12'),
(12, 2, '2024-06-01 08:30:00', '55000000.000', '50 Nokia 110 4G Pro, 30 Nokia 8210 4G'),
(13, 4, '2024-06-02 10:00:00', '1850000000.000', '40 iPhone 15 Pro Max, 30 iPhone 14 Pro Max'),
(14, 5, '2024-06-03 14:15:00', '2150000000.000', '50 Samsung Galaxy S24 Ultra 5G, 40 Samsung Galaxy Z Fold5 5G, 30 OPPO Find N3 Flip 5G'),
(15, 1, '2024-06-04 09:45:00', '950000000.000', '40 Samsung Galaxy M34 5G, 30 Samsung Galaxy S23 FE 5G'),
(16, 5, '2024-06-05 11:30:00', '850000000.000', '50 realme 11 Pro+ 5G, 40 OPPO Reno10 Pro 5G'),
(17, 3, '2024-06-06 16:00:00', '120000000.000', '50 realme 11, 30 realme C55'),
(18, 2, '2024-06-07 13:45:00', '35000000.000', '30 Nokia 215 4G, 20 Nokia 105 4G Pro'),
(19, 5, '2024-06-08 10:15:00', '650000000.000', '40 OPPO Reno11 F 5G, 30 realme C67'),
(20, 4, '2024-06-09 15:30:00', '900000000.000', '30 iPhone 12, 20 iPhone 11'),
(21, 1, '2024-06-10 09:00:00', '1200000000.000', '50 Samsung Galaxy S24 5G, 30 Samsung Galaxy A25 5G'),
(22, 4, '2024-07-01 13:00:00', '750000000.000', '30 iPhone 15, 20 iPhone 14 Pro Max'),
(23, 5, '2024-07-02 09:30:00', '1200000000.000', '40 Samsung Galaxy Z Fold5 5G, 30 Samsung Galaxy S24 5G'),
(24, 1, '2024-07-03 15:45:00', '600000000.000', '30 Samsung Galaxy A25 5G, 20 Samsung Galaxy M34 5G'),
(25, 3, '2024-07-04 11:15:00', '500000000.000', '40 OPPO Reno11 5G, 30 OPPO Reno10 Pro 5G'),
(26, 2, '2024-07-05 14:30:00', '45000000.000', '30 Nokia 105 4G Pro, 20 Nokia 110 4G Pro'),
(27, 1, '2024-08-01 09:00:00', '900000000.000', '40 Samsung Galaxy A25 5G, 30 Samsung Galaxy S24 5G'),
(28, 4, '2024-08-02 13:15:00', '1500000000.000', '35 iPhone 15 Pro Max, 25 iPhone 14 Pro Max'),
(29, 5, '2024-08-03 10:30:00', '1800000000.000', '45 Samsung Galaxy Z Flip5 5G, 35 OPPO Find N3 Flip 5G'),
(30, 3, '2024-08-04 15:45:00', '600000000.000', '40 OPPO Reno11 F 5G, 30 realme 11 Pro+ 5G'),
(31, 2, '2024-08-05 11:15:00', '45000000.000', '30 Nokia 215 4G, 20 Nokia 105 4G Pro'),
(32, 4, '2024-08-06 14:30:00', '750000000.000', '25 iPhone 12, 20 iPhone 11'),
(33, 5, '2024-08-07 09:00:00', '850000000.000', '40 OPPO Reno10 Pro 5G, 30 realme C67'),
(34, 1, '2024-08-08 16:15:00', '1200000000.000', '35 Samsung Galaxy Z Fold5 5G, 25 Samsung Galaxy S23 FE 5G'),
(35, 2, '2024-08-09 13:45:00', '35000000.000', '30 Nokia 105 4G Pro, 20 Nokia 110 4G Pro'),
(36, 4, '2024-08-10 10:30:00', '1500000000.000', '40 Samsung Galaxy Z Fold5 5G, 30 iPhone 15 Pro Max'),
(42, 4, '2024-04-05 10:00:00', '600000000.000', '20 iPhone 12'),
(43, 5, '2024-04-12 14:00:00', '1200000000.000', '40 Samsung Galaxy Z Fold5 5G'),
(44, 2, '2024-04-22 09:30:00', '50000000.000', '50 Nokia 105 4G Pro, 30 Nokia 215 4G'),
(45, 4, '2024-06-03 10:00:00', '800000000.000', '30 iPhone 15 Pro Max'),
(46, 3, '2024-06-12 14:00:00', '600000000.000', '40 OPPO Reno10 Pro 5G, 30 realme 11 Pro+ 5G'),
(47, 4, '2024-06-22 11:30:00', '200000000.000', '30 realme 11');

-- --------------------------------------------------------

--
-- Table structure for table `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`id`, `ten`, `so_dien_thoai`, `email`, `dia_chi`) VALUES
(1, 'Thế giới di động', '02835100100', 'lienhe@thegioididong.com', '364 Cộng Hòa'),
(2, 'Nokia', '02838236894', 'chau.nguyen@nokia.com', '235 Đông Khởi'),
(3, 'Điện Thử Kim Thiên Bảo', '0907225889', 'letandanh999@gmail.com', '22-24 Đường Số 10'),
(4, 'Thương Mại Công Nghệ Bạch Long', '0869287135', 'marketing@bachlongmobile.com', '134 Trần Phú'),
(5, 'Bao La', '02835119060', NULL, '8/38 Đinh Bộ Lĩnh');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'builebichnhung123@gmail.com', '92225a85436f3ec91002c585d6985a41', '2024-05-07 11:59:26'),
(2, 'builebichnhung123@gmail.com', 'cfd33339b078eccae746fe6ffeebdf80', '2024-05-07 12:02:28'),
(3, 'builebichnhung123@gmail.com', '83f7d7a21ea306e59f95c8b0c248c73e', '2024-05-07 13:48:10'),
(4, 'builebichnhung123@gmail.com', 'd135dab974f4f59486f160cb7470a883', '2024-05-07 13:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `phan_quyen`
--

CREATE TABLE `phan_quyen` (
  `vai_tro` varchar(255) NOT NULL,
  `qlnhap_kho` tinyint(1) DEFAULT 0,
  `qlnha_cung_cap` tinyint(1) DEFAULT 0,
  `qlnguoi_dung` tinyint(1) DEFAULT 0,
  `qlkhach_hang` tinyint(1) DEFAULT 0,
  `qldon_hang` tinyint(1) DEFAULT 0,
  `qlsan_pham` tinyint(1) DEFAULT 0,
  `qldanh_muc` tinyint(1) DEFAULT 0,
  `qlbao_hanh` tinyint(1) DEFAULT 0,
  `qlbinh_luan` tinyint(1) DEFAULT 0,
  `qlgiam_gia` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phan_quyen`
--

INSERT INTO `phan_quyen` (`vai_tro`, `qlnhap_kho`, `qlnha_cung_cap`, `qlnguoi_dung`, `qlkhach_hang`, `qldon_hang`, `qlsan_pham`, `qldanh_muc`, `qlbao_hanh`, `qlbinh_luan`, `qlgiam_gia`) VALUES
('khách hàng', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('nhân viên bán hàng', 0, 0, 0, 0, 1, 1, 0, 1, 0, 1),
('nhân viên tư vấn', 0, 0, 0, 0, 0, 1, 0, 1, 1, 1),
('quản lý', 1, 1, 0, 1, 1, 1, 1, 1, 1, 1),
('Quản trị viên', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phieu_bao_hanh`
--

CREATE TABLE `phieu_bao_hanh` (
  `id` int(11) NOT NULL,
  `id_san_pham` int(11) DEFAULT NULL,
  `id_don_hang` int(11) DEFAULT NULL,
  `ngay_lap` datetime DEFAULT NULL,
  `ngay_het_han` datetime DEFAULT NULL,
  `tinh_trang` varchar(255) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phieu_bao_hanh`
--

INSERT INTO `phieu_bao_hanh` (`id`, `id_san_pham`, `id_don_hang`, `ngay_lap`, `ngay_het_han`, `tinh_trang`, `ghi_chu`) VALUES
(1, 6, 1, '2024-05-02 10:15:56', '2024-08-02 23:59:59', 'Đang bảo hành', NULL),
(2, 11, 2, '2024-05-02 11:13:46', '2024-08-02 23:59:59', 'Đang bảo hành', NULL),
(3, 2, 3, '2024-05-02 11:14:23', '2024-08-02 23:59:59', 'Chờ xử lý', 'Lỗi màn hình'),
(4, 15, 3, '2024-05-02 11:14:23', '2024-08-02 23:59:59', 'Đang bảo hành', NULL),
(5, 25, 4, '2024-05-02 11:15:23', '2024-08-02 23:59:59', 'Đang bảo hành', NULL),
(6, 1, 5, '2024-05-02 11:37:23', '2024-08-02 23:59:59', 'Chờ xử lý', 'Lỗi pin'),
(7, 10, 6, '2024-05-02 13:30:40', '2024-07-02 23:59:59', 'Đang bảo hành', NULL),
(8, 8, 7, '2024-05-02 14:29:55', '2024-08-02 23:59:59', 'Đang bảo hành', NULL),
(9, 12, 8, '2024-05-02 14:45:55', '2024-08-02 23:59:59', 'Đang bảo hành', NULL),
(10, 17, 8, '2024-05-02 14:45:55', '2024-08-02 23:59:59', 'Đang bảo hành', NULL),
(11, 21, 9, '2024-05-02 15:44:55', '2024-08-02 23:59:59', 'Đang bảo hành', NULL),
(12, 24, 9, '2024-05-02 15:44:55', '2024-08-02 23:59:59', 'Đang bảo hành', NULL),
(13, 4, 10, '2024-05-02 16:36:40', '2024-08-02 23:59:59', 'Đang bảo hành', NULL),
(14, 14, 11, '2024-05-03 08:14:00', '2024-08-03 23:59:59', 'Đang bảo hành', ''),
(15, 16, 12, '2024-05-03 10:16:00', '2024-08-03 23:59:59', 'Đang bảo hành', ''),
(16, 5, 13, '2024-05-03 11:15:58', '2024-08-03 23:59:59', 'Đang bảo hành', NULL),
(17, 26, 14, '2024-05-14 14:14:58', '2024-08-03 23:59:59', 'Đang bảo hành', NULL),
(18, 21, 15, '2024-05-03 15:21:35', '2024-08-03 23:59:59', 'Đang bảo hành', NULL),
(19, 19, 15, '2024-05-03 15:21:35', '2024-08-03 23:59:59', 'Đang bảo hành', NULL),
(20, 15, 16, '2024-05-03 16:15:35', '2024-08-03 23:59:59', 'Đang bảo hành', NULL),
(21, 10, 17, '2024-05-04 08:39:38', '2024-08-04 23:59:59', 'Đang bảo hành', NULL),
(22, 9, 18, '2024-05-04 09:39:38', '2024-08-04 23:59:59', 'Đang bảo hành', NULL),
(23, 13, 19, '2024-05-04 10:39:38', '2024-08-04 23:59:59', 'Đang bảo hành', NULL),
(24, 25, 20, '2024-05-04 13:39:38', '2024-08-04 23:59:59', 'Đang bảo hành', NULL),
(25, 18, 21, '2024-05-04 14:39:38', '2024-08-04 23:59:59', 'Đang bảo hành', NULL),
(26, 8, 22, '2024-05-04 15:43:38', '2024-08-04 23:59:59', 'Đang bảo hành', NULL),
(27, 14, 23, '2024-05-05 08:58:21', '2024-08-05 23:59:59', 'Đang bảo hành', NULL),
(28, 20, 24, '2024-05-05 09:58:21', '2024-08-05 23:59:59', 'Đang bảo hành', NULL),
(29, 23, 24, '2024-05-05 09:58:21', '2024-08-05 23:59:59', 'Đang bảo hành', NULL),
(30, 7, 25, '2024-05-05 10:58:21', '2024-08-05 23:59:59', 'Đang bảo hành', NULL),
(31, 11, 26, '2024-05-05 13:58:21', '2024-08-05 23:59:59', 'Đang bảo hành', NULL),
(32, 27, 27, '2024-05-05 14:58:21', '2024-08-05 23:59:59', 'Đang bảo hành', NULL),
(33, 15, 28, '2024-05-05 16:58:21', '2024-08-05 23:59:59', 'Đang bảo hành', NULL),
(34, 2, 78, '2024-05-14 12:23:24', '2024-08-14 00:00:00', 'Đang bảo hành', ''),
(35, 3, 78, '2024-05-14 12:23:24', '2024-08-14 00:00:00', 'Đang bảo hành', ''),
(36, 4, 78, '2024-05-14 12:23:24', '2024-08-14 00:00:00', 'Đang bảo hành', ''),
(37, 1, 78, '2024-05-14 12:23:24', '2024-08-14 00:00:00', 'Đang bảo hành', '');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `anh` varchar(255) DEFAULT NULL,
  `id_danh_muc` int(11) DEFAULT NULL,
  `gia` decimal(10,2) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten`, `anh`, `id_danh_muc`, `gia`, `so_luong`, `mo_ta`) VALUES
(1, 'Samsung Galaxy S24 5G', 'Samsung_Galaxy_S24_5G.png', 1, '22990000.00', 28, 'Thiết kế đẹp mắt, camera chất lượng cao, hỗ trợ 5G.'),
(2, 'Nokia 8210 4G', 'Nokia_8210_4G.png', 6, '1590000.00', 48, 'Phiên bản mới của Nokia 8210, hỗ trợ kết nối 4G.'),
(3, 'iPhone 15', 'iPhone_15.png', 2, '22990000.00', 31, 'iPhone mới nhất với nhiều tính năng đột phá.'),
(4, 'OPPO Reno11 5G', 'OPPO_Reno11_5G.png', 3, '10990000.00', 19, 'OPPO Reno11 hỗ trợ 5G, camera sắc nét.'),
(5, 'Samsung Galaxy S24 Ultra 5G', 'Samsung_Galaxy_S24_Ultra_5G.png', 1, '37490000.00', 29, 'Phiên bản cao cấp của Samsung Galaxy S24, hỗ trợ 5G.'),
(6, 'Samsung Galaxy A25 5G', 'Samsung_Galaxy_A25_5G.png', 1, '6990000.00', 49, 'Samsung Galaxy A25 hỗ trợ kết nối 5G, pin trâu.'),
(7, 'Samsung Galaxy Z Flip5 5G', 'Samsung_Galaxy_Z_Flip5_5G.png', 1, '25990000.00', 34, 'Thiết kế gập gọn độc đáo, màn hình AMOLED.'),
(8, 'Samsung Galaxy Z Fold5 5G', 'Samsung_Galaxy_Z_Fold5_5G.png', 1, '40990000.00', 30, 'Thiết kế màn hình gập, sử dụng công nghệ màn hình mới.'),
(9, 'Samsung Galaxy M34 5G', 'Samsung_Galaxy_M34_5G.png', 1, '7990000.00', 46, 'Samsung Galaxy M34 với thiết kế hiện đại, camera đa chức năng.'),
(10, 'Samsung Galaxy S23 FE 5G', 'Samsung_Galaxy_S23_FE_5G.png', 1, '14890000.00', 38, 'Phiên bản Fan Edition của Samsung Galaxy S23, hỗ trợ 5G.'),
(11, 'iPhone 15 Pro Max', 'iPhone_15_Pro_Max.png', 2, '34990000.00', 19, 'Phiên bản cao cấp nhất của iPhone 15, hiệu năng mạnh mẽ.'),
(12, 'iPhone 14 Pro Max', 'iPhone_14_Pro_Max.png', 2, '29490000.00', 29, 'iPhone 14 Pro Max với camera chất lượng cao.'),
(13, 'iPhone 11', 'iPhone_11.png', 2, '11790000.00', 28, 'iPhone 11, một trong những dòng sản phẩm phổ biến của Apple.'),
(14, 'iPhone 12', 'iPhone_12.png', 2, '14890000.00', 42, 'iPhone 12, tính năng và hiệu năng ấn tượng.'),
(15, 'OPPO Reno11 F 5G', 'OPPO_Reno11_F_5G.png', 3, '8990000.00', 49, 'OPPO Reno11 phiên bản thân thiện với ngân sách, hỗ trợ 5G.'),
(16, 'OPPO Reno10 Pro 5G', 'OPPO_Reno10_Pro_5G.png', 3, '13990000.00', 20, 'OPPO Reno10 Pro, hiệu năng ổn định, camera chất lượng.'),
(17, 'OPPO Find N3 Flip 5G', 'OPPO_Find_N3_Flip_5G.png', 3, '22990000.00', 54, 'Thiết kế gập độc đáo, camera chất lượng cao.'),
(18, 'OPPO Reno8 T 5G', 'OPPO_Reno8_T_5G.png', 3, '10990000.00', 32, 'OPPO Reno8 T, smartphone 5G với giá phải chăng.'),
(19, 'Nokia 215 4G', 'Nokia_215_4G.png', 6, '990000.00', 19, 'Nokia 215, điện thoại cơ bản hỗ trợ kết nối 4G.'),
(20, 'Nokia 110 4G Pro', 'Nokia_110_4G_Pro.png', 6, '720000.00', 39, 'Nokia 110 4G Pro, phiên bản mới với nhiều tính năng hấp dẫn.'),
(21, 'Nokia 105 4G Pro', 'Nokia_105_4G_Pro.png', 6, '680000.00', 73, 'Nokia 105 4G Pro, điện thoại cơ bản hỗ trợ kết nối 4G.'),
(22, 'Nokia 105', 'Nokia_105.png', 6, '590000.00', 33, 'Nokia 105, điện thoại cơ bản với pin lâu.'),
(23, 'realme Note 50', 'realme_Note_50.png', 4, '2490000.00', 42, 'realme Note 50, thiết kế trẻ trung, hiệu năng mạnh mẽ.'),
(24, 'realme C55', 'realme_C55.png', 3, '4990000.00', 19, 'realme C55, smartphone đa dụng với giá cả hợp lý.'),
(25, 'realme C67', 'realme_C67.png', 4, '4790000.00', 27, 'realme C67, tính năng đáp ứng nhu cầu sử dụng hàng ngày.'),
(26, 'realme 11', 'realme_11.png', 4, '7990000.00', 30, 'realme 11, thiết kế đẹp, camera chất lượng.'),
(27, 'realme 11 Pro+ 5G', 'realme_11_Pro_Plus.png', 4, '14990000.00', 37, 'realme 11 Pro+ 5G, smartphone 5G cao cấp.'),
(28, 'Xiaomi 14 5G', 'Xiaomi_14_5G.png', 5, '24490000.00', 27, 'Xiaomi 14 5G, thiết kế sang trọng, hiệu năng mạnh mẽ.'),
(29, 'Xiaomi Redmi Note 13 Pro 5G', 'Xiaomi_13T_Pro_5G.png', 5, '9490000.00', 32, 'Xiaomi Redmi Note 13 Pro 5G, camera nổi bật.'),
(30, 'Xiaomi 13T Pro 5G', 'Xiaomi_13T_Pro_5G.png', 5, '14990000.00', 22, 'Xiaomi 13T Pro 5G, smartphone 5G tích hợp nhiều tính năng.'),
(31, 'Xiaomi Redmi Note 13', 'Xiaomi_Redmi_Note_13.png', 5, '5290000.00', 26, 'Xiaomi Redmi Note 13, thiết kế đẹp, pin trâu.'),
(32, 'Xiaomi Redmi 12', 'Xiaomi_Redmi_12.png', 5, '3490000.00', 21, 'Xiaomi Redmi 12, smartphone tầm trung đáng mua.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang_ibfk_1` (`id_khach_hang`),
  ADD KEY `id_san_pham_ibfk_1` (`id_san_pham`);

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_don_hang_ibfk_1` (`id_don_hang`),
  ADD KEY `chi_tiet_don_hang_ibfk_2` (`id_san_pham`);

--
-- Indexes for table `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_nhap_kho_ibfk_2` (`id_san_pham`),
  ADD KEY `chi_tiet_nhap_kho_ibfk_1` (`id_nhap_kho`);

--
-- Indexes for table `danh_muc_san_pham`
--
ALTER TABLE `danh_muc_san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_dat_hang_ibfk_1` (`id_khach_hang`);

--
-- Indexes for table `giam_gia`
--
ALTER TABLE `giam_gia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `khach_hang_ibfk_1` (`id_nguoi_dung`);

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`),
  ADD KEY `fk_vai_tro` (`vai_tro`);

--
-- Indexes for table `nhap_kho`
--
ALTER TABLE `nhap_kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhap_kho_ibfk_1` (`id_nha_cung_cap`);

--
-- Indexes for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phan_quyen`
--
ALTER TABLE `phan_quyen`
  ADD PRIMARY KEY (`vai_tro`);

--
-- Indexes for table `phieu_bao_hanh`
--
ALTER TABLE `phieu_bao_hanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phieu_bao_hanh_ibfk_1` (`id_san_pham`),
  ADD KEY `phieu_bao_hanh_ibfk_2` (`id_don_hang`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_ibfk_1` (`id_danh_muc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `danh_muc_san_pham`
--
ALTER TABLE `danh_muc_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `giam_gia`
--
ALTER TABLE `giam_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `nhap_kho`
--
ALTER TABLE `nhap_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phieu_bao_hanh`
--
ALTER TABLE `phieu_bao_hanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `id_khach_hang_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_san_pham_ibfk_1` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`id_don_hang`) REFERENCES `don_dat_hang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  ADD CONSTRAINT `chi_tiet_nhap_kho_ibfk_1` FOREIGN KEY (`id_nhap_kho`) REFERENCES `nhap_kho` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chi_tiet_nhap_kho_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  ADD CONSTRAINT `don_dat_hang_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD CONSTRAINT `khach_hang_ibfk_1` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD CONSTRAINT `fk_vai_tro` FOREIGN KEY (`vai_tro`) REFERENCES `phan_quyen` (`vai_tro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nhap_kho`
--
ALTER TABLE `nhap_kho`
  ADD CONSTRAINT `nhap_kho_ibfk_1` FOREIGN KEY (`id_nha_cung_cap`) REFERENCES `nha_cung_cap` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `phieu_bao_hanh`
--
ALTER TABLE `phieu_bao_hanh`
  ADD CONSTRAINT `phieu_bao_hanh_ibfk_1` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `phieu_bao_hanh_ibfk_2` FOREIGN KEY (`id_don_hang`) REFERENCES `don_dat_hang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc_san_pham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
