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
                <li><a href="index.php">PhoneStore</a></li>
                <li><a href="index.php?ctrl=categoryController">Danh mục</a></li>
                <li><a href="index.php?ctrl=productController">Sản phẩm</a></li>
                <li><a href="index.php?ctrl=orderController">Danh sách đơn hàng</a></li>
                <li><a href="index.php?ctrl=customerController">Khách hàng</a></li>
                <li><a href="index.php?ctrl=userController">Người dùng</a></li>
                <li><a href="index.php?ctrl=supplierController">Nhà cung cấp</a></li>
                <li><a href="index.php?ctrl=warehouseController">Nhập kho</a></li>

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