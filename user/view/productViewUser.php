<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        /* Thêm CSS tùy chỉnh cho hiển thị danh sách sản phẩm */
    </style>
</head>

<body>
    <h1>Danh sách sản phẩm</h1>
    <div class="product-list">
        <?php
        if (!empty($products)) {
            foreach ($products as $product) {
        ?>
                <div class="product">
                    <h2><?php echo $product['ten']; ?></h2>
                    <img src="/image/<?php echo $product['anh']; ?>" alt="Hình ảnh sản phẩm" width="200"><br>
                    <p>Giá: <?php echo $product['gia']; ?> đ</p>
                    <p>Số lượng: <?php echo $product['so_luong']; ?></p>
                    <p>Mô tả: <?php echo $product['mo_ta']; ?></p>
                </div>
            <?php
            }
        } else {
            ?>
            <p>Không có sản phẩm nào để hiển thị.</p>
        <?php
        }
        ?>
    </div>

</body>

</html>