-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 01:52 PM
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
(1, 'A'),
(2, 'C');

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
(2, 1, '2024-01-31', '33.00', '', ''),
(4, 1, '2024-01-31', '1.00', '', ''),
(6, 1, '2024-02-13', '32.00', '', NULL),
(7, 1, '2024-02-21', '3.00', '12312', ''),
(8, 1, '2024-02-21', '300.00', '1', ''),
(9, 1, '2024-02-07', '1.00', '1', ''),
(10, 1, '2024-02-07', '33.00', '', ''),
(11, 1, '2024-02-07', '1.00', '', ''),
(12, 1, '2024-02-07', '1.00', '', ''),
(13, 1, '2024-01-31', '1.00', '1', ''),
(14, 1, '2024-02-12', '4.00', '', ''),
(15, 1, '2024-02-01', '123.00', '', ''),
(16, 1, '2024-02-01', '123.00', '', ''),
(17, 1, '2024-02-01', '1.00', '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten`, `so_dien_thoai`, `email`, `dia_chi`) VALUES
(1, 'Thịnh', '0337147684', 'asjdasdasdsd@gmail.com', '284/25 Lý Thường Kiệt'),
(3, 'Thiện', '11', '1@gmail.com', '1'),
(4, 'Thông', '0331231221', 'thongthathietthathioo@gmail.com', '283/34/41/GT/GTA');

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `ten_dang_nhap` varchar(255) DEFAULT NULL,
  `mat_khau` varchar(255) DEFAULT NULL,
  `vai_tro` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `ten`, `ten_dang_nhap`, `mat_khau`, `vai_tro`) VALUES
(1, 'Thinh', '1', '11', '1'),
(3, '4', '4', '4', '4'),
(10, 'hai', 'ba', 'bon', 'nam'),
(11, '1', '2', '3', '21]');

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
(1, '1', 'abc.png', 2, '1.00', 1, '1'),
(2, '1', '', 1, '1.00', 1, '1'),
(3, '1', 'abc.png', 1, '1.00', 1, '1'),
(4, '1', 'abc.png', 1, '1.00', 1, '1'),
(5, '1', '', 1, '1.00', 1, '1'),
(6, '2', '', 1, '2.00', 2, '2'),
(7, '1', '', 1, '1.00', 1, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_don_hang` (`id_don_hang`),
  ADD KEY `id_san_pham` (`id_san_pham`);

--
-- Indexes for table `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nhap_kho` (`id_nhap_kho`),
  ADD KEY `id_san_pham` (`id_san_pham`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danh_muc_san_pham`
--
ALTER TABLE `danh_muc_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nhap_kho`
--
ALTER TABLE `nhap_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`id_don_hang`) REFERENCES `don_dat_hang` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`);

--
-- Constraints for table `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  ADD CONSTRAINT `chi_tiet_nhap_kho_ibfk_1` FOREIGN KEY (`id_nhap_kho`) REFERENCES `nhap_kho` (`id`),
  ADD CONSTRAINT `chi_tiet_nhap_kho_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`);

--
-- Constraints for table `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  ADD CONSTRAINT `don_dat_hang_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id`);

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
