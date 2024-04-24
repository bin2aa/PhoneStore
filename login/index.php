<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <!-- <script src="/js/jquery.min.js"></script> -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="jsLogin/ajaxLogin.js"></script>
</head>
<body>
    <div>
        <div class="menu">
            <ul>
                <!-- <li><a href="index.php">Trang chủ</a></li>
                <li><a href="index.php?ctrl=loginController">Đăng nhập</a></li> -->

            </ul>
        </div>
    </div>
    <div class="homeLogin">
        <?php
        if (isset($_GET['ctrl'])) {
            $ctrl = $_GET['ctrl'];
            include 'controller/' . $ctrl . '.php';
        }
        ?>
    </div>
</body>

</html>