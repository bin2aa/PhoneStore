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

    <div id="price_slider"></div>
    <p>Từ giá: <span id="price_min_value"></span> - Đến giá: <span id="price_max_value"></span></p>



    <form action="index.php" method="GET">
        <input type="hidden" name="ctrl" value="productControllerUser">
        <input type="hidden" name="action" value="sortProductsByPriceRange">
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

    <div class="pagination">
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
        // Lấy giá trị từ PHP và gán vào biến JavaScript để sử dụng cho ajax
        var maxPriceFromPHP = <?php echo $maxPrice; ?>;
    </script>
</body>

</html>

<script>
    $(document).ready(function() {
        // -------------------------------------------
        $('.pagination').on('click', 'a', function(e) {
            e.preventDefault();

            var page = $(this).attr('page');

            $.ajax({
                url: 'index.php?ctrl=productControllerUser&page=' + page,
                type: 'GET',
                success: function(response) {
                    $('.pagination').html($(response).find('.pagination').html());
                    $('.product-list').html($(response).find('.product-list').html());


                    // Cuộn trang đến vị trí của phân trang
                    $('html, body').animate({
                        scrollTop: $('.pagination').offset().top
                    }, 1);

                },
                error: function(xhr, status, error) {
                    console.error('Lỗiiiiiiiiiiiiii:', error);
                }
            });
        });
    });


    //-------------------------------------

    $(function() {
        var minPrice = 1; // Giá nhỏ nhất
        var maxPrice = maxPriceFromPHP; // Giá trị lớn nhất

        $("#price_slider").slider({
            range: true,
            min: minPrice,
            max: maxPrice,
            values: [minPrice, maxPrice],
            slide: function(event, ui) {
                $("#price_min_value").text(ui.values[0]);
                $("#price_max_value").text(ui.values[1]);
            },
            // Sự kiện dừng kéo slider
            stop: function(event, ui) {
                // Gọi hàm ajax khi dừng kéo thanh slider
                filterProducts(ui.values[0], ui.values[1]);
            }
        });

        $("#price_min_value").text($("#price_slider").slider("values", 0));
        $("#price_max_value").text($("#price_slider").slider("values", 1));
    });

    function filterProducts(minPrice, maxPrice) {
        $.ajax({
            url: 'index.php?ctrl=productControllerUser', // Đường dẫn tới file xử lý ajax
            type: 'GET',
            data: {
                price_min: minPrice,
                price_max: maxPrice
            },
            success: function(response) {

                console.log(response);
                // Hiển thị danh sách sản phẩm đã lọc
                // $('#product-list').html(response);

                $('#product-list').html($(response).find('.product-list').html());
                //  $('.pagination').html($(response).find('.pagination').html());
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi nếu có
                console.error(xhr.responseText);
            }
        });
    }
</script>