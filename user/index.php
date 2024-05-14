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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="jsUser/comment.js"></script>
    <script src="jsUser/productView.js"></script>
    <script src="jsUser/cart.js"></script>
    <script src="jsUser/infoUser.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style/css1.css">
    <link rel="stylesheet" href="style/productViewUser.css">
    <link rel="stylesheet" href="style/product_detail.css">
    <link rel="stylesheet" href="style/cartStyle.css">
    <link rel="stylesheet" href="style/infoUser.css">
    <link rel="stylesheet" href="style/editCustomer.css">
    <link rel="stylesheet" href="style/cssOnTop.css">
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
        .content-container{
            background-color: rgb(1,1,1,0.5);
            margin: 20px;
            margin-top: 130px;
            padding: 10px;
            border: 1px solid rgb(255,255,255,0.3);
            border-radius: 10px;
            cursor: default;
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
            <img src="../image/logo.jpg" alt="" height=100px width=100px>
        </a>
        <div class="menu">
            <ul class="menu-list">
                <!-- <li><a href="index.php?ctrl=productControllerUser" class="menu-item">Trang chủ</a></li> -->
                <?php
                // Kiểm tra xem người dùng đã đăng nhập hay chưa
                $ten_dang_nhap = Session::getSessionValue('ten_dang_nhaps');
                $id_khach_hang = Session::getSessionValue('id_khach_hang');
                $vai_tro = Session::getSessionValue('vai_tro');

                // Lấy danh sách quyền từ session

                if ($ten_dang_nhap) {
                    echo '<li><a href="index.php?ctrl=customerUserController" class="menu-item" ><img src="/image/icon/user.png" style= "margin-right: 6px" width="40px">Tên:' . $ten_dang_nhap . " - " . $vai_tro . '</a></li><br>';
                    echo '<li><a href="/login/index.php?ctrl=loginController&action=logout" class="menu-item" onclick="return confirm(\'Bạn có chắc chắn muốn đăng xuất không?\');"><img src="/image/icon/logout.png" style= "margin-right: 6px" width="40px">Đăng xuất</a></li>';
                    if ($vai_tro !== 'khách hàng') {
                        echo '<li><a href="/admin/index.php?ctrl=statsController" class="menu-item"><img src="/image/icon/pie-chart.png" style= "margin-right: 6px" width="40px">Quản lý</a></li>';
                    }
                } else {
                    echo '<li><a href="/login/index.php?ctrl=loginController" class="menu-item"><img src="/image/icon/key.png" style= "margin-right: 6px" width="40px">Đăng nhập</a></li>';
                }
                ?>
                <li> <a href="index.php?ctrl=cartController&action=showCart" class="menu-item"><img src="/image/icon/trolley.png" style="filter:invert(1); margin-right: 6px" width="40px">Giỏ hàng</a></li>
            </ul>
        </div>
    </div>
    <div class="content" id="content-container">
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
                    <h4 class="font-rubik fs-20">Phone store</h4>
                    <p class="fs-14 text-white-50">Đồ án quản lý cửa hàng điện thoại</p>
                    <form class="row g-2">
                        <div class="col">
                            <button type="submit" class="btn btn-primary mb-2">Reload</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-12">
                    <h4 class="font-rubik fs-20">Giáo viên hướng dẫn</h4>
                    <p class="fs-14 text-white-50">Thầy Nguyễn Thanh Sang</p>
                </div>
                <div class="col-lg-2 col-12">
                    <h4 class="font-rubik fs-20">Members</h4>
                    <div class="d-flex flex-column flex-wrap">
                        <a href="#" class="text-white-50 pb-1">Võ Duy Luân |</a>
                        <a href="#" class="text-white-50 pb-1">Bùi Lê Bích Nhung |</a>
                        <a href="#" class="text-white-50 pb-1">Dương Văn Minh Vy |</a>
                        <a href="#" class="text-white-50 pb-1">Nguyễn Thanh Thịnh |</a>
                        <a href="#" class="text-white-50 pb-1">Phạm Nguyễn Phước Thiện</a>
                    </div>
                </div>
                <div class="col-lg-2 col-12">
                    <h4 class="font-rubik fs-20">MSSV</h4>
                    <div class="d-flex flex-column flex-wrap">
                        <a href="#" class="text-white-50 pb-1">mssv-1</a>
                        <a href="#" class="text-white-50 pb-1">mssv-2</a>
                        <a href="#" class="text-white-50 pb-1">mssv-3</a>
                        <a href="#" class="text-white-50 pb-1">3121410040 |</a>
                        <a href="#" class="text-white-50 pb-1">3121410469</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="bg-dark text-white py-2 text-center">
        <p class="fs-14">&copy;Phone Store Web Project - Presented by 13th group, Web Advance 2024</p>
    </div>
    
    <script>
        var container = document.getElementById('content-container');
        if(!container.classList.contains('content-container')){
            container.classList.add('content-container');
        }
    </script>
</body>
</html>