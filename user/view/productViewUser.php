<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        /* Thêm CSS tùy chỉnh cho hiển thị danh sách sản phẩm */
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }

        .product img {
            max-width: 200px;
            height: auto;
            margin-bottom: 10px;
        }

        .buy-button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .category-list {
            margin-bottom: 20px;
        }

        .category-list ul {
            list-style-type: none;
            padding: 0;
        }

        .category-list li {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <h1>Danh sách sản phẩm</h1>

    <!-- Danh sách danh mục sản phẩm -->


    <div class="category-list">
        <ul>
        <li><a href="index.php?ctrl=productControllerUser">tất cả</a></li>
            <?php
            if (!empty($categories)) {
                foreach ($categories as $category) {
            ?>
                    <li>
                        <a href="index.php?ctrl=productControllerUser&action=index&id=<?php echo $category['id']; ?>">
                            <?php echo $category['ten']; ?>
                        </a>
                    <?php
                }
            } else {
                    ?>
                    <li>Không có danh mục nào để hiển thị.</li>
                <?php
            }
                ?>
        </ul>
    </div>

    <!-- Danh sách sản phẩm -->
    <div class="product-list">
        <?php
        if (!empty($products)) {
            foreach ($products as $product) {
        ?>
                <div class="product">
                    <h2><?php echo $product['ten']; ?></h2>
                    <a href="product_detail.php?id=<?php echo $product['id']; ?>">
                        <img src="/image/<?php echo $product['anh']; ?>" alt="Hình ảnh sản phẩm" width="200"><br>
                    </a>
                    <p>Giá: <?php echo $product['gia']; ?> đ</p>
                    <p>Số lượng: <?php echo $product['so_luong']; ?></p>
                    <p>Mô tả: <?php echo $product['mo_ta']; ?></p>
                    <a href="index.php?ctrl=cartController&action=addToCart&cart_id=<?php echo $product['id']; ?>&quantity=1" class="buy-button">Thêm vào giỏ hàng</a>
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