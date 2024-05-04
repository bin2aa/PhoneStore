-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 04, 2024 lúc 08:07 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phonestore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_gio_binh_luan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `id_san_pham`, `id_khach_hang`, `noi_dung`, `ngay_gio_binh_luan`) VALUES
(18, 4, 3, 'Sản phẩm tốt, nhân viên nhiệt tình, sẽ quay lại lần sau', '2024-04-05 19:16:45'),
(19, 53, 103, 'Tuyệt vời', '2024-04-01 14:20:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int(11) NOT NULL,
  `id_don_hang` int(11) DEFAULT NULL,
  `id_san_pham` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `gia` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `id_don_hang`, `id_san_pham`, `so_luong`, `gia`) VALUES
(57, 88, 53, 1, '34990000.00'),
(58, 89, 2, 1, '1590000.00'),
(59, 89, 4, 1, '10990000.00'),
(60, 70, 48, 1, '6990000.00'),
(61, 91, 69, 1, '4790000.00'),
(62, 92, 1, 1, '22990000.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_nhap_kho`
--

CREATE TABLE `chi_tiet_nhap_kho` (
  `id` int(11) NOT NULL,
  `id_nhap_kho` int(11) DEFAULT NULL,
  `id_san_pham` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `gia` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_nhap_kho`
--

INSERT INTO `chi_tiet_nhap_kho` (`id`, `id_nhap_kho`, `id_san_pham`, `so_luong`, `gia`) VALUES
(63, 85, 1, 30, '689700000.00'),
(64, 85, 4, 20, '219800000.00'),
(65, 86, 2, 50, '79500000.00'),
(66, 86, 63, 20, '19800000.00'),
(67, 87, 53, 21, '734790000.00'),
(68, 87, 55, 30, '884970000.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc_san_pham`
--

CREATE TABLE `danh_muc_san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danh_muc_san_pham`
--

INSERT INTO `danh_muc_san_pham` (`id`, `ten`) VALUES
(1, 'SamSung\r\n'),
(2, 'iPhone'),
(3, 'Oppo\n'),
(4, 'realme'),
(5, 'Xiaomi'),
(6, 'Nokia');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_dat_hang`
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
-- Đang đổ dữ liệu cho bảng `don_dat_hang`
--

INSERT INTO `don_dat_hang` (`id`, `id_khach_hang`, `ngay`, `tong_tien`, `ghi_chu`, `tinh_trang`) VALUES
(70, 104, '2023-02-10 15:28:49', '6990000.00', '1 Samsung Galaxy A25 5G', 'Đang xử lý'),
(88, 103, '2024-03-22 15:15:56', '34990000.00', '1 iPhone 15 Pro Max', 'Đang xử lý'),
(89, 3, '2024-04-02 13:24:34', '12580000.00', '1 Nokia 8210 4G, 1 OPPO Reno11 5G', 'Đang xử lý'),
(91, 2, '2024-04-28 13:33:57', '4790000.00', '1 realme C67', 'Chờ xác nhận'),
(92, 1, '2024-03-20 14:37:12', '22990000.00', '1 Samsung Galaxy S24 5G', 'Đang xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giam_gia`
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
-- Đang đổ dữ liệu cho bảng `giam_gia`
--

INSERT INTO `giam_gia` (`id`, `ten`, `dieu_kien_mua`, `phan_tram_giam_gia`, `ngay_bat_dau`, `ngay_ket_thuc`) VALUES
(1, 'TƯNG BỪNG KHAI TRƯƠNG', '2000000.000', '5.00', '2024-03-15 00:00:00', '2024-03-25 23:59:59'),
(2, '30/4 - 1/5', '4000000.000', '10.00', '2024-04-27 00:00:00', '2024-05-02 23:59:59'),
(3, 'ĐÓN HÈ RỰC RỠ', '8000000.000', '9.99', '2024-05-05 00:00:00', '2024-05-15 23:59:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
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
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten`, `so_dien_thoai`, `email`, `dia_chi`, `id_nguoi_dung`) VALUES
(1, 'Nguyễn Văn A', '0123456789', 'nguyenvana@gmail.com', '333 Âu Cơ', 2),
(2, 'Nguyễn Thị B', '0987654321', 'nguyenthib@gmail.com', '273 An Dương Vương', 3),
(3, 'Lê Văn An', '0123459876', 'levanan@gmail.com', '284 Lê Văn Lương', 6),
(102, 'Trần Thị Nga', '0123465987', 'tranthinga@gmail.com', '77 Hùng Vương', 172),
(103, 'Bùi Lê Bích Nhung', '0987651234', 'builebichnhung123@gmail.com', '412 Lê Hồng Phong', 173),
(104, 'Mai Thị Ngân', '0258369147', 'maithingan@gmail.com', '25 Nguyễn Thị Thập', 174);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(255) DEFAULT NULL,
  `mat_khau` varchar(255) DEFAULT NULL,
  `vai_tro` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `ten_dang_nhap`, `mat_khau`, `vai_tro`) VALUES
(1, 'admin', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 'Quản trị viên'),
(2, 'banhang01', '738d3ac8c49c3e1c2e82c872fe2d86d5', 'Nhân viên bán hàng'),
(3, 'banhang02', '2d8d039e4a2fa345d436f8ca995e5915', 'Nhân viên bán hàng'),
(4, 'tuvan01', '018e799fe88082b283956e5e1889d754', 'Tư vấn'),
(5, 'tuvan02', '7ef881dccc10c461cdad78eb06750d46', 'Tư vấn'),
(6, 'levanan07', '39b733d61703b743353d6856a0b4a79a', 'Khách hàng'),
(172, 'tranthinga', '433ca31db793eebcb29f54d62da27b33', 'Khách hàng'),
(173, 'blbnhung03', 'fd25276a214a52cf16539cf7b38b8749', 'Khách hàng'),
(174, 'maithingan01', 'fca10650a7043e06bd42174ad8d473c2', 'Khách hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhap_kho`
--

CREATE TABLE `nhap_kho` (
  `id` int(11) NOT NULL,
  `id_nha_cung_cap` int(11) DEFAULT NULL,
  `ngay` datetime DEFAULT NULL,
  `tong_tien` decimal(15,3) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhap_kho`
--

INSERT INTO `nhap_kho` (`id`, `id_nha_cung_cap`, `ngay`, `tong_tien`, `ghi_chu`) VALUES
(85, 8, '2024-03-09 09:46:51', '909500000.000', '30 chiếc Samsung Galaxy S24 5G và 20 chiếc OPPO Reno11 5G'),
(86, 9, '2024-03-15 10:59:54', '99300000.000', '20 chiếc Nokia 215 4G và 50 chiêc Nokia 8210 4G'),
(87, 14, '2024-03-29 14:04:48', '1619760000.000', '21 iPhone 15 Pro Max, 30 iPhone 14 Pro Max');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`id`, `ten`, `so_dien_thoai`, `email`, `dia_chi`) VALUES
(8, 'Thế giới di động', '02835100100', 'lienhe@thegioididong.com', '364 Cộng Hòa'),
(9, 'Nokia', '02838236894', 'chau.nguyen@nokia.com', '235 Đông Khởi'),
(10, 'Điện Thử Kim Thiên Bảo', '0907225889', 'letandanh999@gmail.com', '22-24 Đường Số 10'),
(14, 'Thương Mại Công Nghệ Bạch Long', '0869287135', 'marketing@bachlongmobile.com', '134 Trần Phú'),
(15, 'Bao La', '02835119060', NULL, '8/38 Đinh Bộ Lĩnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(53, 'builebichnhung123@gmail.com', '844c77f1f0e43225b41598ea94a6bee0', '2024-04-29 17:44:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phan_quyen`
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
  `qlbinh_luan` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phan_quyen`
--

INSERT INTO `phan_quyen` (`vai_tro`, `qlnhap_kho`, `qlnha_cung_cap`, `qlnguoi_dung`, `qlkhach_hang`, `qldon_hang`, `qlsan_pham`, `qldanh_muc`, `qlbao_hanh`, `qlbinh_luan`) VALUES
('Bình luận', 0, 0, 0, 0, 0, 0, 0, 0, 1),
('Khách hàng', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Nhân viên bán hàng', 1, 1, 1, 1, 1, 1, 1, 1, 1),
('Quản trị viên', 1, 1, 1, 1, 1, 1, 1, 1, 1),
('Tư vấn', 0, 0, 0, 0, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieu_bao_hanh`
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
-- Đang đổ dữ liệu cho bảng `phieu_bao_hanh`
--

INSERT INTO `phieu_bao_hanh` (`id`, `id_san_pham`, `id_don_hang`, `ngay_lap`, `ngay_het_han`, `tinh_trang`, `ghi_chu`) VALUES
(28, 48, 70, '2023-02-10 15:29:56', '2024-02-10 22:59:59', 'Hết hạn bảo hành', NULL),
(30, 53, 88, '2024-03-22 15:21:12', '2024-09-22 23:59:59', 'Đang bảo hành', NULL),
(31, 4, 89, '2024-04-02 13:24:58', '2025-04-02 23:59:59', 'Chờ xử lý', 'Lỗi màn hình'),
(32, 2, 89, '2024-04-02 13:27:25', '2025-04-02 23:59:59', 'Đang bảo hành', NULL),
(34, 69, 91, '2024-04-28 13:35:23', '2025-04-28 23:59:59', 'Đang bảo hành', NULL),
(35, 1, 92, '2024-03-20 14:38:00', '2024-12-20 14:59:59', 'Chờ xử lý', 'Lỗi pin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
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
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten`, `anh`, `id_danh_muc`, `gia`, `so_luong`, `mo_ta`) VALUES
(1, 'Samsung Galaxy S24 5G', 'Samsung_Galaxy_S24_5G.jpg', 1, '22990000.00', 200, NULL),
(2, 'Nokia 8210 4G', 'Nokia_8210_4G.jpg', 6, '1590000.00', 50, NULL),
(3, 'iPhone 15', 'iPhone_15.jpg', 2, '22990000.00', 96, NULL),
(4, 'OPPO Reno11 5G', 'OPPO_Reno11_5G.jpg', 3, '10990000.00', 158, NULL),
(7, 'Samsung Galaxy S24 Ultra 5G', 'Samsung_Galaxy_S24_Ultra_5G.jpg', 1, '37490000.00', 50, NULL),
(48, 'Samsung Galaxy A25 5G', 'Samsung_Galaxy_A25_5G.jpg', 1, '6990000.00', 120, NULL),
(49, 'Samsung Galaxy Z Flip5 5G', 'Samsung_Galaxy_Z_Flip5_5G.jpg', 1, '25990000.00', 36, NULL),
(50, 'Samsung Galaxy Z Fold5 5G', 'Samsung_Galaxy_Z_Fold5_5G.jpg', 1, '40990000.00', 56, NULL),
(51, 'Samsung Galaxy M34 5G', 'Samsung_Galaxy_M34_5G.jpg', 1, '7990000.00', 106, NULL),
(52, 'Samsung Galaxy S23 FE 5G', 'Samsung_Galaxy_S23_FE_5G.jpg', 1, '14890000.00', 93, NULL),
(53, 'iPhone 15 Pro Max', 'iPhone_15_Pro_Max.jpg', 2, '34990000.00', 256, NULL),
(55, 'iPhone 14 Pro Max', 'iPhone_14_Pro_Max.jpg', 2, '29490000.00', 76, NULL),
(56, 'iPhone 11', 'iPhone_11.ipg', 2, '11790000.00', 61, NULL),
(57, 'iPhone 12', 'iPhone_12.jpg', 2, '14890000.00', 75, NULL),
(59, 'OPPO Reno11 F 5G', 'OPPO_Reno11_F_5G.jpg', 3, '8990000.00', 126, NULL),
(60, 'OPPO Reno10 Pro 5G', 'OPPO_Reno10_Pro_5G.jpg', 3, '13990000.00', 78, NULL),
(61, 'OPPO Find N3 Flip 5G', 'OPPO_Find_N3_Flip_5G.jpg', 3, '22990000.00', 96, NULL),
(62, 'OPPO Reno8 T 5G', 'OPPO_Reno8_T_5G.jpg', 3, '10990000.00', 84, NULL),
(63, 'Nokia 215 4G', 'Nokia_215_4G.jpg', 6, '990000.00', 158, NULL),
(64, 'Nokia 110 4G Pro', 'Nokia_110_4G_Pro.jpg', 6, '720000.00', 93, NULL),
(65, 'Nokia 105 4G Pro', 'Nokia_105_4G_Pro.jpg', 6, '680000.00', 29, NULL),
(66, 'Nokia 105', 'Nokia_105.jpg', 6, '590000.00', 76, NULL),
(67, 'realme Note 50', 'realme_Note_50.jpg', 4, '2490000.00', 168, NULL),
(68, 'realme C55', 'realme_C55.jpg', 3, '4990000.00', 79, NULL),
(69, 'realme C67', 'realme_C67.jpg', 4, '4790000.00', 161, NULL),
(70, 'realme 11', 'realme_11.jpg', 4, '7990000.00', 73, NULL),
(71, 'realme 11 Pro+ 5G', 'realme_11_Pro_Plus.jpg', 4, '14990000.00', 99, NULL),
(72, 'Xiaomi 14 5G', 'Xiaomi_14_5G.jpg', 5, '24490000.00', 59, NULL),
(73, 'Xiaomi Redmi Note 13 Pro 5G', 'Xiaomi_Redmi_Note_13_Pro_5G.jpg', 5, '9490000.00', 49, NULL),
(74, 'Xiaomi 13T Pro 5G', 'Xiaomi_13T_Pro_5G.jpg', 5, '14990000.00', 156, NULL),
(75, 'Xiaomi Redmi Note 13', 'Xiaomi_Redmi_Note_13.jpg', 5, '5290000.00', 43, NULL),
(76, 'Xiaomi Redmi 12', 'Xiaomi_Redmi_12.jpg', 5, '3490000.00', 76, NULL),
(77, 'iPhone 15', 'iPhone_15.jpg', 2, '22990000.00', 76, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang_ibfk_1` (`id_khach_hang`),
  ADD KEY `id_san_pham_ibfk_1` (`id_san_pham`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_don_hang_ibfk_1` (`id_don_hang`),
  ADD KEY `chi_tiet_don_hang_ibfk_2` (`id_san_pham`);

--
-- Chỉ mục cho bảng `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_nhap_kho_ibfk_2` (`id_san_pham`),
  ADD KEY `chi_tiet_nhap_kho_ibfk_1` (`id_nhap_kho`);

--
-- Chỉ mục cho bảng `danh_muc_san_pham`
--
ALTER TABLE `danh_muc_san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_dat_hang_ibfk_1` (`id_khach_hang`);

--
-- Chỉ mục cho bảng `giam_gia`
--
ALTER TABLE `giam_gia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `khach_hang_ibfk_1` (`id_nguoi_dung`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`),
  ADD KEY `fk_vai_tro` (`vai_tro`);

--
-- Chỉ mục cho bảng `nhap_kho`
--
ALTER TABLE `nhap_kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhap_kho_ibfk_1` (`id_nha_cung_cap`);

--
-- Chỉ mục cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phan_quyen`
--
ALTER TABLE `phan_quyen`
  ADD PRIMARY KEY (`vai_tro`);

--
-- Chỉ mục cho bảng `phieu_bao_hanh`
--
ALTER TABLE `phieu_bao_hanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phieu_bao_hanh_ibfk_1` (`id_san_pham`),
  ADD KEY `phieu_bao_hanh_ibfk_2` (`id_don_hang`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_ibfk_1` (`id_danh_muc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `danh_muc_san_pham`
--
ALTER TABLE `danh_muc_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `giam_gia`
--
ALTER TABLE `giam_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT cho bảng `nhap_kho`
--
ALTER TABLE `nhap_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `phieu_bao_hanh`
--
ALTER TABLE `phieu_bao_hanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `id_khach_hang_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_san_pham_ibfk_1` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`id_don_hang`) REFERENCES `don_dat_hang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  ADD CONSTRAINT `chi_tiet_nhap_kho_ibfk_1` FOREIGN KEY (`id_nhap_kho`) REFERENCES `nhap_kho` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chi_tiet_nhap_kho_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  ADD CONSTRAINT `don_dat_hang_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD CONSTRAINT `khach_hang_ibfk_1` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD CONSTRAINT `fk_vai_tro` FOREIGN KEY (`vai_tro`) REFERENCES `phan_quyen` (`vai_tro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhap_kho`
--
ALTER TABLE `nhap_kho`
  ADD CONSTRAINT `nhap_kho_ibfk_1` FOREIGN KEY (`id_nha_cung_cap`) REFERENCES `nha_cung_cap` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phieu_bao_hanh`
--
ALTER TABLE `phieu_bao_hanh`
  ADD CONSTRAINT `phieu_bao_hanh_ibfk_1` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `phieu_bao_hanh_ibfk_2` FOREIGN KEY (`id_don_hang`) REFERENCES `don_dat_hang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc_san_pham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
