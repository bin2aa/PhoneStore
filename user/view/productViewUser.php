<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="style/productViewStyle.css">
    <link rel="stylesheet" href="style/SlideStyle.css">
</head>


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
</style>

<body>
    <div id="slideshow">
        <div class="slide-wrapper">
            <div class="slide"><img src="../image/Banner1.png"></div>
            <div class="slide"><img src="../image/Banner2.png"></div>
        </div>
    </div>
    <h1 class="product-list-title">Danh sách sản phẩm</h1>

    <div id="price_slider"></div>
    <p>Từ giá: <span id="price_min_value"></span> - Đến giá: <span id="price_max_value"></span></p>



    <form action="index.php" method="GET">
        <input type="hidden" name="ctrl" value="productControllerUser">
        <input type="hidden" name="action" value="loc">
        <label for="price_min">Từ giá:</label>
        <input type="number" name="price_min" id="price_min" min="0" required><br>
        <label for="price_max">Đến giá:</label>
        <input type="number" name="price_max" id="price_max" min="0" required><br>
        <input type="submit" value="Xác nhận">
    </form>

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
                    </li>
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

    <form action="index.php" method="GET">
        <select name="action">
            <option value="index">Tất cả</option>
            <option value="sortProductsByPriceAsc">Sắp xếp tăng dần</option>
            <option value="sortProductsByPriceDesc">Sắp xếp giảm dần</option>
        </select>
        <input type="hidden" name="ctrl" value="productControllerUser">
        <input type="submit" value="Xác nhận">
    </form>

    <!-- Tìm kiếm sản phẩm theo tên -->
    <form action="index.php" method="GET">
        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm">
        <input type="hidden" name="ctrl" value="productControllerUser">
        <input type="submit" value="Tìm kiếm">
    </form>


    <div class="product-list" id="product-list">
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
                    <!-- <a href="index.php?ctrl=cartController&action=addToCart&cart_id=<?php echo $product['id']; ?>&quantity=1" class="buy-button"><?php echo $product['so_luong'] > 0 ? 'Thêm vào giỏ hàng' : 'Tạm hết hàng'; ?></a> -->
                    <a href="#" class="buy-button" data-product-id="<?php echo $product['id']; ?>"><?php echo $product['so_luong'] > 0 ? 'Thêm vào giỏ hàng' : 'Tạm hết hàng'; ?></a>


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

    <div class="paginationProduct">
        <?php
        // Tính tổng số trang
        $total_pages = ceil($total_products / $item_per_page); //ceil là hàm làm tròn lên
        // Số trang ở đầu và cuối danh sách
        $num_links_side = 2;
        // Hiển thị nút Previous
        if ($current_page > 1) {
            echo "<a href='#' page='" . ($current_page - 1) . "'>&laquo;</a>";
        }
        // Hiển thị trang đầu tiên
        if ($current_page > ($num_links_side + 1)) {
            echo "<a href='#' page='1'>1</a>";
            echo "<span>...</span>";
        }

        // Hiển thị các trang giữa
        for ($i = max(1, $current_page - $num_links_side); $i <= min($current_page + $num_links_side, $total_pages); $i++) {
            echo "<a href='#' page='$i'>$i</a>";
        }



        // Hiển thị trang cuối cùng
        if ($current_page < ($total_pages - $num_links_side)) {
            echo "<span>...</span>";
            echo "<a href='#' page='$total_pages'>$total_pages</a>";
        }

        // Hiển thị nút Next
        if ($current_page < $total_pages) {
            echo "<a href='#' page='" . ($current_page + 1) . "'>&raquo;</a>";
        }
        ?>
    </div>




    <script>
        // Lấy giá trị từ PHP và gán vào biến JavaScript để sử dụng cho ajax productView.js
        var maxPriceFromPHP = <?php echo $maxPrice; ?>;
    </script>

    <!-- Container Hiển thị thông báo khi thêm vào giỏ hàng -->
    <div id="notification" class="notification">
        <span id="notification-text"></span>
        <div class="loading-bar"></div>
    </div>
</body>

</html>

<script>
    //---------------------------Hàm thêm sản phẩm bacsic đê dự phòng--------------------------- 
    // $(document).ready(function() {
    //     // Hiển thị thông báo khi thêm vào giỏ hàng
    //     $('.buy-button').on('click', function(e) {
    //         e.preventDefault();
    //         var productId = $(this).data('product-id'); // Lấy id của sản phẩm từ thuộc tính data-product-id
    //         var quantity = 1; // Số lượng sản phẩm cần thêm vào giỏ hàng
    //         var data = {
    //             cart_id: productId,
    //             quantity: quantity
    //         };
    //         $('#notification').css('display', 'block'); // Hiển thị thông báo bằng css
    //         $('#notification-text').text('');
    //         $.ajax({
    //             url: 'index.php?ctrl=cartController&action=addToCart' + '&cart_id=' + productId + '&quantity=' + quantity,
    //             type: 'POST',
    //             data: data,
    //             success: function(response) {
    //                 $('#notification-text').text('Sản phẩm đã được thêm vào giỏ hàng thành công!');
    //                 setTimeout(function() {
    //                     $('#notification').css('display', 'none'); // Ẩn thông báo bằng css
    //                 }, 500);
    //             },
    //             error: function() {
    //                 alert('Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.');
    //             }
    //         });
    //     });
    // });
    // ---------------------------Thêm sản phẩm ver 2 có thông báo css---------------------------
    $(document).ready(function() {
        var notifications = []; // Mảng lưu trữ các thông báo
        var notificationId = 0; // Biến đếm id của thông báo
        var timeoutId; // Biến để lưu ID của setTimeout
        // Hiển thị thông báo khi thêm vào giỏ hàng
        $('.buy-button').on('click', function(e) {
            e.preventDefault();
            var productId = $(this).data('product-id'); // Lấy id của sản phẩm từ thuộc tính data-product-id
            var quantity = 1; // Số lượng sản phẩm cần thêm vào giỏ hàng
            var data = {
                cart_id: productId,
                quantity: quantity
            };
            clearTimeout(timeoutId);
            var newNotification = $('<div id="notification' + notificationId + '" class="notification" style="top: ' + ((notificationId % 5) * 50 + 60) + 'px;"></div>');
            newNotification.html('<span id="notification-text">Sản phẩm đã được thêm vào giỏ hàng thành công!</span><div class="loading-bar"></div>'); // Thêm nội dung thông báo và thanh tiến trình
            notifications.push(newNotification); // Thêm thông báo mới vào mảng
            $('body').append(newNotification); // Hiển thị thông báo mới lên màn hình
            newNotification.addClass('show'); // Thêm lớp CSS .show để hiển thị thông báo

            $.ajax({
                url: 'index.php?ctrl=cartController&action=addToCart' + '&cart_id=' + productId + '&quantity=' + quantity,
                type: 'POST',
                data: data,
                success: function(response) {
                    setTimeout(function() {
                        newNotification.removeClass('show'); // Xóa lớp CSS .show để ẩn thông báo
                        var index = notifications.indexOf(newNotification);

                        for (var i = index; i < notifications.length; i++) {
                            var top = parseInt(notifications[i].css('top'));
                            notifications[i].css('top', (top - 100) + 'px');
                        }
                    }, 500);
                },
                error: function() {
                    alert('Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.');
                }
            });
            timeoutId = setTimeout(function() {
                notificationId = 0; // Reset notificationId về 0
            }, 1000);
            notificationId++; // Tăng biến đếm id của thông báo
        });
    });
</script>