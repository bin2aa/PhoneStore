<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới phiếu bảo hành</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vkA4tf+gfRnJlz9+L0V5kiYcG7Bi4JF3x04fX5uU5fWVJ+u9PwIZgecokFm5P1C5" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="addWarranty">

            <h1 class="mb-4">Thêm mới phiếu bảo hành</h1>

            <form class="warrantySubmitAdd" action="index.php?ctrl=warrantyController&action=addWarranty" method="post">
                <div class="mb-3">
                    <label for="id_san_pham" class="form-label">Sản phẩm:</label>
                    <select name="id_san_pham" id="id_san_pham" class="form-select">
                        <?php foreach ($products as $product) : ?>
                            <option value="<?php echo $product['id']; ?>"><?php echo $product['ten']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_don_hang" class="form-label">Đơn hàng:</label>
                    <select name="id_don_hang" id="id_don_hang" class="form-select">
                        <?php foreach ($orders as $order) : ?>
                            <option value="<?php echo $order['id']; ?>"><?php echo $order['id']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ngay_lap" class="form-label">Ngày lập:</label>
                    <input type="datetime-local" name="ngay_lap" id="ngay_lap" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="ngay_het_han" class="form-label">Ngày hết hạn:</label>
                    <input type="datetime-local" name="ngay_het_han" id="ngay_het_han" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="tinh_trang" class="form-label">Tình trạng:</label>
                    <select name="tinh_trang" id="tinh_trang" class="form-select">
                        <option value="Đang bảo hành">Đang bảo hành</option>
                        <option value="Chờ xử lý">Chờ xử lý</option>
                        <option value="Đã từ chối">Đã từ chối</option>
                        <option value="Đã hoàn thành">Đã hoàn thành</option>
                        <option value="Hết hạn bảo hành">Hết hạn bảo hành</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ghi_chu" class="form-label">Ghi chú:</label>
                    <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Thêm phiếu bảo hành</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-NV2DWb1Wti8OY8T4O8wc4OJ1sGJ/Ocp3kiS8BRceP8OVR0sN3gkNDISPDgaFwhB3" crossorigin="anonymous"></script>
</body>

</html>
