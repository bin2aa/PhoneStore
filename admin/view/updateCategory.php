<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật danh mục sản phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vkA4tf+gfRnJlz9+L0V5kiYcG7Bi4JF3x04fX5uU5fWVJ+u9PwIZgecokFm5P1C5" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="updateCategory">

            <h2 style="margin-bottom: 10px;">Cập nhật danh mục sản phẩm</h2>

            <form class="categorySubmitUd" action="index.php?ctrl=categoryController&action=updateCategory" method="post">

                <input type="hidden" name="category_id" value="<?php echo $category['id']; ?>">

                <div class="mb-3">
                    <label for="ten" class="form-label">Tên danh mục:</label>
                    <input type="text" name="ten" value="<?php echo $category['ten']; ?>" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Cập nhật danh mục</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-NV2DWb1Wti8OY8T4O8wc4OJ1sGJ/Ocp3kiS8BRceP8OVR0sN3gkNDISPDgaFwhB3" crossorigin="anonymous"></script>
</body>

</html>
