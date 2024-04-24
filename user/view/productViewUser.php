<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="style/productViewStyle.css">
    <link rel="stylesheet" href="style/SlideStyle.css">

</head>

<body>
<div id="slideshow">
  <div class="slide-wrapper">
    <div class="slide"><img src="../image/Banner1.png"></div>
    <div class="slide"><img src="../image/Banner2.png"></div>
  </div>
</div>
    <h1 class="product-list-title">Danh sách sản phẩm</h1>

    <div class="category-list">
        <ul class="category-items">
            <li class="category-item"><a href="index.php?ctrl=productControllerUser" class="category-link">tất cả</a></li>
            <?php
            if (!empty($categories)) {
                foreach ($categories as $category) {
            ?>
                    <li class="category-item">
                        <a href="index.php?ctrl=productControllerUser&action=index&id=<?php echo $category['id']; ?>" class="category-link">
                            <?php echo $category['ten']; ?>
                        </a>
                    <?php
                }
            } else {
                    ?>
                    <li class="category-item">Không có danh mục nào để hiển thị.</li>
                <?php
            }
                ?>
        </ul>
    </div>

    <div class="product-list">
        <?php
        if (!empty($products)) {
            foreach ($products as $product) {
        ?>
                <div class="product">
                    <h2 class="product-name"><?php echo $product['ten']; ?></h2>
                    <a href="index.php?ctrl=productControllerUser&action=detail&id=<?php echo $product['id']; ?>" class="product-image-link">
                        <img src="/image/<?php echo $product['anh']; ?>" alt="Hình ảnh sản phẩm" width="200"><br>
                    </a>
                    <p class="product-price">Giá: <?php echo $product['gia']; ?> đ</p>
                    <p class="product-stock">Còn lại: <?php echo $product['so_luong']; ?></p>
                    <p class="product-description">Mô tả: <?php echo $product['mo_ta']; ?></p>
                    <a href="index.php?ctrl=cartController&action=addToCart&cart_id=<?php echo $product['id']; ?>&quantity=1" class="buy-button"><?php echo $product['so_luong'] > 0 ? 'Thêm vào giỏ hàng' : 'Tạm hết hàng'; ?></a>
                </div>
            <?php
            }
        } else {
            ?>
            <p class="no-products">Không có sản phẩm nào để hiển thị.</p>
        <?php
        }
        ?>
    </div>
</body>

</html>