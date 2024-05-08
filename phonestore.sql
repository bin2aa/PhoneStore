-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 03:38 PM
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
(7, 6, 33, 26, '22990000.00'),
(8, 7, 23, 1, '2490000.00'),
(9, 7, 24, 1, '4990000.00'),
(10, 8, 10, 2, '14890000.00'),
(11, 8, 9, 2, '7990000.00');

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
(1, 1, 1, 30, '689700000.00'),
(2, 1, 4, 20, '219800000.00'),
(3, 2, 19, 20, '19800000.00'),
(4, 2, 2, 50, '79500000.00'),
(5, 3, 11, 21, '734790000.00'),
(6, 3, 12, 30, '884970000.00');

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
(1, 1, '2023-02-10 15:28:49', '6990000.00', '1 Samsung Galaxy A25 5G', 'Đang giao'),
(2, 1, '2024-03-22 15:15:56', '34990000.00', '1 iPhone 15 Pro Max', 'Đang giao'),
(3, 1, '2024-04-02 13:24:34', '12580000.00', '1 Nokia 8210 4G, 1 OPPO Reno11 5G', 'Đang giao'),
(4, 8, '2024-04-28 13:33:57', '4790000.00', '1 realme C67', 'Thành công'),
(5, 1, '2024-03-20 14:37:12', '22990000.00', '1 Samsung Galaxy S24 5G', 'Đang xử lý'),
(6, 1, '2024-05-08 19:08:11', '99999999.99', 'Haha( Giảm 59774000đ với chương trình 30/4 - 1/5.)', 'Chờ xác nhận'),
(7, 1, '2024-05-08 19:09:51', '6732000.00', '( Giảm 748000đ với chương trình 30/4 - 1/5.)', 'Chờ xác nhận'),
(8, 1, '2024-05-08 19:25:36', '45760000.00', '', 'Chờ xác nhận');

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
(1, 'TƯNG BỪNG KHAI TRƯƠNG', '2000000.000', '5.00', '2024-03-15 00:00:00', '2024-03-25 23:59:59'),
(2, '30/4 - 1/5', '4000000.000', '10.00', '2024-04-27 00:00:00', '2024-05-02 23:59:59'),
(3, 'ĐÓN HÈ RỰC RỠ', '8000000.000', '9.99', '2024-05-05 00:00:00', '2024-05-15 23:59:59');

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
(1, 'Nguyễn Văn An', '09012345671', 'nguyenvanan@gmail.com', '123 Đường ABC, Quận 1, Thành phố Hồ Chí Minh', 1),
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
(12, 'Phạm Văn Nam', '0912345678', 'phamvannam@gmail.com', '789 Đường KLM, Quận Gò Vấp, Thành phố Hồ Chí Minh', 12);

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
(5, 'manager2', '682991f679f0c8c2cde1c215c806b189', 'quản lý', 1),
(6, 'staff3', '039c75d23427e1081b521228cec7fabd', 'nhân viên tư vấn', 1),
(7, 'dvgiang', '5a30c9609b52fe348fb6925896e061de', 'Khách hàng', 1),
(8, 'nthanh123', '3543accfa8017d5a9a7779008aa26da8', 'Khách hàng', 1),
(9, 'tranvanan111', '9ca92a21c8d996d3bf338e055418fb75', 'Khách hàng', 1),
(10, 'levankhang999', '5a63076094baf553c641307cbbff5b92', 'Khách hàng', 1),
(11, 'nvlinh777', '372f6a6744fcfe2a765356c41ca85d22', 'Khách hàng', 1),
(12, 'pvnammmm', '244beb9eb0e5eb8dec8391fd8360020f', 'Khách hàng', 1);

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
(1, 1, '2024-03-09 09:46:51', '909500000.000', '30 chiếc Samsung Galaxy S24 5G và 20 chiếc OPPO Reno11 5G'),
(2, 2, '2024-03-15 10:59:54', '99300000.000', '20 chiếc Nokia 215 4G và 50 chiêc Nokia 8210 4G'),
(3, 4, '2024-03-29 14:04:48', '1619760000.000', '21 iPhone 15 Pro Max, 30 iPhone 14 Pro Max');

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
(2, 'builebichnhung123@gmail.com', 'cfd33339b078eccae746fe6ffeebdf80', '2024-05-07 12:02:28');

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
('quản lý', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
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
(1, 6, 1, '2023-02-10 15:29:56', '2024-02-10 22:59:59', 'Hết hạn bảo hành', NULL),
(2, 11, 2, '2024-03-22 15:21:12', '2024-09-22 23:59:59', 'Đang bảo hành', NULL),
(3, 2, 3, '2024-04-02 13:24:58', '2025-04-02 23:59:59', 'Chờ xử lý', 'Lỗi màn hình'),
(4, 15, 3, '2024-04-02 13:27:25', '2025-04-02 23:59:59', 'Đang bảo hành', NULL),
(5, 25, 4, '2024-04-28 13:35:23', '2025-04-28 23:59:59', 'Đang bảo hành', NULL),
(6, 1, 5, '2024-03-20 14:38:00', '2024-12-20 14:59:59', 'Chờ xử lý', 'Lỗi pin'),
(7, 33, 6, '2024-05-08 19:08:11', '2024-08-08 00:00:00', 'Đang bảo hành', ''),
(8, 23, 7, '2024-05-08 19:09:51', '2024-08-08 00:00:00', 'Đang bảo hành', ''),
(9, 24, 7, '2024-05-08 19:09:51', '2024-08-08 00:00:00', 'Đang bảo hành', ''),
(10, 10, 8, '2024-05-08 19:25:36', '2024-08-08 00:00:00', 'Đang bảo hành', ''),
(11, 9, 8, '2024-05-08 19:25:36', '2024-08-08 00:00:00', 'Đang bảo hành', '');

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
(1, 'Samsung Galaxy S24 5G', 'Samsung_Galaxy_S24_5G.png', 1, '22990000.00', 200, 'Thiết kế đẹp mắt, camera chất lượng cao, hỗ trợ 5G.'),
(2, 'Nokia 8210 4G', 'Nokia_8210_4G.png', 6, '1590000.00', 50, 'Phiên bản mới của Nokia 8210, hỗ trợ kết nối 4G.'),
(3, 'iPhone 15', 'iPhone_15.png', 2, '22990000.00', 96, 'iPhone mới nhất với nhiều tính năng đột phá.'),
(4, 'OPPO Reno11 5G', 'OPPO_Reno11_5G.png', 3, '10990000.00', 158, 'OPPO Reno11 hỗ trợ 5G, camera sắc nét.'),
(5, 'Samsung Galaxy S24 Ultra 5G', 'Samsung_Galaxy_S24_Ultra_5G.png', 1, '37490000.00', 50, 'Phiên bản cao cấp của Samsung Galaxy S24, hỗ trợ 5G.'),
(6, 'Samsung Galaxy A25 5G', 'Samsung_Galaxy_A25_5G.png', 1, '6990000.00', 120, 'Samsung Galaxy A25 hỗ trợ kết nối 5G, pin trâu.'),
(7, 'Samsung Galaxy Z Flip5 5G', 'Samsung_Galaxy_Z_Flip5_5G.png', 1, '25990000.00', 36, 'Thiết kế gập gọn độc đáo, màn hình AMOLED.'),
(8, 'Samsung Galaxy Z Fold5 5G', 'Samsung_Galaxy_Z_Fold5_5G.png', 1, '40990000.00', 56, 'Thiết kế màn hình gập, sử dụng công nghệ màn hình mới.'),
(9, 'Samsung Galaxy M34 5G', 'Samsung_Galaxy_M34_5G.png', 1, '7990000.00', 104, 'Samsung Galaxy M34 với thiết kế hiện đại, camera đa chức năng.'),
(10, 'Samsung Galaxy S23 FE 5G', 'Samsung_Galaxy_S23_FE_5G.png', 1, '14890000.00', 91, 'Phiên bản Fan Edition của Samsung Galaxy S23, hỗ trợ 5G.'),
(11, 'iPhone 15 Pro Max', 'iPhone_15_Pro_Max.png', 2, '34990000.00', 256, 'Phiên bản cao cấp nhất của iPhone 15, hiệu năng mạnh mẽ.'),
(12, 'iPhone 14 Pro Max', 'iPhone_14_Pro_Max.png', 2, '29490000.00', 76, 'iPhone 14 Pro Max với camera chất lượng cao.'),
(13, 'iPhone 11', 'iPhone_11.png', 2, '11790000.00', 61, 'iPhone 11, một trong những dòng sản phẩm phổ biến của Apple.'),
(14, 'iPhone 12', 'iPhone_12.png', 2, '14890000.00', 75, 'iPhone 12, tính năng và hiệu năng ấn tượng.'),
(15, 'OPPO Reno11 F 5G', 'OPPO_Reno11_F_5G.png', 3, '8990000.00', 126, 'OPPO Reno11 phiên bản thân thiện với ngân sách, hỗ trợ 5G.'),
(16, 'OPPO Reno10 Pro 5G', 'OPPO_Reno10_Pro_5G.png', 3, '13990000.00', 78, 'OPPO Reno10 Pro, hiệu năng ổn định, camera chất lượng.'),
(17, 'OPPO Find N3 Flip 5G', 'OPPO_Find_N3_Flip_5G.png', 3, '22990000.00', 96, 'Thiết kế gập độc đáo, camera chất lượng cao.'),
(18, 'OPPO Reno8 T 5G', 'OPPO_Reno8_T_5G.png', 3, '10990000.00', 84, 'OPPO Reno8 T, smartphone 5G với giá phải chăng.'),
(19, 'Nokia 215 4G', 'Nokia_215_4G.png', 6, '990000.00', 158, 'Nokia 215, điện thoại cơ bản hỗ trợ kết nối 4G.'),
(20, 'Nokia 110 4G Pro', 'Nokia_110_4G_Pro.png', 6, '720000.00', 93, 'Nokia 110 4G Pro, phiên bản mới với nhiều tính năng hấp dẫn.'),
(21, 'Nokia 105 4G Pro', 'Nokia_105_4G_Pro.png', 6, '680000.00', 29, 'Nokia 105 4G Pro, điện thoại cơ bản hỗ trợ kết nối 4G.'),
(22, 'Nokia 105', 'Nokia_105.png', 6, '590000.00', 76, 'Nokia 105, điện thoại cơ bản với pin lâu.'),
(23, 'realme Note 50', 'realme_Note_50.png', 4, '2490000.00', 167, 'realme Note 50, thiết kế trẻ trung, hiệu năng mạnh mẽ.'),
(24, 'realme C55', 'realme_C55.png', 3, '4990000.00', 78, 'realme C55, smartphone đa dụng với giá cả hợp lý.'),
(25, 'realme C67', 'realme_C67.png', 4, '4790000.00', 161, 'realme C67, tính năng đáp ứng nhu cầu sử dụng hàng ngày.'),
(26, 'realme 11', 'realme_11.png', 4, '7990000.00', 73, 'realme 11, thiết kế đẹp, camera chất lượng.'),
(27, 'realme 11 Pro+ 5G', 'realme_11_Pro_Plus.png', 4, '14990000.00', 99, 'realme 11 Pro+ 5G, smartphone 5G cao cấp.'),
(28, 'Xiaomi 14 5G', 'Xiaomi_14_5G.png', 5, '24490000.00', 59, 'Xiaomi 14 5G, thiết kế sang trọng, hiệu năng mạnh mẽ.'),
(29, 'Xiaomi Redmi Note 13 Pro 5G', '8.png', 5, '9490000.00', 49, 'Xiaomi Redmi Note 13 Pro 5G, camera nổi bật.'),
(30, 'Xiaomi 13T Pro 5G', 'Xiaomi_13T_Pro_5G.png', 5, '14990000.00', 156, 'Xiaomi 13T Pro 5G, smartphone 5G tích hợp nhiều tính năng.'),
(31, 'Xiaomi Redmi Note 13', 'Xiaomi_Redmi_Note_13.png', 5, '5290000.00', 43, 'Xiaomi Redmi Note 13, thiết kế đẹp, pin trâu.'),
(32, 'Xiaomi Redmi 12', 'Xiaomi_Redmi_12.png', 5, '3490000.00', 76, 'Xiaomi Redmi 12, smartphone tầm trung đáng mua.'),
(33, 'iPhone 15', 'iPhone_15.png', 2, '22990000.00', 50, 'iPhone mới nhất với nhiều tính năng đột phá.'),
(34, 'test', '13.png', 2, '123.00', 0, '123');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `danh_muc_san_pham`
--
ALTER TABLE `danh_muc_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `giam_gia`
--
ALTER TABLE `giam_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nhap_kho`
--
ALTER TABLE `nhap_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phieu_bao_hanh`
--
ALTER TABLE `phieu_bao_hanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
