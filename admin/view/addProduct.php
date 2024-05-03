<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>

<body>
    <div class="addProduct">

        <h2>Thêm sản phẩm</h2>

        <form class="productSubmitAdd" action="index.php?ctrl=productController&action=addProduct" method="post" enctype="multipart/form-data" >

            <label for="ten">Tên:</label>
            <input type="text" name="ten" required><br>

            <label for="id_danh_muc">Chọn danh mục:</label>
            <select name="id_danh_muc" required>
                <?php
                foreach ($categorys as $category) {
                    echo '<option value="' . $category['id'] . '">' . $category['ten'] . '</option>';
                }
                ?>
            </select><br>


            <label for="anh">Hình ảnh:</label>
            <input type="file" id="anh" name="anh" accept="image/*"><br>

            <label for="gia">Giá:</label>
            <input type="number" step="0.01" name="gia" required><br>

            <label for="so_luong">Số lượng:</label>
            <input type="number" name="so_luong" value="0" disabled><br>

            <label for="mo_ta">Mô tả:</label>
            <textarea name="mo_ta" rows="5"></textarea><br>


            <button type="submit">Thêm sản phẩm</button>
        </form>
    </div>
</body>

</html>