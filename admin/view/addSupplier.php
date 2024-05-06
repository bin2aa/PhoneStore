<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhà cung cấp</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vkA4tf+gfRnJlz9+L0V5kiYcG7Bi4JF3x04fX5uU5fWVJ+u9PwIZgecokFm5P1C5" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="addSupplier">
            <h2>Thêm nhà cung cấp</h2>
            <form class="supplierSubmitAdd" action="index.php?ctrl=supplierController&action=addSupplier" method="post">
                <div class="mb-3">
                    <label for="ten" class="form-label">Tên nhà cung cấp:</label>
                    <input type="text" name="ten" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="so_dien_thoai" class="form-label">Số điện thoại:</label>
                    <input type="text" name="so_dien_thoai" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="dia_chi" class="form-label">Địa chỉ:</label>
                    <input type="text" name="dia_chi" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Thêm nhà cung cấp</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-NV2DWb1Wti8OY8T4O8wc4OJ1sGJ/Ocp3kiS8BRceP8OVR0sN3gkNDISPDgaFwhB3" crossorigin="anonymous"></script>
</body>

</html>
