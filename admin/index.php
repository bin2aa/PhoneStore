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
$qlgiam_gia = $_SESSION['qlgiam_gia'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/formUpdate-Add.css">
    <!-- Thư viện ajax -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Thư viện BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vkA4tf+gfRnJlz9+L0V5kiYcG7Bi4JF3x04fX5uU5fWVJ+u9PwIZgecokFm5P1C5" crossorigin="anonymous">
    <!-- JavaScript -->
    <script src="js/ajax.js"></script>
    <script src="js/searchAjax.js"></script>
    <script src="js/showUpdate-Add.js"></script>
    <script src="js/delete.js"></script>

</head>

<body style="margin: 0;">
    <div class="backgroundHolder">
        <img src="/admin/img/icon/bg.jpg"alt="background">
    </div>

    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/user/index.php">
                    <img src="/admin/img/icon/home2.png" alt="logo" width="30" height="30" class="d-inline-block align-top" style="filter: invert(80%);">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item manageSector">
                            <a class="nav-link" href="index.php?ctrl=statsController">Thống kê</a>
                        </li>
                <?php if ($qldanh_muc == 1): ?>
                    <li class="nav-item manageSector">
                        <a class="nav-link" href="index.php?ctrl=categoryController">Danh mục</a>
                    </li>
                <?php endif; ?>
                <?php if ($qlsan_pham == 1): ?>
                    <li class="manageSector">
                        <a href="index.php?ctrl=productController">Sản phẩm</a>
                    </li>
                <?php endif; ?>
                <?php if ($qldon_hang == 1): ?>
                    <li class="manageSector">
                        <a href="index.php?ctrl=orderController">Đơn hàng</a>
                    </li>
                <?php endif; ?>
                <?php if ($qlkhach_hang == 1): ?>
                    <li class="manageSector">
                        <a href="index.php?ctrl=customerController">Khách hàng</a>
                    </li>
                <?php endif; ?>
                <?php if ($qlnguoi_dung == 1): ?>
                    <li class="manageSector">
                        <a href="index.php?ctrl=userController">Người dùng</a>
                    </li>
                <?php endif; ?>
                <?php if ($qlnha_cung_cap == 1): ?>
                    <li class="manageSector">
                        <a href="index.php?ctrl=supplierController">Nhà C.Cấp</a>
                    </li>
                <?php endif; ?>
                <?php if ($qlnhap_kho == 1): ?>
                    <li class="manageSector">
                        <a href="index.php?ctrl=warehouseController">Nhập kho</a>
                    </li>
                <?php endif; ?>
                <?php if ($qlbao_hanh == 1): ?>
                    <li class="manageSector">
                        <a href="index.php?ctrl=warrantyController">Bảo hành</a>
                    </li>
                <?php endif; ?>
                <?php if ($qlgiam_gia == 1): ?>
                    <li class="manageSector">
                        <a href="index.php?ctrl=discountController">Giảm giá</a>
                    </li>
                <?php endif; ?>
                <?php if ($vai_tro == "Quản trị viên"): ?>
                    <li class="manageSector">
                        <a href="index.php?ctrl=permissionController">Phân quyền</a>
                    </li>
                <?php endif; ?>
                <li class="logout">
                    <a href="/login/index.php?ctrl=loginController&action=logout" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không?');">Đăng xuất</a>
                </li>
            </ul>
        </nav>

    </div>
    <div class="temp"></div>
    <div class="container">
        <div class="home">
            <?php
            if (isset($_GET['ctrl'])) {
                $ctrl = $_GET['ctrl'];
                include 'controller/' . $ctrl . '.php';
            }
            ?>
        </div>
    </div>

    <script>
    const sectors = document.getElementsByClassName('manageSector');
    const controllerIndexMap = {
        'statsController': 0,
        'categoryController': 1,
        'productController': 2,
        'orderController': 3,
        'customerController': 4,
        'userController': 5,
        'supplierController': 6,
        'warehouseController': 7,
        'warrantyController': 8,
        'discountController': 9,
        'permissionController': 10
    };

    var currentUrl = window.location.href;

    for (let i = 0; i < sectors.length; i++) {
        if (sectors[i].classList.contains('selected'))
            sectors[i].classList.remove('selected');
    }

    for (const controller in controllerIndexMap)
        if (currentUrl.includes(controller)) {
            sectors[controllerIndexMap[controller]].classList.add('selected');
            break;
        }

    </script>
</body>