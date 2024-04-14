<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f8f8f8;
            color: #333;
            line-height: 1.6;
        }

        .product-list-title {
            text-align: center;
            color: #23a6d5;
        }

        .category-list {
            margin-bottom: 20px;
        }

        .category-items {
            list-style-type: none;
            padding: 0;
        }

        .category-item {
            display: inline-block;
            margin-right: 10px;
        }

        .category-link {
            color: #23a6d5;
            text-decoration: none;
        }

        .category-link:hover {
            text-decoration: underline;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 0;
        }

        .product {
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
            width: calc(25% - 10px);
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .product-name {
            color: #e73c7e;
        }

        .product-image-link img {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }

        .product-price,
        .product-stock,
        .product-description {
            margin-bottom: 10px;
        }

        .buy-button {
            display: block;
            background-color: #23a6d5;
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .no-products {
            text-align: center;
        }

        .buy-button:hover {
            background-color: #1f89c0;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .product {
                width: calc(33% - 10px);
            }
        }

        @media (max-width: 768px) {
            .product {
                width: calc(50% - 10px);
            }
        }

        @media (max-width: 480px) {
            .product {
                width: 100%;
            }
        }
    </style>
</head>

<body>
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