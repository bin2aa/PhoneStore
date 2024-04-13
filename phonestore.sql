-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 11:11 AM
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
(1, 42, 16, 2, '100.00'),
(2, 42, 17, 1, '133.00'),
(3, 43, 16, 1, '100.00'),
(4, 44, 16, 2, '100.00'),
(5, 46, 16, 1, '100.00'),
(6, 46, 19, 2, '1.00'),
(7, 47, 16, 1, '100.00'),
(8, 47, 18, 1, '123.00'),
(9, 47, 19, 2, '1.00'),
(10, 48, 16, 1, '100.00'),
(11, 48, 17, 1, '133.00'),
(12, 49, 16, 2, '100.00'),
(13, 49, 19, 3, '1.00'),
(14, 50, 16, 3, '100.00'),
(15, 50, 17, 2, '133.00'),
(16, 51, 16, 6, '100.00'),
(17, 52, 16, 2, '100.00'),
(18, 52, 17, 2, '133.00'),
(19, 53, 16, 2, '100.00'),
(20, 53, 17, 6, '133.00'),
(21, 54, 16, 3, '100.00'),
(22, 54, 18, 3, '123.00'),
(23, 54, 17, 1, '133.00'),
(24, 55, 16, 1, '100.00'),
(25, 56, 16, 2, '100.00'),
(26, 57, 39, 11, '3.00'),
(27, 58, 26, 2, '3.00'),
(28, 58, 16, 1, '100.00'),
(29, 58, 44, 1, '3.00'),
(30, 59, 16, 1, '100.00'),
(31, 60, 16, 1, '100.00'),
(32, 61, 16, 1, '100.00'),
(33, 66, 16, 1, '100.00'),
(34, 66, 18, 1, '123.00'),
(35, 66, 19, 1, '1.00'),
(36, 67, 44, 3, '3.00'),
(37, 68, 45, 1, '3.00'),
(38, 69, 16, 1, '100.00'),
(39, 70, 26, 2, '3.00'),
(40, 71, 16, 2, '100.00'),
(41, 72, 16, 1, '100.00'),
(42, 73, 16, 1, '100.00'),
(43, 74, 16, 1, '100.00'),
(44, 75, 16, 2, '100.00'),
(45, 76, 16, 3, '100.00'),
(46, 77, 16, 1, '100.00'),
(47, 78, 16, 1, '100.00'),
(48, 79, 16, 1, '100.00'),
(49, 80, 16, 2, '100.00'),
(50, 81, 40, 4, '3.00'),
(51, 82, 17, 2, '133.00');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_nhap_kho`
--

CREATE TABLE `chi_tiet_nhap_kho` (
  `id` int(11) NOT NULL,
  `id_nhap_kho` int(11) DEFAULT NULL,
  `id_san_pham` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `gia` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chi_tiet_nhap_kho`
--

INSERT INTO `chi_tiet_nhap_kho` (`id`, `id_nhap_kho`, `id_san_pham`, `so_luong`, `gia`) VALUES
(1, 42, 16, 3, '3000.00'),
(2, 42, 17, 131, '1313.00'),
(3, 43, 16, 10, '3.00'),
(4, 43, 17, 20, '4.00'),
(5, 44, 16, 5, '3.00'),
(6, 45, 17, 3, '3.00'),
(7, 46, 16, 2, '2.00'),
(8, 46, 17, 3, '3.00'),
(9, 47, 16, 4, '1.00'),
(10, 48, 17, 2, '2.00'),
(11, 49, 16, 1, '1.00'),
(12, 50, 16, 10, '3.00'),
(13, 51, 16, 1000, '20.00'),
(14, 52, 16, 1, '1.00'),
(15, 52, 16, 1, '1.00'),
(17, 53, 16, 3, '3.00'),
(18, 53, 40, 2, '2.00'),
(19, 54, 16, 3113, '1313.00'),
(20, 54, 19, 123123, '1233.00'),
(21, 55, 39, 123, '133.00');

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
(3, 'a'),
(4, 'b'),
(5, 'n');

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
(32, 5, '2024-03-22 00:00:00', '60000.00', '', 'Đang giao'),
(33, 5, '2024-03-22 00:00:00', '50000.00', '', 'Đang xử lý'),
(35, 5, '2024-03-22 00:00:00', '30000.00', 'aaa', 'Đang xử lý'),
(36, 5, '2024-03-22 00:00:00', '30000.00', '', 'Chờ xác nhận'),
(37, 5, '2024-03-22 00:00:00', '50000.00', '123', 'Chờ xác nhận'),
(38, 5, '2024-03-22 00:00:00', '20000.00', '', 'Chờ xác nhận'),
(39, 5, '2024-03-22 00:00:00', '20000.00', '312312', 'Chờ xác nhận'),
(40, 5, '2024-03-22 00:00:00', '20000.00', 'ffffffff', 'Chờ xác nhận'),
(41, 5, '2024-03-22 00:00:00', '20000.00', '', 'Chờ xác nhận'),
(42, 5, '2024-03-22 00:00:00', '30000.00', '444444', 'Chờ xác nhận'),
(43, 5, '2024-03-23 00:00:00', '10000.00', '', 'Chờ xác nhận'),
(44, 6, '2024-03-23 00:00:00', '20000.00', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 'Chờ xác nhận'),
(46, 5, '2024-03-23 00:00:00', '30000.00', '123', 'Chờ xác nhận'),
(47, 5, '2024-03-23 00:00:00', '40000.00', '', 'Chờ xác nhận'),
(48, 5, '2024-03-23 00:00:00', '233000.00', '', 'Chờ xác nhận'),
(49, 8, '2024-03-24 00:00:00', '203000.00', 'ád', 'Chờ xác nhận'),
(50, 5, '2024-03-25 00:00:00', '566000.00', '3', 'Chờ xác nhận'),
(51, 5, '2024-03-25 00:00:00', '600000.00', '', 'Chờ xác nhận'),
(52, 9, '2024-03-25 00:00:00', '466000.00', '', 'Chờ xác nhận'),
(53, 9, '2024-03-25 00:00:00', '998000.00', '3', 'Chờ xác nhận'),
(54, 5, '2024-03-27 00:00:00', '802000.00', 'ajsbdasjbd', 'Chờ xác nhận'),
(55, 8, '2024-04-02 00:00:00', '100000.00', '', 'Chờ xác nhận'),
(56, 5, '2024-04-02 00:00:00', '200000.00', '', 'Chờ xác nhận'),
(57, 5, '2024-04-02 00:00:00', '33000.00', '', 'Chờ xác nhận'),
(58, 8, '2024-04-02 00:00:00', '109000.00', 'oooooooooooooooo', 'Chờ xác nhận'),
(59, 5, '2024-04-05 00:00:00', '100000.00', '', 'Chờ xác nhận'),
(60, 5, '2024-04-07 00:00:00', '100000.00', '', 'Chờ xác nhận'),
(61, 5, '2024-04-07 11:53:59', '100000.00', '', 'Chờ xác nhận'),
(62, 5, '2024-04-10 17:01:00', '3.00', 'adasdasdasdTHinhj', 'Đang xử lý'),
(64, 5, '2024-04-19 17:04:00', '30132.00', '4124124', 'Chờ xác nhận'),
(65, 5, '2024-04-18 17:07:00', '31312.00', '3', 'Chờ xác nhận'),
(66, 5, '2024-04-07 19:51:49', '224000.00', '4321', 'Chờ xác nhận'),
(67, 5, '2024-04-07 23:34:38', '9000.00', '', 'Chờ xác nhận'),
(68, 5, '2024-04-07 23:36:31', '3000.00', '', 'Chờ xác nhận'),
(69, 5, '2024-04-07 23:40:01', '100000.00', '', 'Chờ xác nhận'),
(70, 5, '2024-04-08 01:29:59', '6000.00', '', 'Chờ xác nhận'),
(71, 5, '2024-04-08 01:48:21', '200000.00', '', 'Chờ xác nhận'),
(72, 5, '2024-04-08 02:03:51', '100000.00', '', 'Chờ xác nhận'),
(73, 5, '2024-04-08 02:04:16', '100000.00', '', 'Chờ xác nhận'),
(74, 5, '2024-04-08 02:07:21', '100000.00', '', 'Chờ xác nhận'),
(75, 5, '2024-04-08 02:08:42', '200000.00', '', 'Chờ xác nhận'),
(76, 5, '2024-04-08 02:09:19', '300000.00', '', 'Chờ xác nhận'),
(77, 5, '2024-04-08 02:11:55', '100000.00', '', 'Chờ xác nhận'),
(78, 5, '2024-04-08 02:13:00', '100000.00', '', 'Chờ xác nhận'),
(79, 5, '2024-04-08 02:13:32', '100000.00', '', 'Chờ xác nhận'),
(80, 5, '2024-04-08 02:13:54', '200000.00', '', 'Chờ xác nhận'),
(81, 5, '2024-04-08 12:49:47', '12000.00', '', 'Chờ xác nhận'),
(82, 5, '2024-04-10 14:56:39', '266000.00', '123', 'Chờ xác nhận');

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
(5, '1', '113131', '123123123@gmail.com', '11', 1),
(6, 'bin', '123', '123asd@gmail.com', '123123', 5),
(7, 'Con', '0000003012', 'Con@gmail.com', 'c', 9),
(8, 'd', 'd', 'd@gmail.com', 'd', 12),
(9, 'e', '03371476884', 'e@gmail.com', 'e', 13),
(10, '2', '2', '2@gmail.com', '2', 21);

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(255) DEFAULT NULL,
  `mat_khau` varchar(255) DEFAULT NULL,
  `vai_tro` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `ten_dang_nhap`, `mat_khau`, `vai_tro`) VALUES
(1, 'a', '0cc175b9c0f1b6a831c399e269772661', 'Quản trị viên'),
(5, 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'Khách hàng'),
(9, 'c', '4a8a08f09d37b73795649038408b5f33', 'Khách hàng'),
(12, 'd', '8277e0910d750195b448797616e091ad', 'Khách hàng'),
(13, 'e', 'e1671797c52e15f763380b45e841ec32', 'Khách hàng'),
(18, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Quản trị viên'),
(19, '2', 'c81e728d9d4c2f636f067f89cc14862c', 'Nhân viên bán hàng'),
(21, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `nhap_kho`
--

CREATE TABLE `nhap_kho` (
  `id` int(11) NOT NULL,
  `id_nha_cung_cap` int(11) DEFAULT NULL,
  `ngay` date DEFAULT NULL,
  `tong_tien` decimal(10,2) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhap_kho`
--

INSERT INTO `nhap_kho` (`id`, `id_nha_cung_cap`, `ngay`, `tong_tien`, `ghi_chu`) VALUES
(42, 6, '2024-03-21', '181003.00', '123'),
(43, 6, '2024-03-08', '110.00', '1'),
(44, 6, '2024-03-14', '15.00', ''),
(45, 6, '2024-03-14', '9.00', ''),
(46, 6, '2024-03-14', '13.00', ''),
(47, 6, '2024-03-01', '4.00', ''),
(48, 6, '2024-03-15', '4.00', ''),
(49, 6, '2024-02-29', '1.00', ''),
(50, 6, '2024-03-22', '30.00', '3'),
(51, 6, '2024-03-13', '20000.00', ''),
(52, 6, '2024-03-15', '2.00', ''),
(53, 6, '2024-03-22', '13.00', '1'),
(54, 7, '2024-03-07', '99999999.99', '3'),
(55, 7, '2024-04-18', '16359.00', 'ád');

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
(6, 'Thịnh', '0337147684', 'asjdasdasdsd@gmail.com', '333 Âu cơ'),
(7, 'Bin', '123123123', 'binbinddd@gmail.com', '1213/313');

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
  `qlbao_hanh` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phan_quyen`
--

INSERT INTO `phan_quyen` (`vai_tro`, `qlnhap_kho`, `qlnha_cung_cap`, `qlnguoi_dung`, `qlkhach_hang`, `qldon_hang`, `qlsan_pham`, `qldanh_muc`, `qlbao_hanh`) VALUES
('3', 1, 0, 0, 0, 0, 0, 0, 0),
('Khách hàng', 0, 0, 0, 0, 0, 0, 0, 0),
('Nhân viên bán hàng', 1, 1, 1, 1, 1, 1, 1, 1),
('Quản trị viên', 1, 1, 1, 1, 1, 1, 1, 1),
('Tư vấn', 0, 0, 0, 0, 0, 0, 0, 1);

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
(1, 17, 32, '2024-04-01 00:00:00', '2024-04-07 00:00:00', 'Hết hạn bảo hành', 'áudbkasjdkasadasdasdasdasd\r\nádasd\r\náda'),
(3, 16, 32, '2024-04-01 00:00:00', '2024-04-04 00:00:00', 'Hết hạn bảo hành', 'h'),
(4, 16, 60, '2024-04-07 00:00:00', '2024-07-07 00:00:00', 'Đang bảo hành', ''),
(5, 16, 61, '2024-04-07 00:00:00', '2024-07-07 00:00:00', 'Đang bảo hành', ''),
(6, 16, 66, '2024-04-07 19:51:49', '2024-07-07 00:00:00', 'Đang bảo hành', '322 '),
(7, 18, 66, '2024-04-07 19:51:49', '2024-07-07 00:00:00', 'Chờ xử lý', '  '),
(8, 19, 66, '2024-04-07 19:51:49', '2024-07-07 00:00:00', 'Đang bảo hành', ''),
(9, 44, 67, '2024-04-07 23:34:38', '2024-07-07 00:00:00', 'Đang bảo hành', ''),
(10, 45, 68, '2024-04-07 23:36:31', '2024-07-07 00:00:00', 'Đang bảo hành', ''),
(11, 16, 69, '2024-04-07 23:40:01', '2024-07-07 00:00:00', 'Chờ xử lý', 'aa'),
(12, 26, 70, '2024-04-08 01:29:59', '2024-07-08 00:00:00', 'Đang bảo hành', ''),
(13, 16, 71, '2024-04-08 01:48:21', '2024-07-08 00:00:00', 'Đang bảo hành', ''),
(14, 16, 72, '2024-04-08 02:03:51', '2024-07-08 00:00:00', 'Đang bảo hành', ''),
(15, 16, 73, '2024-04-08 02:04:16', '2024-07-08 00:00:00', 'Đang bảo hành', ''),
(16, 16, 74, '2024-04-08 02:07:21', '2024-07-08 00:00:00', 'Đang bảo hành', ''),
(17, 16, 75, '2024-04-08 02:08:42', '2024-07-08 00:00:00', 'Đang bảo hành', ''),
(18, 16, 76, '2024-04-08 02:09:19', '2024-07-08 00:00:00', 'Đang bảo hành', ''),
(19, 16, 77, '2024-04-08 02:11:55', '2024-07-08 00:00:00', 'Đang bảo hành', ''),
(20, 16, 78, '2024-04-08 02:13:00', '2024-07-08 00:00:00', 'Đang bảo hành', ''),
(21, 16, 79, '2024-04-08 02:13:32', '2024-07-08 00:00:00', 'Đang bảo hành', ''),
(22, 16, 80, '2024-04-08 02:13:54', '2024-07-08 00:00:00', 'Đang bảo hành', ''),
(23, 40, 81, '2024-04-08 12:49:47', '2024-07-08 00:00:00', 'Chờ xử lý', 'Máy hư màng hình'),
(24, 17, 82, '2024-04-10 14:56:39', '2024-07-10 00:00:00', 'Đang bảo hành', '');

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
(16, 'a', 'Screenshot 2024-03-01 221351.png', 3, '100.00', 0, 'a'),
(17, 'ád', '31214010040-theSV.jpg', 3, '133.00', 147, '3'),
(18, 'Aa', '', 3, '123.00', -3, 'a'),
(19, '1', 'abc.png', 5, '1.00', 123123, ''),
(26, '3', 'abc.png', 5, '3.00', -1, ''),
(39, '3', '', 3, '3.00', 115, '3'),
(40, '3', '', 3, '3.00', 1, '3'),
(41, '3', '', 3, '3.00', 3, '3'),
(44, '3', 'abc.png', 3, '3.00', -1, '3\r\n'),
(45, '3', 'abc.png', 3, '3.00', 2, '3');

--
-- Indexes for dumped tables
--

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
  ADD KEY `chi_tiet_nhap_kho_ibfk_1` (`id_nhap_kho`),
  ADD KEY `chi_tiet_nhap_kho_ibfk_2` (`id_san_pham`);

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
  ADD KEY `id_khach_hang` (`id_khach_hang`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`),
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
  ADD KEY `id_nha_cung_cap` (`id_nha_cung_cap`);

--
-- Indexes for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
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
  ADD KEY `id_san_pham` (`id_san_pham`),
  ADD KEY `id_don_hang` (`id_don_hang`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_danh_muc` (`id_danh_muc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `danh_muc_san_pham`
--
ALTER TABLE `danh_muc_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `nhap_kho`
--
ALTER TABLE `nhap_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `phieu_bao_hanh`
--
ALTER TABLE `phieu_bao_hanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`id_don_hang`) REFERENCES `don_dat_hang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  ADD CONSTRAINT `chi_tiet_nhap_kho_ibfk_1` FOREIGN KEY (`id_nhap_kho`) REFERENCES `nhap_kho` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chi_tiet_nhap_kho_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  ADD CONSTRAINT `don_dat_hang_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id`);

--
-- Constraints for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD CONSTRAINT `khach_hang_ibfk_1` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`);

--
-- Constraints for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD CONSTRAINT `fk_vai_tro` FOREIGN KEY (`vai_tro`) REFERENCES `phan_quyen` (`vai_tro`) ON DELETE CASCADE;

--
-- Constraints for table `nhap_kho`
--
ALTER TABLE `nhap_kho`
  ADD CONSTRAINT `nhap_kho_ibfk_1` FOREIGN KEY (`id_nha_cung_cap`) REFERENCES `nha_cung_cap` (`id`);

--
-- Constraints for table `phieu_bao_hanh`
--
ALTER TABLE `phieu_bao_hanh`
  ADD CONSTRAINT `phieu_bao_hanh_ibfk_1` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`),
  ADD CONSTRAINT `phieu_bao_hanh_ibfk_2` FOREIGN KEY (`id_don_hang`) REFERENCES `don_dat_hang` (`id`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc_san_pham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
