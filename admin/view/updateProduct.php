<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vkA4tf+gfRnJlz9+L0V5kiYcG7Bi4JF3x04fX5uU5fWVJ+u9PwIZgecokFm5P1C5" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="updateProduct">
            <h2 class="lead fs-1" style="margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px dotted black;">Cập nhật sản phẩm</h2>
            <form class="productSubmitUd" action="index.php?ctrl=productController&action=updateProduct" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <div class="mb-3">
                    <label for="ten" class="form-label">Tên:</label>
                    <input type="text" name="ten" value="<?php echo $product['ten']; ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="anh" class="form-label">Hình ảnh:</label>
                    <input type="file" name="anh" accept="image/*" class="form-control">
                    <img src="/image/<?php echo $product['anh']; ?>" alt="Hình ảnh sản phẩm" width="200" class="mt-2">
                    <input type="hidden" name="old_image" value="<?php echo $product['anh']; ?>">
                </div>
                <div class="mb-3">
                    <label for="id_danh_muc" class="form-label">Chọn danh mục:</label>
                    <select name="id_danh_muc" class="form-select" required>
                        <?php
                        foreach ($categorys as $category) {
                            $selected = ($category['id'] == $product['id_danh_muc']) ? 'selected' : '';
                            echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['ten'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gia" class="form-label">Giá:</label>
                    <input type="number" step="0.01" name="gia" value="<?php echo $product['gia']; ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="so_luong" class="form-label">Số lượng:</label>
                    <input type="number" name="so_luong" value="<?php echo $product['so_luong']; ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="mo_ta" class="form-label">Mô tả:</label>
                    <textarea name="mo_ta" rows="5" class="form-control"><?php echo $product['mo_ta']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-NV2DWb1Wti8OY8T4O8wc4OJ1sGJ/Ocp3kiS8BRceP8OVR0sN3gkNDISPDgaFwhB3" crossorigin="anonymous"></script>
</body>

</html>
