-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 11:17 AM
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
(23, 54, 17, 1, '133.00');

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
(20, 54, 19, 123123, '1233.00');

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
  `ngay` date DEFAULT NULL,
  `tong_tien` decimal(10,2) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `tinh_trang` varchar(224) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `don_dat_hang`
--

INSERT INTO `don_dat_hang` (`id`, `id_khach_hang`, `ngay`, `tong_tien`, `ghi_chu`, `tinh_trang`) VALUES
(32, 5, '2024-03-22', '60000.00', '', 'Chờ xác nhận'),
(33, 5, '2024-03-22', '50000.00', '', 'Chờ xác nhận'),
(34, 5, '2024-03-22', '70000.00', '', 'Chờ xác nhận'),
(35, 5, '2024-03-22', '30000.00', 'aaa', 'Chờ xác nhận'),
(36, 5, '2024-03-22', '30000.00', '', 'Chờ xác nhận'),
(37, 5, '2024-03-22', '50000.00', '123', 'Chờ xác nhận'),
(38, 5, '2024-03-22', '20000.00', '', 'Chờ xác nhận'),
(39, 5, '2024-03-22', '20000.00', '312312', 'Chờ xác nhận'),
(40, 5, '2024-03-22', '20000.00', 'ffffffff', 'Chờ xác nhận'),
(41, 5, '2024-03-22', '20000.00', '', 'Chờ xác nhận'),
(42, 5, '2024-03-22', '30000.00', '444444', 'Chờ xác nhận'),
(43, 5, '2024-03-23', '10000.00', '', 'Chờ xác nhận'),
(44, 6, '2024-03-23', '20000.00', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 'Chờ xác nhận'),
(46, 5, '2024-03-23', '30000.00', '123', 'Chờ xác nhận'),
(47, 5, '2024-03-23', '40000.00', '', 'Chờ xác nhận'),
(48, 5, '2024-03-23', '233000.00', '', 'Chờ xác nhận'),
(49, 8, '2024-03-24', '203000.00', 'ád', 'Chờ xác nhận'),
(50, 5, '2024-03-25', '566000.00', '3', 'Chờ xác nhận'),
(51, 5, '2024-03-25', '600000.00', '', 'Chờ xác nhận'),
(52, 9, '2024-03-25', '466000.00', '', 'Chờ xác nhận'),
(53, 9, '2024-03-25', '998000.00', '3', 'Chờ xác nhận'),
(54, 5, '2024-03-27', '802000.00', 'ajsbdasjbd', 'Chờ xác nhận');

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
(1, 'a', '0cc175b9c0f1b6a831c399e269772661', 'Nhân viên bán hàng'),
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
(54, 7, '2024-03-07', '99999999.99', '3');

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
  `qldanh_muc` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phan_quyen`
--

INSERT INTO `phan_quyen` (`vai_tro`, `qlnhap_kho`, `qlnha_cung_cap`, `qlnguoi_dung`, `qlkhach_hang`, `qldon_hang`, `qlsan_pham`, `qldanh_muc`) VALUES
('Khách hàng', 0, 0, 0, 1, 0, 1, 0),
('Nhân viên bán hàng', 0, 0, 1, 1, 1, 1, 1),
('Quản trị viên', 1, 1, 1, 1, 1, 1, 1);

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
(16, 'a', 'Screenshot 2024-03-01 221351.png', 4, '100.00', 4218, 'a'),
(17, 'ád', 'abc.png', 4, '133.00', 149, '3'),
(18, 'Aa', '', 3, '123.00', -2, 'a'),
(19, '1', 'abc.png', 5, '1.00', 123124, ''),
(26, '3', 'abc.png', 5, '3.00', 3, ''),
(39, '3', '', 3, '3.00', 3, '3'),
(40, '3', '', 3, '3.00', 5, '3'),
(41, '3', '', 3, '3.00', 3, '3'),
(42, '3', '', 3, '3.00', 3, '3'),
(43, '3', '', 3, '3.00', 3, '3\r\n'),
(44, '3', 'abc.png', 3, '3.00', 3, '3\r\n'),
(45, '3', 'abc.png', 3, '3.00', 3, '3');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `danh_muc_san_pham`
--
ALTER TABLE `danh_muc_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nhap_kho`
--
ALTER TABLE `nhap_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc_san_pham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
