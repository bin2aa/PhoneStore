-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 12:10 PM
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
(19, 17, 5, '1', '2024-04-24 21:13:40'),
(20, 17, 5, '2', '2024-04-24 21:13:44'),
(21, 17, 5, '3', '2024-04-24 21:13:48'),
(22, 17, 5, '4', '2024-04-24 21:13:54'),
(23, 17, 5, '5', '2024-04-24 21:14:00'),
(24, 17, 5, '6', '2024-04-24 21:14:05'),
(25, 17, 5, '7', '2024-04-24 21:14:10'),
(26, 17, 5, '8', '2024-04-24 21:14:14'),
(27, 17, 5, 'hàng dỏm\r\n', '2024-04-24 21:20:50'),
(28, 17, 5, 'okok', '2024-04-25 13:47:01'),
(29, 17, 5, 'a', '2024-04-25 16:04:41'),
(30, 17, 5, '1', '2024-04-25 16:17:24'),
(101, 16, 5, 'a', '2024-04-28 01:51:55'),
(102, 16, 5, 'a', '2024-04-28 01:51:57'),
(103, 17, 5, 'a', '2024-04-28 01:53:47'),
(104, 17, 5, '123', '2024-04-28 01:55:39'),
(105, 17, 5, '3a', '2024-04-28 01:56:59');

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
(26, NULL, 39, 11, '3.00'),
(27, NULL, 26, 2, '3.00'),
(28, NULL, 16, 1, '100.00'),
(29, NULL, 44, 1, '3.00'),
(30, NULL, 16, 1, '100.00'),
(31, NULL, 16, 1, '100.00'),
(32, 61, 16, 1, '100.00'),
(33, 66, 16, 1, '100.00'),
(34, 66, 18, 1, '123.00'),
(35, 66, 19, 1, '1.00'),
(36, 67, 44, 3, '3.00'),
(37, 68, NULL, 1, '3.00'),
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
(51, 82, 17, 2, '133.00'),
(52, 83, 17, 1, '133.00'),
(53, 84, 17, 1, '133.00'),
(54, 85, 17, 1, '133.00'),
(55, 86, 17, 1, '133.00'),
(56, 87, 16, 3, '100.00'),
(57, 88, 17, 4, '133.00'),
(58, 89, 16, 6, '100.00'),
(59, 90, 16, 6, '100.00'),
(60, 91, 16, 6, '100.00'),
(61, 93, 16, 3, '100.00'),
(62, 94, 16, 2, '100.00'),
(63, NULL, 17, 2, '133.00'),
(64, NULL, 17, 5, '133.00'),
(65, NULL, 17, 3, '133.00'),
(66, NULL, 17, 1, '133.00'),
(67, NULL, 17, 1, '133.00'),
(68, 130, 17, 1, '133.00'),
(69, 131, 17, 1, '133.00'),
(70, 132, 26, 1, '3.00'),
(71, 133, 16, 1, '100.00'),
(72, 134, 17, 1, '133.00'),
(73, 135, 17, 1, '133.00'),
(74, 136, 16, 1, '100.00'),
(75, NULL, 16, 1, '100.00'),
(76, NULL, 16, 1, '100.00'),
(77, NULL, 16, 1, '100.00'),
(78, NULL, 17, 1, '133.00'),
(79, NULL, 17, 1, '133.00'),
(80, NULL, 17, 1, '133.00'),
(81, NULL, 16, 1, '100.00'),
(82, NULL, 19, 1, '1.00'),
(83, NULL, 17, 1, '133.00'),
(84, NULL, 19, 1, '1.00'),
(85, 149, 19, 1, '1.00'),
(86, 151, 19, 1, '1.00'),
(87, 152, 16, 1, '100.00'),
(88, 154, 16, 1, '100.00'),
(89, 155, 17, 1, '133.00'),
(90, 155, 18, 1, '123.00'),
(91, 155, 16, 1, '100.00');

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
(33, 67, 39, 12, '4.00'),
(34, 68, 16, 2, '3.00'),
(35, 69, 16, 123, '3.00'),
(36, 70, 16, 123, '3.00'),
(37, 71, 26, 123, '3.00'),
(38, 72, 26, 123, '3.00'),
(39, 73, 16, 3, '3.00'),
(40, 74, 16, 3, '3.00'),
(41, 75, 46, 13, '13.00'),
(42, 76, 16, 2, '31.00'),
(43, 77, 16, 1, '987.00'),
(44, 78, 16, 2, '23.00'),
(45, 79, 16, 2, '32.00'),
(46, 79, 16, 3, '5.00'),
(47, 79, 16, 4, '6.00'),
(48, 80, 16, 2, '3.00'),
(49, 80, 16, 3, '4.00'),
(50, 80, 16, 5, '6.00'),
(51, 81, 16, 3, '4.00'),
(52, 81, 17, 5, '6.00'),
(53, 81, 18, 7, '8.00'),
(54, 81, 26, 9, '10.00'),
(55, 82, 16, 3, '3.00'),
(56, 82, 16, 3, '2.00'),
(57, 82, 16, 4, '3.00'),
(58, 83, 26, 5, '100.00'),
(59, 83, 26, 10, '200.00'),
(60, 84, 16, 2, '123.00'),
(61, 84, 40, 3, '31.00'),
(62, 84, NULL, 3, '41.00');

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
(4, 'b'),
(5, 'n'),
(6, '1'),
(7, '123');

-- --------------------------------------------------------

--
-- Table structure for table `don_dat_hang`
--

CREATE TABLE `don_dat_hang` (
  `id` int(11) NOT NULL,
  `id_khach_hang` int(11) DEFAULT NULL,
  `ngay` datetime DEFAULT NULL,
  `tong_tien` decimal(10,3) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `tinh_trang` varchar(224) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `don_dat_hang`
--

INSERT INTO `don_dat_hang` (`id`, `id_khach_hang`, `ngay`, `tong_tien`, `ghi_chu`, `tinh_trang`) VALUES
(61, 5, '2024-04-07 11:53:59', '100000.000', '', 'Thành công'),
(62, 5, '2024-04-10 17:01:00', '3.000', 'adasdasdasdTHinhj', 'Thành công'),
(64, 5, '2024-04-19 17:04:00', '30132.000', '4124124', 'Thành công'),
(65, 5, '2024-04-18 17:07:00', '31312.000', '3', 'Chờ xác nhận'),
(66, 5, '2024-04-07 19:51:49', '224000.000', '4321', 'Chờ xác nhận'),
(67, 5, '2024-04-07 23:34:38', '9000.000', '', 'Chờ xác nhận'),
(68, 5, '2024-04-07 23:36:31', '3000.000', '', 'Chờ xác nhận'),
(69, 5, '2024-04-07 23:40:01', '100000.000', '', 'Chờ xác nhận'),
(70, 5, '2024-04-08 01:29:59', '6000.000', '', 'Chờ xác nhận'),
(71, 5, '2024-04-08 01:48:21', '200000.000', '', 'Chờ xác nhận'),
(72, 5, '2024-04-08 02:03:51', '100000.000', '', 'Chờ xác nhận'),
(73, 5, '2024-04-08 02:04:16', '100000.000', '', 'Chờ xác nhận'),
(74, 5, '2024-04-08 02:07:21', '100000.000', '', 'Chờ xác nhận'),
(75, 5, '2024-04-08 02:08:42', '200000.000', '', 'Chờ xác nhận'),
(76, 5, '2024-04-08 02:09:19', '300000.000', '', 'Chờ xác nhận'),
(77, 5, '2024-04-08 02:11:55', '100000.000', '', 'Chờ xác nhận'),
(78, 5, '2024-04-08 02:13:00', '100000.000', '', 'Chờ xác nhận'),
(79, 5, '2024-04-08 02:13:32', '100000.000', '', 'Chờ xác nhận'),
(80, 5, '2024-04-08 02:13:54', '200000.000', '', 'Chờ xác nhận'),
(81, 5, '2024-04-08 12:49:47', '12000.000', '', 'Chờ xác nhận'),
(82, 5, '2024-04-10 14:56:39', '266000.000', '123', 'Chờ xác nhận'),
(83, 5, '2024-03-12 01:17:04', '133000.000', '', 'Chờ xác nhận'),
(84, 5, '2024-05-14 14:22:57', '133000.000', '', 'Chờ xác nhận'),
(85, 5, '2024-04-16 09:21:00', '133000.000', '', 'Chờ xác nhận'),
(86, 5, '2024-04-23 13:32:00', '133000.000', '', 'Chờ xác nhận'),
(87, 5, '2024-04-24 20:29:15', '300000.000', '123123', 'Chờ xác nhận'),
(88, 5, '2024-04-25 12:01:48', '532000.000', '', 'Chờ xác nhận'),
(89, 5, '2024-04-25 12:02:28', '600000.000', '', 'Chờ xác nhận'),
(90, 5, '2024-04-25 12:06:19', '600000.000', '', 'Chờ xác nhận'),
(91, 5, '2024-04-25 12:10:05', '600000.000', '', 'Chờ xác nhận'),
(92, 5, '2024-04-25 12:10:13', '600000.000', '', 'Chờ xác nhận'),
(93, 5, '2024-04-25 12:18:28', '270000.000', '', 'Chờ xác nhận'),
(94, 5, '2024-04-25 12:18:54', '180000.000', '', 'Chờ xác nhận'),
(98, 5, '2024-04-28 16:02:12', '266000.000', '', 'Chờ xác nhận'),
(130, 5, '2024-04-28 23:39:13', '106400.000', '', 'Chờ xác nhận'),
(131, 5, '2024-04-28 23:40:23', '106400.000', '', 'Chờ xác nhận'),
(132, 5, '2024-04-28 23:45:13', '3000.000', '', 'Chờ xác nhận'),
(133, 5, '2024-04-28 23:45:35', '80000.000', '', 'Chờ xác nhận'),
(134, 5, '2024-04-28 23:51:44', '106400.000', '', 'Chờ xác nhận'),
(135, 5, '2024-04-28 23:54:50', '133.000', '', 'Chờ xác nhận'),
(136, 5, '2024-04-29 00:01:02', '100.000', '', 'Chờ xác nhận'),
(149, 5, '2024-04-29 00:47:01', '0.900', '( Giảm 0.1đ với chương trình TƯNG BỪNG KHAI TRƯƠNG.)', 'Chờ xác nhận'),
(150, 5, '2024-04-29 00:47:03', '1.000', '( Giảm 0.2đ với chương trình Giỗ tổ Hùng Vương.)', 'Chờ xác nhận'),
(151, 5, '2024-04-29 00:50:39', '0.900', '( Giảm 0.1đ với chương trình TƯNG BỪNG KHAI TRƯƠNG.)', 'Chờ xác nhận'),
(152, 5, '2024-04-29 00:52:08', '90.000', '123( Giảm 10đ với chương trình TƯNG BỪNG KHAI TRƯƠNG.)', 'Chờ xác nhận'),
(153, 5, '2024-04-29 00:52:49', '90.000', '123( Giảm 10đ với chương trình TƯNG BỪNG KHAI TRƯƠNG.)', 'Chờ xác nhận'),
(154, 5, '2024-04-29 00:53:10', '100.000', '', 'Chờ xác nhận'),
(155, 5, '2024-04-29 00:53:25', '320.400', '( Giảm 35.6đ với chương trình TƯNG BỪNG KHAI TRƯƠNG.)', 'Chờ xác nhận');

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
(1, 'TƯNG BỪNG KHAI TRƯƠNG', '1.000', '10.00', '2024-04-01 00:00:00', '2024-04-30 00:00:00'),
(3, 'Giỗ tổ Hùng Vương', '9999.000', '20.00', '2024-04-01 00:00:00', '2024-04-30 00:00:00');

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
(5, '1', '113131', 'asjdasdasdsd@gmail.com', '11', 1),
(7, 'Con', '0000003012', 'Con@gmail.com', 'c', 9),
(8, 'd', 'd', 'd@gmail.com', 'd', 12),
(9, 'e', '03371476884', 'e@gmail.com', 'e', 13),
(10, '2', '2', '2@gmail.com', '2', 21),
(11, '9', '9', '9@gmail.com', '9', 24),
(12, 'Nguyen Thanh Thinh', '03033714611', 'nguyenThanhThinh@gmail.com', '284/Lý La', 25),
(88, 'BinvaTHinh', '0339192541', 'binzxss2@gmail.com', '666 âu cơ', 152),
(94, '123123mm', '1231231231', '123123mm@gmail.com', '123', 161),
(95, '1231231231', '1231231231', '12@gmail.com', '1', 163);

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(255) DEFAULT NULL,
  `mat_khau` varchar(255) DEFAULT NULL,
  `vai_tro` varchar(255) DEFAULT NULL,
  `trang_thai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `ten_dang_nhap`, `mat_khau`, `vai_tro`, `trang_thai`) VALUES
(1, 'aa', '0cc175b9c0f1b6a831c399e269772661', 'Quản trị viên', 1),
(9, 'c', '4a8a08f09d37b73795649038408b5f33', 'Quản trị viên', 0),
(12, 'd', '8277e0910d750195b448797616e091ad', 'Khách hàng', 0),
(13, 'e', 'e1671797c52e15f763380b45e841ec32', 'Khách hàng', 1),
(18, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Quản trị viên', 1),
(19, '2', 'c81e728d9d4c2f636f067f89cc14862c', 'Nhân viên bán hàng', 1),
(21, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Khách hàng', 1),
(24, '9', '45c48cce2e2d7fbdea1afc51c7c6ad26', 'Nhân viên bán hàng', 1),
(25, 'thinh2', 'e10adc3949ba59abbe56e057f20f883e', 'Khách hàng', 1),
(152, 'binzx002', '4697e111e1554aa51afce1991db7458e', 'Khách hàng', 1),
(158, '4141', 'c81e728d9d4c2f636f067f89cc14862c', 'Biinh luan', 1),
(161, 'mmm', '4697e111e1554aa51afce1991db7458e', 'Khách hàng', 1),
(162, 'a', '0cc175b9c0f1b6a831c399e269772661', 'Khách hàng', 0),
(163, '123', '4697e111e1554aa51afce1991db7458e', 'Khách hàng', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhap_kho`
--

CREATE TABLE `nhap_kho` (
  `id` int(11) NOT NULL,
  `id_nha_cung_cap` int(11) DEFAULT NULL,
  `ngay` datetime DEFAULT NULL,
  `tong_tien` decimal(10,3) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhap_kho`
--

INSERT INTO `nhap_kho` (`id`, `id_nha_cung_cap`, `ngay`, `tong_tien`, `ghi_chu`) VALUES
(67, 6, '2024-04-24 00:00:00', '48.000', '123112312\r\n'),
(68, 6, '2024-04-12 00:00:00', '6.000', '123'),
(69, 6, '2024-04-12 00:00:00', '369.000', '3'),
(70, 6, '2024-04-12 00:00:00', '369.000', ''),
(71, 6, '2024-04-12 00:00:00', '369.000', ''),
(72, 6, '2024-04-11 00:00:00', '369.000', ''),
(73, 6, '2024-04-02 00:00:00', '9.000', '3'),
(74, 6, '2024-04-02 00:00:00', '9.000', '3'),
(75, 6, '2024-04-11 17:51:00', '169.000', '13'),
(76, 6, '2024-04-10 17:52:00', '62.000', '13'),
(77, 6, '2024-04-20 17:56:00', '987.000', ''),
(78, 6, '2024-04-06 18:02:00', '46.000', '3'),
(79, 6, '2024-04-12 21:02:00', '103.000', '123'),
(80, 6, '2024-04-11 18:03:00', '48.000', '33333333333333333333333333'),
(81, 6, '2024-04-13 18:04:00', '188.000', ''),
(82, 6, '2024-04-24 18:14:00', '27.000', '123'),
(83, 6, '2024-05-14 12:57:00', '2500.000', '123'),
(84, 7, '2024-04-12 17:28:00', '462.000', '123');

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
(52, 'asjdasdasdsd@gmail.com', '5342ff177cd145853aba14fdc16c8e0b', '2024-04-21 20:32:21');

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
  `qlgiam_gia` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phan_quyen`
--

INSERT INTO `phan_quyen` (`vai_tro`, `qlnhap_kho`, `qlnha_cung_cap`, `qlnguoi_dung`, `qlkhach_hang`, `qldon_hang`, `qlsan_pham`, `qldanh_muc`, `qlbao_hanh`, `qlbinh_luan`, `qlgiam_gia`) VALUES
('ABC', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
('Biinh luan', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
('Khách hàng', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Nhân viên bán hàng', 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
('Quản trị viên', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
('Tư vấn', 0, 0, 0, 0, 0, 0, 0, 1, 1, 0);

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
(1, 17, NULL, '2024-04-01 00:00:00', '2024-04-07 00:00:00', 'Hết hạn bảo hành', 'áudbkasjdkasadasdasdasdasd\r\nádasd\r\náda'),
(3, 16, NULL, '2024-04-01 00:00:00', '2024-04-04 00:00:00', 'Hết hạn bảo hành', 'h'),
(4, 16, NULL, '2024-04-07 00:00:00', '2024-07-07 00:00:00', 'Đang bảo hành', ''),
(5, 16, 61, '2024-04-07 00:00:00', '2024-07-07 00:00:00', 'Đang bảo hành', ''),
(6, 16, 66, '2024-04-07 19:51:49', '2024-07-07 00:00:00', 'Đang bảo hành', '322 '),
(7, 18, 66, '2024-04-07 19:51:49', '2024-07-07 00:00:00', 'Chờ xử lý', '  '),
(8, 19, 66, '2024-04-07 19:51:49', '2024-07-07 00:00:00', 'Đang bảo hành', ''),
(9, 44, 67, '2024-04-07 23:34:38', '2024-07-07 00:00:00', 'Đang bảo hành', ''),
(10, NULL, 68, '2024-04-07 23:36:31', '2024-07-07 00:00:00', 'Chờ xử lý', 'may huuuuu'),
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
(24, 17, 82, '2024-04-10 14:56:39', '2024-07-10 00:00:00', 'Đang bảo hành', ''),
(25, 17, 83, '2024-04-12 01:17:04', '2024-07-12 00:00:00', 'Hết hạn bảo hành', 'màng hình'),
(26, 17, 84, '2024-04-14 14:22:57', '2024-07-14 00:00:00', 'Đang bảo hành', ''),
(27, 17, 85, '2024-04-16 09:21:00', '2024-07-16 00:00:00', 'Hết hạn bảo hành', 'Hư loa'),
(28, 17, 86, '2024-04-23 13:32:00', '2024-07-23 00:00:00', 'Đang bảo hành', ''),
(29, 16, 87, '2024-04-24 20:29:15', '2024-07-24 00:00:00', 'Đang bảo hành', ''),
(30, 17, 88, '2024-04-25 12:01:48', '2024-07-25 00:00:00', 'Đang bảo hành', ''),
(31, 16, 89, '2024-04-25 12:02:28', '2024-07-25 00:00:00', 'Đang bảo hành', ''),
(32, 16, 90, '2024-04-25 12:06:19', '2024-07-25 00:00:00', 'Đang bảo hành', ''),
(33, 16, 91, '2024-04-25 12:10:05', '2024-07-25 00:00:00', 'Đang bảo hành', ''),
(34, 16, 93, '2024-04-25 12:18:28', '2024-07-25 00:00:00', 'Đang bảo hành', ''),
(35, 16, 94, '2024-04-25 12:18:54', '2024-07-25 00:00:00', 'Đang bảo hành', ''),
(36, 17, NULL, '2024-04-28 16:01:59', '2024-07-28 00:00:00', 'Đang bảo hành', ''),
(37, 17, NULL, '2024-04-28 22:32:50', '2024-07-28 00:00:00', 'Đang bảo hành', ''),
(38, 17, NULL, '2024-04-28 22:33:03', '2024-07-28 00:00:00', 'Đang bảo hành', ''),
(39, 17, NULL, '2024-04-28 22:35:12', '2024-07-28 00:00:00', 'Đang bảo hành', ''),
(40, 17, NULL, '2024-04-28 23:32:39', '2024-07-28 00:00:00', 'Đang bảo hành', ''),
(41, 17, 130, '2024-04-28 23:39:13', '2024-07-28 00:00:00', 'Đang bảo hành', ''),
(42, 17, 131, '2024-04-28 23:40:23', '2024-07-28 00:00:00', 'Đang bảo hành', ''),
(43, 26, 132, '2024-04-28 23:45:13', '2024-07-28 00:00:00', 'Đang bảo hành', ''),
(44, 16, 133, '2024-04-28 23:45:35', '2024-07-28 00:00:00', 'Đang bảo hành', ''),
(45, 17, 134, '2024-04-28 23:51:44', '2024-07-28 00:00:00', 'Đang bảo hành', ''),
(46, 17, 135, '2024-04-28 23:54:50', '2024-07-28 00:00:00', 'Đang bảo hành', ''),
(47, 16, 136, '2024-04-29 00:01:02', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(48, 16, NULL, '2024-04-29 00:04:59', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(49, 16, NULL, '2024-04-29 00:06:15', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(50, 16, NULL, '2024-04-29 00:06:34', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(51, 17, NULL, '2024-04-29 00:28:32', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(52, 17, NULL, '2024-04-29 00:35:17', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(53, 17, NULL, '2024-04-29 00:38:42', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(54, 16, NULL, '2024-04-29 00:39:04', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(55, 19, NULL, '2024-04-29 00:39:28', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(56, 17, NULL, '2024-04-29 00:40:00', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(57, 19, NULL, '2024-04-29 00:45:33', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(58, 19, 149, '2024-04-29 00:47:01', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(59, 19, 151, '2024-04-29 00:50:39', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(60, 16, 152, '2024-04-29 00:52:08', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(61, 16, 154, '2024-04-29 00:53:10', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(62, 17, 155, '2024-04-29 00:53:25', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(63, 18, 155, '2024-04-29 00:53:25', '2024-07-29 00:00:00', 'Đang bảo hành', ''),
(64, 16, 155, '2024-04-29 00:53:25', '2024-07-29 00:00:00', 'Đang bảo hành', '');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `anh` varchar(255) DEFAULT NULL,
  `id_danh_muc` int(11) DEFAULT NULL,
  `gia` decimal(10,3) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten`, `anh`, `id_danh_muc`, `gia`, `so_luong`, `mo_ta`) VALUES
(16, 'a', 'Screenshot 2024-03-01 221351.png', 4, '100.000', 277, 'a'),
(17, 'ád', '31214010040-theSV.jpg', 4, '133.000', 123, '3'),
(18, 'Aa', '', 4, '123.000', 3, 'a'),
(19, '1', 'abc.png', 5, '1.000', 123119, ''),
(26, '3', 'abc.png', 5, '3.000', 280, ''),
(39, '3', '', 4, '3.000', 141, '3'),
(40, '3', '', NULL, '3.000', 6, '3'),
(44, '3', 'abc.png', NULL, '3.000', -1, '3\r\n'),
(46, '13', '433444400-409819921659146-4550568050512038390-n.webp', 4, '123.000', 13, '123');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `danh_muc_san_pham`
--
ALTER TABLE `danh_muc_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `giam_gia`
--
ALTER TABLE `giam_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `nhap_kho`
--
ALTER TABLE `nhap_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `phieu_bao_hanh`
--
ALTER TABLE `phieu_bao_hanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
