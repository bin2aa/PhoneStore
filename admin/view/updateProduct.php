<!-- updateProduct.php -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
</head>

<body>
    <h2>Cập nhật sản phẩm</h2>
    <form action="index.php?ctrl=productController&action=updateProduct" method="post" class="update-product-btn">

        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">

        <label for="ten">Tên:</label>
        <input type="text" name="ten" value="<?php echo $product['ten']; ?>" required><br>


        <!-- accept="image/*" chỉ cho sử dung tệp hình ảnh -->
        <label for="anh">Hình ảnh:</label>
        <input type="file" name="anh" accept="image/*"><br>
        <img src="/image/<?php echo $product['anh']; ?>" alt="Hình ảnh sản phẩm" width="200"><br>
        <?php echo $product['anh']; ?><br>

        <label for="id_danh_muc">Chọn danh mục:</label>
        <select name="id_danh_muc" required>
            <?php
            foreach ($categorys as $category) {
                echo '<option value="' . $category['id'] . '">' . $category['ten'] . '</option>';
            }
            ?>
        </select><br>

        <label for="gia">Giá:</label>
        <input type="number" step="0.01" name="gia" value="<?php echo $product['gia']; ?>" required><br>

        <label for="so_luong">Số lượng:</label>
        <input type="number" name="so_luong" value="<?php echo $product['so_luong']; ?>" required><br>

        <label for="mo_ta">Mô tả:</label>
        <textarea name="mo_ta" rows="5"><?php echo $product['mo_ta']; ?></textarea><br>


        <button type="submit">Cập nhật sản phẩm</button>
    </form>
</body>

</html>