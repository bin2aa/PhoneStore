<?php

include(__DIR__ . '/../lib/database.php');


//Đăt múi giờ Việt Nam cho các datetime
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Bắt đầu session
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['ten_dang_nhap'])) {
    // Chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: /login/index.php?ctrl=loginController");
    exit; // Dừng việc thực thi mã sau khi chuyển hướng
}

// Kiểm tra và lấy giá trị các biến session
$vai_tro = $_SESSION['vai_tro'];
$qlnhap_kho = $_SESSION['qlnhap_kho'];
$qlnha_cung_cap = $_SESSION['qlnha_cung_cap'];
$qlnguoi_dung = $_SESSION['qlnguoi_dung'];
$qlkhach_hang = $_SESSION['qlkhach_hang'];
$qldon_hang = $_SESSION['qldon_hang'];
$qlsan_pham = $_SESSION['qlsan_pham'];
$qldanh_muc = $_SESSION['qldanh_muc'];
$qlbao_hanh = $_SESSION['qlbao_hanh'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/ajax.js"></script>
</head>

<body>
    <div>
        <div class="header">
            <nav>
                <ul>
                    <li><a href="index.php?ctrl=statsController">Nguyễn Thanh Thịnh</a></li>
                    <li><a href="/user/index.php">PhoneStore</a></li>
                    <?php
                    if ($qldanh_muc == 1) {
                        echo '<li><a href="index.php?ctrl=categoryController">Danh mục</a></li>';
                    }
                    if ($qlsan_pham == 1) {
                        echo '<li><a href="index.php?ctrl=productController">Sản phẩm</a></li>';
                    }
                    if ($qldon_hang == 1) {
                        echo '<li><a href="index.php?ctrl=orderController">Danh sách đơn hàng</a></li>';
                    }
                    if ($qlkhach_hang == 1) {
                        echo '<li><a href="index.php?ctrl=customerController">Khách hàng</a></li>';
                    }
                    if ($qlnguoi_dung == 1) {
                        echo '<li><a href="index.php?ctrl=userController">Người dùng</a></li>';
                    }
                    if ($qlnha_cung_cap == 1) {
                        echo '<li><a href="index.php?ctrl=supplierController">Nhà cung cấp</a></li>';
                    }
                    if ($qlnhap_kho == 1) {
                        echo '<li><a href="index.php?ctrl=warehouseController">Nhập kho</a></li>';
                    }
                    if ($qlbao_hanh == 1) {
                        echo '<li><a href="index.php?ctrl=warrantyController">Bảo hành</a></li>';
                    }
                    if ($vai_tro == "Quản trị viên") {
                        echo '<li><a href="index.php?ctrl=permissionController">Phân quyền</a></li>';
                    }
                    ?>
                    <li><a href="/login/index.php?ctrl=loginController&action=logout">Đăng xuất</a></li>
                </ul>
            </nav>
            
        </div>
    </div>
    <div class="home">
        <?php
        if (isset($_GET['ctrl'])) {
            $ctrl = $_GET['ctrl'];
            include 'controller/' . $ctrl . '.php';
        }
        ?>