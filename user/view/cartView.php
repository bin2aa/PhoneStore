<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <style>
        /* Thêm CSS tùy chỉnh cho giao diện giỏ hàng */
        .cart-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .cart-item img {
            max-width: 100px;
            height: auto;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <h1>Giỏ hàng</h1>
    <div class="cart-items">
        <?php if (!empty($cartItems)) : ?>
            <?php foreach ($cartItems as $productId => $quantity) : ?>
                <div class="cart-item">
                    <img src="/image/<?php echo $productImages[$productId]; ?>" alt="Hình ảnh sản phẩm" width="100"><br>
                    <span>Tên sản phẩm: <?php echo $productNames[$productId]; ?></span><br>
                    <span>Số lượng:
                        <div class="quantity-buttons">
                            <button onclick="decrease(<?php echo $productId; ?>, -1)">-</button>
                            <span id="quantity_<?php echo $productId; ?>"><?php echo $quantity; ?></span>
                            <button onclick="addToCart(<?php echo $productId; ?>, 1)">+</button>
                        </div>
                    </span><br>
                    <span>Giá: <?php echo number_format($productPrices[$productId]); ?>,000đ</span><br>
                    <a href="index.php?ctrl=cartController&action=removeFromCart&cart_id=<?php echo $productId; ?>">Xóa khỏi giỏ hàng</a>
                </div>
            <?php endforeach; ?>
            <!-- Thêm nút button để mua toàn bộ giỏ hàng -->
        <?php else : ?>
            <!-- Hiển thị thông báo khi giỏ hàng trống -->
            <p>Giỏ hàng của bạn đang trống.</p>
        <?php endif; ?>
        <p>Tổng số lượng sản phẩm: <?php echo $totalQuantity; ?></p>
        <p>Tổng tiền: <?php echo number_format($totalPrice); ?> đ</p>

        <form method="post" action="index.php?ctrl=cartController&action=createOrder" onsubmit='return checkLoggedIn()'>
            <?php if (isset($_SESSION['id_khach_hang'])) : ?>
                <input type="hidden" name="id_khach_hang" value="<?php echo $_SESSION['id_khach_hang']; ?>">
                <input type="hidden" name="tong_tien" value="<?php echo $totalPrice; ?>">
            <?php endif; ?>
            <input type="text" name="ghi_chu" placeholder="Ghi chú">
            <button type="submit">Mua</button>
        </form>

        <!-- <button onclick="buyAll()">Mua</button> <br><br> -->


        <a href="index.php?ctrl=cartController&action=clearCart">Xóa toàn bộ giỏ hàng</a>
    </div>

    <script>
        function addToCart(productId, quantity) {
            var url = 'index.php?ctrl=cartController&action=addToCart&cart_id=' + productId + '&quantity=' + quantity;
            window.location.href = url;
        }

        function decrease(productId, quantity) {
            var url = 'index.php?ctrl=cartController&action=decreaseQuantity&cart_id=' + productId + '&quantity=' + quantity;
            window.location.href = url;
        }

        function checkLoggedIn() {
            var isLoggedIn = <?php echo isset($_SESSION['id_khach_hang']) ? 'true' : 'false'; ?>;
            var totalQuantity = <?php echo $totalQuantity; ?>;
            if (!isLoggedIn) {
                alert('Vui lòng đăng nhập trước khi mua hàng.');
                return false;
            } else if (totalQuantity === 0) {
                alert('Giỏ hàng của bạn đang trống. Vui lòng chọn sản phẩm trước khi mua.');
                return false;
            }
            return true;
        }

        // function buyAll() {
        //     if (checkLoggedIn()) {

        //         startSession();
        //         var totalPrice = <?php //echo $totalPrice; 
                                    ?>;
        //         setSessionValue('totalPrice', totalPrice);

        //         var url = 'index.php?ctrl=orderUserController&action=createOrder';
        //         window.location.href = url;
        //     } else {
        //         alert('Vui lòng đăng nhập trước khi mua hàng.');
        //     }
        // }

        // function checkLoggedIn() {
        //     // Kiểm tra xem người dùng đã đăng nhập hay chưa bằng cách kiểm tra giá trị phiên 'ten_dang_nhap'
        //     // Trả về true nếu đã đăng nhập và false nếu chưa
        //     <?php
                //     $ten_dang_nhap = Session::getSessionValue('ten_dang_nhap');
                //     if ($ten_dang_nhap) {
                //         echo 'return true;';
                //     } else {
                //         echo 'return false;';
                //     }

                //     
                ?>
        // }
    </script>
</body>



<!-- Thêm 1 input ghi chú ở cuối và nhập ghi chú trước khi mua hàng
Lấy tổng tiên lưu vào biến session
-->

</html>