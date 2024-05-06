<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật khuyến mãi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vkA4tf+gfRnJlz9+L0V5kiYcG7Bi4JF3x04fX5uU5fWVJ+u9PwIZgecokFm5P1C5" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="updateDiscount">
            <h2>Cập nhật khuyến mãi</h2>
            <form class="discountSubmitUd" method="post" action="index.php?ctrl=discountController&action=updateDiscount">
                <input type="hidden" name="id" value="<?php echo $discount['id']; ?>">

                <div class="mb-3">
                    <label for="ten" class="form-label">Tên khuyến mãi:</label>
                    <input type="text" id="ten" name="ten" value="<?php echo $discount['ten']; ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="dieu_kien_mua" class="form-label">Điều kiện mua:</label>
                    <input type="number" id="dieu_kien_mua" name="dieu_kien_mua" value="<?php echo $discount['dieu_kien_mua']; ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="phan_tram_giam_gia" class="form-label">Phần trăm giảm giá:</label>
                    <input type="number" id="phan_tram_giam_gia" name="phan_tram_giam_gia" value="<?php echo $discount['phan_tram_giam_gia']; ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu:</label>
                    <input type="datetime-loca" id="ngay_bat_dau" name="ngay_bat_dau" value="<?php echo $discount['ngay_bat_dau']; ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc:</label>
                    <input type="datetime-loca" id="ngay_ket_thuc" name="ngay_ket_thuc" value="<?php echo $discount['ngay_ket_thuc']; ?>" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
            <!-- <form method="post" action="index.php?ctrl=discountController&action">
                <button type="submit" class="btn btn-secondary">Quay lại</button>
            </form> -->
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-NV2DWb1Wti8OY8T4O8wc4OJ1sGJ/Ocp3kiS8BRceP8OVR0sN3gkNDISPDgaFwhB3" crossorigin="anonymous"></script>
</body>

</html>
