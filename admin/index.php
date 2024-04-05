<?php
// Bắt đầu session
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['ten_dang_nhap'])) {
    // Chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: /login/index.php?ctrl=loginController");
    exit; // Dừng việc thực thi mã sau khi chuyển hướng
}

// Kiểm tra vai trò của người dùng
$vai_tro = $_SESSION['vai_tro'];
$qlnhap_kho = $_SESSION['qlnhap_kho'];
$qlnha_cung_cap = $_SESSION['qlnha_cung_cap'];
$qlnguoi_dung = $_SESSION['qlnguoi_dung'];
$qlkhach_hang = $_SESSION['qlkhach_hang'];
$qldon_hang = $_SESSION['qldon_hang'];
$qlsan_pham = $_SESSION['qlsan_pham'];
$qldanh_muc = $_SESSION['qldanh_muc'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <!-- <script src="/js/jquery.min.js"></script> -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/ajax.js"></script>
</head>

<body>
    <div>
        <div class="menu">
            <ul>

                <li><a href="/login/index.php?ctrl=loginController&action=logout">Đăng xuất</a></li>
                <li><a href="/user/index.php">PhoneStore</a></li>

                <?php
                if ($qldanh_muc == 1) {
                    echo '<li><a href="index.php?ctrl=categoryController">Danh mục</a></li>';
                } else {
                    // echo '<script> alert("Bạn không có quyền truy cập vào trang này")</script>';
                    exit;
                }
                if ($qlsan_pham == 1) {
                    echo '<li><a href="index.php?ctrl=productController">Sản phẩm</a></li>';
                } else {
                    // echo '<script> alert("Bạn không có quyền truy cập vào trang này")</script>';
                    exit;
                }
                if ($qldon_hang == 1) {
                    echo '<li><a href="index.php?ctrl=orderController">Danh sách đơn hàng</a></li>';
                } else {
                    // echo '<script> alert("Bạn không có quyền truy cập vào trang này")</script>';
                    exit;
                }
                if ($qlkhach_hang == 1) {
                    echo '<li><a href="index.php?ctrl=customerController">Khách hàng</a></li>';
                } else {
                    // echo '<script> alert("Bạn không có quyền truy cập vào trang này")</script>';
                    exit;
                }
                if ($qlnguoi_dung == 1) {
                    echo '<li><a href="index.php?ctrl=userController">Người dùng</a></li>';
                } else {
                    // echo '<script> alert("Bạn không có quyền truy cập vào trang này")</script>';
                    exit;
                }
                if ($qlnha_cung_cap == 1) {
                    echo '<li><a href="index.php?ctrl=supplierController">Nhà cung cấp</a></li>';
                } else {
                    // echo '<script> alert("Bạn không có quyền truy cập vào trang này")</script>';
                    exit;
                }
                if ($qlnhap_kho == 1) {
                    echo '<li><a href=" index.php?ctrl=warehouseController">Nhập kho</a></li>';
                } else {
                    // echo '<script> alert("Bạn không có quyền truy cập vào trang này")</script>';
                    exit;
                }
                ?>
                <?php
                if ($vai_tro == "Quản trị viên") {
                    echo '<li><a href="index.php?ctrl=permissionController">Phân quyền</a></li>';
                }
                ?>

            </ul>
        </div>
    </div>
    <div class="home">
        <?php
        if (isset($_GET['ctrl'])) {
            $ctrl = $_GET['ctrl'];
            include 'controller/' . $ctrl . '.php';
        }
        ?>
    </div>
</body>

</html>

