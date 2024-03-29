<?php
// Bắt đầu session
include(__DIR__ . '/../lib/session.php');
Session::startSession();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/ajax.js"></script> -->
</head>

<body>
    <div>
        <div class="menu">
            <ul>
                <li><a href="home.php">Trang chủ</a></li>
                <li><a href="index.php?ctrl=productControllerUser">Sản phẩm</a></li>
                <?php
                // Kiểm tra xem người dùng đã đăng nhập hay chưa
                $ten_dang_nhap = Session::getSessionValue('ten_dang_nhap');
                $id_khach_hang = Session::getSessionValue('id_khach_hang');
                if ($ten_dang_nhap) {
                    echo 'Xin chào đồ ngu: ' . $ten_dang_nhap . '  |  ';
                    echo 'Id khách hàng: ' . $id_khach_hang; ?>
                    <br>
                <?php
                    echo '<a href="index.php?ctrl=customerUserController">Thông tin cá nhân</a>';
                    echo '<li><a href="/login/index.php?ctrl=loginController&action=viewChangePassword">Đổi mật khẩu</a></li>';
                    echo '<li><a href="/login/index.php?ctrl=loginController&action=logout">Đăng xuất</a></li>';
                } else {
                    echo '<li><a href="/login/index.php?ctrl=loginController">Đăng nhập</a></li>';
                }
                ?>
                <li> <a href="index.php?ctrl=cartController&action=showCart">Giỏ hàng</a></li>
            </ul>
        </div>
    </div>

    <div class="home">
        <?php
        if (!isset($_GET['ctrl'])) {
            include 'controller/productControllerUser.php';
        } else {
            $ctrl = $_GET['ctrl'];
            include 'controller/' . $ctrl . '.php';
        }
        ?>
    </div>
</body>

</html>