<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm khuyến mãi mới</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom styles here */
        .addDiscount {
            max-width: 400px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="addDiscount">
        <h2>Thêm chương trình khuyến mãi</h2>
        <form class="discountSubmitAdd" method="post" action="index.php?ctrl=discountController&action=addDiscount">

            <div class="mb-3">
                <label for="ten" class="form-label">Tên chương trình:</label>
                <input type="text" class="form-control" id="ten" name="ten" required>
            </div>

            <div class="mb-3">
                <label for="dieu_kien_mua" class="form-label">Mức giá tối thiểu:</label>
                <input type="number" class="form-control" id="dieu_kien_mua" name="dieu_kien_mua" required>
            </div>

            <div class="mb-3">
                <label for="phan_tram_giam_gia" class="form-label">Phần trăm giảm giá:</label>
                <input type="number" class="form-control" id="phan_tram_giam_gia" name="phan_tram_giam_gia" required>
            </div>

            <div class="mb-3">
                <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu:</label>
                <input type="datetime-local" class="form-control" id="ngay_bat_dau" name="ngay_bat_dau" required>
            </div>

            <div class="mb-3">
                <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc:</label>
                <input type="datetime-local" class="form-control" id="ngay_ket_thuc" name="ngay_ket_thuc" required>
            </div>

            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
