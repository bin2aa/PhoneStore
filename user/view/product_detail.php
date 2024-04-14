<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <style>
        /* Thêm một số kiểu cơ bản */
        .product-detail {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .product-detail img {
            max-width: 100%;
            height: auto;
        }

        /* Kiểu cho phần bình luận */
        .comment-section {
            margin-top: 20px;
        }

        .comment {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ccc;
        }

        .comment p {
            margin: 0;
        }

        .comment .author {
            font-weight: bold;
        }

        .comment-form {
            margin-top: 20px;
        }

        .comment-form textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="product-detail">

        <h1><?php echo $product['ten']; ?></h1>
        <img src="/image/<?php echo $product['anh']; ?>" alt="<?php echo $product['ten']; ?>">
        <p>Giá: <?php echo $product['gia']; ?> đ</p>
        <p>Số lượng còn lại: <?php echo $product['so_luong']; ?></p>
        <p><?php echo $product['mo_ta']; ?></p>
        <?php if ($product['so_luong'] > 0) { ?>
            <a href="index.php?ctrl=cartController&action=addToCart&cart_id=<?php echo $product['id']; ?>&quantity=1" class="buy-button">Thêm vào giỏ hàng</a>
        <?php } else { ?>
            <p>Hiện tại sản phẩm đã hết hàng.</p>
        <?php } ?>


        <!-- ---------------------------------------------------------------------------------- -->
        <div class="comment-section">
            <h2>Bình luận</h2>
            <?php
            if (isset($comments) && count($comments) > 0) {
                // Nếu tồn tại, hiển thị danh sách bình luận
                foreach ($comments as $comment) {
            ?>
                    <div class="comment">
                        <p class="author"><?php echo "ID: ".$comment['id_khach_hang']; ?> - <?php echo "Tên: " .$comment['ten_khach_hang']; ?> - <?php echo $comment['ngay_gio_binh_luan']; ?></p>
                        <p><?php echo $comment['noi_dung']; ?></p>
                        <?php
                        // Kiểm tra xem người dùng đã đăng nhập và có quyền xóa bình luận không
                        if (isset($_SESSION['id_khach_hang']) && $_SESSION['id_khach_hang'] == $comment['id_khach_hang'] || (isset($_SESSION['qlbinh_luan']) && $_SESSION['qlbinh_luan'] == 1)) {
                            // Nếu có, hiển thị nút xóa
                        ?>
                            <form action="index.php?ctrl=commentController&action=deleteComment&id=<?php echo $comment['id']; ?>" method="post">
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
        </div>



        <!-- Form để thêm bình luận mới -->
        <div class="comment-form">
            <h3>Thêm bình luận mới</h3>
            <form action="index.php?ctrl=commentController&action=addComment" method="POST">
                <input type="hidden" name="id_san_pham" value="<?php echo $product['id']; ?>">
                <?php if (isset($_SESSION['id_khach_hang'])) { ?>
                    <input type="hidden" name="id_khach_hang" value="<?php echo $_SESSION['id_khach_hang']; ?>">
                <?php } else { ?>
                    <p> Đăng nhập để bình luận... </p>
                <?php } ?>

                <textarea name="noi_dung" placeholder="Nhập nội dung bình luận" required></textarea>
                <input type="hidden" name="nguoi_dung" value="Khách">
                <input type="hidden" name="ngay_gio_binh_luan" value="<?php echo date('Y-m-d H:i:s'); ?>">
                <button type="submit">Gửi bình luận</button>
            </form>
        </div>
    </div>
    </div>


</body>

</html>