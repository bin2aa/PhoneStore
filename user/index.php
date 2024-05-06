<?php
// Bắt đầu session
include(__DIR__ . '/../lib/session.php');
include(__DIR__ . '/../lib/database.php');
Session::startSession();

//Đăt múi giờ Việt Nam cho các datetime
date_default_timezone_set('Asia/Ho_Chi_Minh');


?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="jsUser/comment.js"></script>
    <script src="jsUser/productView.js"></script>
    <script src="jsUser/cart.js"></script>
    <script src="jsUser/infoUser.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style/css1.css">
    <link rel="stylesheet" href="style/productViewUser.css">
    <link rel="stylesheet" href="style/product_detail.css">
    <link rel="stylesheet" href="style/cartStyle.css">
    <!-- <link rel="stylesheet" href="style/homeStyle.css"> -->
    <!-- <link rel="stylesheet" href="style/productViewStyle.css"> -->
    <!-- <link rel="stylesheet" href="style/SlideStyle.css"> -->


    <style>
        .notification {
            display: none;
            position: fixed;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: mediumseagreen;
            color: white;
            padding: 10px 20px;
            border-radius: 300px;
            z-index: 9999;
            transition: top 0.5s ease-out;
        }

        .notification.show {
            display: block;
        }

        .loading-bar {
            height: 4px;
            background-color: #fff;
            width: 0%;
            animation: loading 0.5s linear;
        }

        @keyframes loading {
            0% {
                width: 0%;
            }

            100% {
                width: 100%;
            }
        }
    </style>

</head>

<body>


    <!-- Container Hiển thị thông báo khi thêm vào giỏ hàng -->
    <div id="notification" class="notification">
        <span id="notification-text"></span>
        <div class="loading-bar"></div>
    </div>



    <div class="header">
        <a href="index.php?ctrl=productControllerUser" class="logo">
            <img src="../image/logo.jpg"  alt="" height=100px width=100px>
        </a>
        <div class="menu">
            <ul class="menu-list">
                <!-- <li><a href="index.php?ctrl=productControllerUser" class="menu-item">Trang chủ</a></li> -->
                <?php
                // Kiểm tra xem người dùng đã đăng nhập hay chưa
                $ten_dang_nhap = Session::getSessionValue('ten_dang_nhap');
                $id_khach_hang = Session::getSessionValue('id_khach_hang');
                $vai_tro = Session::getSessionValue('vai_tro');

                // Lấy danh sách quyền từ session

                if ($ten_dang_nhap) {
                    echo '<li><a href="index.php?ctrl=customerUserController" class="menu-item" >Tên:' . $ten_dang_nhap . " - " . $vai_tro . '</a></li><br>';
                    echo '<li><a href="/login/index.php?ctrl=loginController&action=logout" class="menu-item" onclick="return confirm(\'Bạn có chắc chắn muốn đăng xuất không?\');">Đăng xuất</a></li>';
                    if ($vai_tro !== 'Khách hàng') {
                        echo '<li><a href="/admin/index.php" class="menu-item">Quản lý</a></li>';
                    }
                } else {
                    echo '<li><a href="/login/index.php?ctrl=loginController" class="menu-item">Đăng nhập</a></li>';
                }
                ?>
                <li> <a href="index.php?ctrl=cartController&action=showCart" class="menu-item">Giỏ hàng</a></li>
            </ul>
        </div>

    </div>
    <div class="content">
        <?php
        if (!isset($_GET['ctrl'])) {
            include 'controller/productControllerUser.php';
        } else {
            $ctrl = $_GET['ctrl'];
            include 'controller/' . $ctrl . '.php';
        }
        ?>
    </div>
    <footer id="footer" class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <h4 class="font-rubik font-size-20">Mobile Shopee</h4>
                    <p class="font-size-14 font-rale text-white-50">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, deserunt.</p>
                </div>
                <div class="col-lg-4 col-12">
                    <h4 class="font-rubik font-size-20">Newslatter</h4>
                    <form class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Email *">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary mb-2">Subscribe</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2 col-12">
                    <h4 class="font-rubik font-size-20">Information</h4>
                    <div class="d-flex flex-column flex-wrap">
                        <a href="#" class="font-rale font-size-14 text-white-50 pb-1">About Us</a>
                        <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Delivery Information</a>
                        <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Privacy Policy</a>
                        <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Terms & Conditions</a>
                    </div>
                </div>
                <div class="col-lg-2 col-12">
                    <h4 class="font-rubik font-size-20">Account</h4>
                    <div class="d-flex flex-column flex-wrap">
                        <a href="#" class="font-rale font-size-14 text-white-50 pb-1">My Account</a>
                        <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Order History</a>
                        <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Wish List</a>
                        <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Newslatters</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright text-center bg-dark text-white py-2">
        <p class="font-rale font-size-14">&copy; Copyrights 2020. Desing By <a href="#" class="color-second">Daily Tuition</a></p>
    </div>

</body>

</html>