<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vkA4tf+gfRnJlz9+L0V5kiYcG7Bi4JF3x04fX5uU5fWVJ+u9PwIZgecokFm5P1C5" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="addProduct">
            <h2 class="lead fs-1" style="margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px dotted black;">Thêm sản phẩm</h2>
            <form class="productSubmitAdd" action="index.php?ctrl=productController&action=addProduct" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="ten" class="form-label">Tên:</label>
                    <input type="text" name="ten" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="id_danh_muc" class="form-label">Chọn danh mục:</label>
                    <select name="id_danh_muc" class="form-select" required>
                        <?php
                        foreach ($categorys as $category) {
                            echo '<option value="' . $category['id'] . '">' . $category['ten'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="anh" class="form-label">Hình ảnh:</label>
                    <input type="file" id="anh" name="anh" accept="image/*" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="gia" class="form-label">Giá:</label>
                    <input type="number" step="0.01" name="gia" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="so_luong" class="form-label">Số lượng:</label>
                    <input type="number" name="so_luong" value="0" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label for="mo_ta" class="form-label">Mô tả:</label>
                    <textarea name="mo_ta" rows="5" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-NV2DWb1Wti8OY8T4O8wc4OJ1sGJ/Ocp3kiS8BRceP8OVR0sN3gkNDISPDgaFwhB3" crossorigin="anonymous"></script>
</body>

</html>
