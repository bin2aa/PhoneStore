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
</head>

<body>
    <div>
        <div class="menu">
            <ul>
                <li><a href="home.php">Trang chủ</a></li>
                <?php
                // Kiểm tra xem người dùng đã đăng nhập hay chưa
                $ten_dang_nhap = Session::getSessionValue('ten_dang_nhap');
                if ($ten_dang_nhap) {
                    echo 'Xin chào đồ ngu: ' . $ten_dang_nhap;
                    echo '<li><a href="/logout.php">Đăng xuất</a></li>';
                } else {
                    echo '<li><a href="/login/index.php?ctrl=loginController">Đăng nhập</a></li>';
                }
                ?>
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