<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm khuyến mãi mới</title>
</head>

<body>
    <div class="addDiscount">
        <h2>Thêm khuyến mãi mới</h2>
        <form method="post" action="index.php?ctrl=discountController&action=addDiscount">

            <label for="ten">Tên khuyến mãi:</label><br>
            <input type="text" id="ten" name="ten" required><br>

            <label for="dieu_kien_mua">Điều kiện mua:</label><br>
            <input type="number" id="dieu_kien_mua" name="dieu_kien_mua" required><br>

            <label for="phan_tram_giam_gia">Phần trăm giảm giá:</label><br>
            <input type="number" id="phan_tram_giam_gia" name="phan_tram_giam_gia" required><br>

            <label for="ngay_bat_dau">Ngày bắt đầu:</label><br>
            <input type="datetime-local" id="ngay_bat_dau" name="ngay_bat_dau" required><br>

            <label for="ngay_ket_thuc">Ngày kết thúc:</label><br>
            <input type="datetime-local" id="ngay_ket_thuc" name="ngay_ket_thuc" required><br><br>

            <input type="submit" value="Thêm">
        </form>
    </div>
</body>

</html>