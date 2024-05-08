<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>

</head>


<body>


    <video autoplay muted loop id="bg-video">
        <source src="../image/vd2.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>

    <div class="product-detail">
        <div class="parent">
            <div class="right-column">
                <h1><?php echo $product['ten']; ?></h1>
                <img src="/image/SanPham/<?php echo $product['anh']; ?>" alt="<?php echo $product['ten']; ?>">
                <p>Giá: <?php echo $product['gia']; ?> đ</p>
                <p>Số lượng còn lại: <?php echo $product['so_luong']; ?></p>
                <p>Mô tả: <?php echo $product['mo_ta']; ?></p>
                <a href="#" class="buy-button" data-product-id="<?php echo $product['id']; ?>" data-product-status="<?php echo $product['so_luong'] > 0 ? 'in-stock' : 'out-of-stock'; ?>">
                    <?php echo $product['so_luong'] > 0 ? 'Thêm vào giỏ hàng' : 'Tạm hết hàng'; ?>
                </a>
            </div>

            <!-- ---------------------------------------------------------------------------------- -->

            <div class="cmtAll">
                <!-- Form để thêm bình luận mới -->
                <div class="comment-form">
                    <h3>Thêm bình luận mới</h3>
                    <form class='addComment'>
                        <input type="hidden" name="id_san_pham" value="<?php echo $product['id']; ?>">
                        <?php if (isset($_SESSION['id_khach_hang'])) { ?>
                            <input type="hidden" name="id_khach_hang" value="<?php echo $_SESSION['id_khach_hang']; ?>">
                        <?php } else { ?>
                            <p> Đăng nhập để bình luận... </p>
                        <?php } ?>

                        <textarea name="noi_dung" placeholder="Nhập nội dung bình luận" required></textarea>
                        <!-- <input type="hidden" name="nguoi_dung" value="Khách"> -->
                        <input type="hidden" name="ngay_gio_binh_luan" value="<?php echo date('Y-m-d H:i:s'); ?>"> <br>
                        <button type="submit">Gửi bình luận</button>
                    </form>
                </div>


                <div class="comment-section">
                    <h2>Bình luận</h2>
                    <?php
                    if (isset($comments) && count($comments) > 0) {
                        // Nếu tồn tại, hiển thị danh sách bình luận
                        foreach ($comments as $comment) {
                    ?>
                            <div class="comment" id="comment-<?php echo $comment['id']; ?>">
                                <p class="author"><?php echo "ID: " . $comment['id_khach_hang']; ?> - <?php echo "Tên: " . $comment['ten_khach_hang']; ?> - <?php echo $comment['ngay_gio_binh_luan']; ?></p>
                                <p><?php echo $comment['noi_dung']; ?></p>
                                <?php
                                // Kiểm tra xem người dùng đã đăng nhập và có quyền xóa bình luận không
                                if (isset($_SESSION['id_khach_hang']) && $_SESSION['id_khach_hang'] == $comment['id_khach_hang'] || (isset($_SESSION['qlbinh_luan']) && $_SESSION['qlbinh_luan'] == 1)) {
                                    // Nếu có, hiển thị nút xóa
                                ?>
                                    <form class="deleteComment" id=<?php echo $comment['id']; ?>>
                                        <button type="submit">Xóa bình luận</button>
                                    </form>
                                <?php } ?>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<p>Chưa có bình luận nào cho sản phẩm này.</p>";
                    }
                    ?>




                    <!-- số trang -->
                    <div class="paginationComment">
                        <?php
                        // Tính tổng số trang
                        $total_pages = ceil($total_comments / $item_per_page); //ceil là hàm làm tròn lên

                        // Số trang ở đầu và cuối danh sách
                        $num_links_side = 2;

                        // Hiển thị trang đầu tiên
                        if ($current_page > ($num_links_side + 1)) {
                            echo "<a href='#' data-page='1'>1</a>";
                            // echo "<a href='?ctrl=productControllerUser&action=detail&id={$product['id']}&page=1'>1</a>";
                            echo "<span>...</span>";
                        }

                        // Hiển thị các trang ở giữa
                        for ($i = max(1, $current_page - $num_links_side); $i <= min($total_pages, $current_page + $num_links_side); $i++) {
                            $active_class = $i == $current_page ? 'active' : '';
                            echo "<a href='#' data-page='$i' class='$active_class'>$i</a>";
                            // echo "<a href='?ctrl=productControllerUser&action=detail&id={$product['id']}&page=$i' class='$active_class'>$i</a>";
                        }

                        // Hiển thị trang cuối cùng
                        if ($current_page < $total_pages) {
                            if ($current_page < ($total_pages - $num_links_side)) {
                                if ($current_page < ($total_pages - $num_links_side - 1)) {
                                    echo "<span>...</span>";
                                }
                                echo "<a href='#' data-page='$total_pages'>$total_pages</a>";
                                // echo "<a href='?ctrl=productControllerUser&action=detail&id={$product['id']}&page=$total_pages'>$total_pages</a>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------------------------  -->
        <?php if (!empty($suggestedProducts)) { ?>
            <div class="suggested-products">
                <h2>BẠN CÓ THỂ THÍCH</h2>
                <div class="product-list">
                    <?php foreach ($suggestedProducts as $suggestedProduct) { ?>
                        <div class="product-item">
                            <a href="index.php?ctrl=productControllerUser&action=detail&id=<?php echo $suggestedProduct['id']; ?>">
                                <img src="/image/SanPham/<?php echo $suggestedProduct['anh']; ?>" alt="<?php echo $suggestedProduct['ten']; ?>">
                                <h3><?php echo $suggestedProduct['ten']; ?></h3>
                                <p>Giá: <?php echo number_format($suggestedProduct['gia'], 0, ',', '.'); ?> đ</p>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <!-- -------------- -->


    </div>

    <script>
        //Lấy product_id từ comment.js
        var product_id = <?php echo $product['id']; ?>;
    </script>

</body>

</html>