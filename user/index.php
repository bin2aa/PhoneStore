<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Danh sách sản phẩm</title>
</head>


<style>

</style>

<body>
    <div class="productViewUser">
        <!-- <div id="slideshow">
        <div class="slide-wrapper">
            <div class="slide"><img src="../image/Banner1.png"></div>
            <div class="slide"><img src="../image/Banner2.png"></div>
        </div>
        </div> -->

        <video autoplay muted loop id="bg-video">
            <source src="../image/vd3.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>

        <div class="product-container">
            <h1 class="product-list-title lead">Danh sách sản phẩm</h1>

            <div class="price-MintoMaxlink">
                <form action="index.php" method="GET">
                    <input type="hidden" name="ctrl" value="productControllerUser">
                    <label for="price_min">Tìm kiếm theo khoảng giá từ:</label>
                    <input type="number" name="price_min" id="price_min" min="0" required><br>
                    <label for="price_max">đến:</label>
                    <input type="number" name="price_max" id="price_max" min="0" required><br>
                    <input type="submit" value="Xác nhận">
                </form>
            </div>

            <div class="category-list">
                <ul class="category-items">Danh mục sản phẩm: 
                    <li class="category-item"><a href="index.php?ctrl=productControllerUser" class="category-link">tất cả</a></li>
                    <?php
                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                    ?>
                            <li class="category-item">
                                <a href="index.php?ctrl=productControllerUser&action=index&id=<?php echo $category['id']; ?>&filter=category" class="category-link">
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

            <div class="d-flex align-items-center mb-3 product-search-handler">
                <div id="sortAscOrDesc" class="sortAscOrDesc me-3">
                    <form action="index.php" method="GET">
                        <input type="hidden" name="ctrl" value="productControllerUser">
                        <select name="action" class="form-select">
                            <option value="index">Mặc định</option>
                            <option value="sortProductsByPriceAsc">Sắp xếp tăng dần</option>
                            <option value="sortProductsByPriceDesc">Sắp xếp giảm dần</option>
                        </select>
                        <input type="submit" value="Sắp xếp" class="btn btn-primary">
                    </form>
                </div>

                <!-- Tìm kiếm sản phẩm theo tên -->
                <form class="search-form-productUser">
                    <input type="text" id="search" name="search" placeholder="Tìm kiếm sản phẩm" class="form-control me-2">
                    <input type="submit" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>

            <p style="color: white;">Lọc khoảng giá bằng slider từ: <span id="price_min_value"></span> đến: <span id="price_max_value"></span></p>
            <div id="price_slider"></div>


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
                            <p>-----------------</p>
                            <p class="product-price">Giá: <?php echo $product['gia']; ?> đ</p>
                            <p class="product-stock">Còn lại: <?php echo $product['so_luong']; ?></p>
                            <!-- <p class="product-description">Mô tả: <?php echo $product['mo_ta']; ?></p> -->
                            <a href="#" class="buy-button" data-product-id="<?php echo $product['id']; ?>" data-product-status="<?php echo $product['so_luong'] > 0 ? 'in-stock' : 'out-of-stock'; ?>">
                                <?php echo $product['so_luong'] > 0 ? 'Thêm vào giỏ hàng' : 'Tạm hết hàng'; ?>
                            </a>

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
                    echo "<a href='#' data-page='" . ($current_page - 1) . "'>&laquo;</a>";
                }
                // Hiển thị trang đầu tiên
                if ($current_page > ($num_links_side + 1)) {
                    echo "<a href='#' data-page='1'>1</a>";
                    echo "<span>...</span>";
                }

                // Hiển thị các trang giữa
                for ($i = max(1, $current_page - $num_links_side); $i <= min($current_page + $num_links_side, $total_pages); $i++) {
                    if ($i == $current_page) {
                        echo "<a href='#' data-page='$i' style='background-color: white; color: black;'>$i</a>";
                    } else {
                        echo "<a href='#' data-page='$i'>$i</a>";
                    }
                }



                // Hiển thị trang cuối cùng
                if ($current_page < ($total_pages - $num_links_side)) {
                    echo "<span>...</span>";
                    echo "<a href='#' data-page='$total_pages'>$total_pages</a>";
                }

                // Hiển thị nút Next
                if ($current_page < $total_pages) {
                    echo "<a href='#' data-page='" . ($current_page + 1) . "'>&raquo;</a>";
                }
                ?>
            </div>
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
    </div>
</body>

</html>

<script>
    $(document).ready(function() {


    });
</script>
