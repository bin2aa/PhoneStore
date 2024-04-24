<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="style/cartStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="CartContent">
        <h1>Giỏ hàng</h1>

        <div class="cart-items">
            <a href="index.php?ctrl=cartController&action=clearCart">Xóa toàn bộ giỏ hàng</a>
            <?php if (!empty($cartItems)) : ?>
                <?php foreach ($cartItems as $productId => $quantity) : ?>
                    <div class="cart-item">
                        <div class="item-image">
                            <img src="/image/<?php echo $productImages[$productId]; ?>" alt="Hình ảnh sản phẩm" width="100">
                        </div>
                        <div class="item-details">
                            <span class="item-name">Tên sản phẩm: <?php echo $productNames[$productId]; ?></span>
                            <div class="quantity-section">
                                <span>Số lượng:</span>
                                <div class="quantity-buttons">
                                    <button onclick="decrease(<?php echo $productId; ?>, -1)">-</button>
                                    <span id="quantity_<?php echo $productId; ?>"><?php echo $quantity; ?></span>
                                    <button onclick="addToCart(<?php echo $productId; ?>, 1)">+</button>
                                </div>
                            </div>
                            <span>Giá: <?php echo number_format($productPrices[$productId]); ?>,000đ</span>
                        </div>
                        <div class="item-total">
                            <span>Tổng tiền: <?php echo number_format($quantity * $productPrices[$productId]); ?>,000đ</span>
                            <a href="index.php?ctrl=cartController&action=removeFromCart&cart_id=<?php echo $productId; ?>"><i class="fa fa-trash"></i></a>
                        </div>
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
                <input type="text" style="width: 30%; height: 50px" name="ghi_chu" placeholder="Ghi chú"><br>
                <button type="submit">Mua</button>
            </form>

            <!-- <button onclick="buyAll()">Mua</button> <br><br> -->

            <h3>Ưu đải khi mua hàng: </h3>
            <p>Giảm giá 10% cho đơn hàng từ 1.000.000đ trở lên</p>
            <p>Giảm giá 20% cho đơn hàng từ 2.000.000đ trở lên</p>
            <p>Giảm giá 30% cho đơn hàng từ 3.000.000đ trở lên</p>
            <p>Giảm giá 40% cho đơn hàng từ 4.000.000đ trở lên</p>
            <p>Giảm giá 50% cho đơn hàng từ 5.000.000đ trở lên</p>
            <h4>Tất cả sản phẩm khi mua ỏ SGOP sẽ được bảo hành 3 tháng</h4>
        </div>
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
    </script>
</body>



</html>