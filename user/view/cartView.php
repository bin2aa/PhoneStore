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
                    <img src="/image/<?php echo $productImages[$productId]; ?>" alt="Hình ảnh sản phẩm" width="100">
                    <span>Tên sản phẩm: <?php echo $productNames[$productId]; ?></span><br>
                    <span>Số lượng: <?php echo $quantity; ?></span><br>
                    <span>Giá: <?php echo number_format($productPrices[$productId]); ?> đ</span><br>
                    <a href="/..../removeItem.php?productId=<?php echo $productId; ?>">Xóa khỏi giỏ hàng</a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <!-- Hiển thị thông báo khi giỏ hàng trống -->
            <p>Giỏ hàng của bạn đang trống.</p>
        <?php endif; ?>
        <p>Tổng số lượng sản phẩm: <?php //echo $totalQuantity; 
                                    ?></p>
        <p>Tổng tiền: <?php //echo number_format($totalPrice); 
                        ?> đ</p>
        <a href="/..../clearCart.php">Xóa toàn bộ giỏ hàng</a>
    </div>
</body>

</html>