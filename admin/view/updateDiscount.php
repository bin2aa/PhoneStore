<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật khuyến mãi</title>
</head>

<body>

    <div class="updateDiscount">
        <h2>Cập nhật khuyến mãi</h2>
        <form class="discountSubmitUd" method="post" action="index.php?ctrl=discountController&action=updateDiscount">
            <input type="hidden" name="id" value="<?php echo $discount['id']; ?>">

            <label for="ten">Tên khuyến mãi:</label><br>
            <input type="text" id="ten" name="ten" value="<?php echo $discount['ten']; ?>" required><br>

            <label for="dieu_kien_mua">Điều kiện mua:</label><br>
            <input type="number" id="dieu_kien_mua" name="dieu_kien_mua" value="<?php echo $discount['dieu_kien_mua']; ?>" required><br>

            <label for="phan_tram_giam_gia">Phần trăm giảm giá:</label><br>
            <input type="number" id="phan_tram_giam_gia" name="phan_tram_giam_gia" value="<?php echo $discount['phan_tram_giam_gia']; ?>" required><br>

            <label for="ngay_bat_dau">Ngày bắt đầu:</label><br>
            <input type="datetime-loca" id="ngay_bat_dau" name="ngay_bat_dau" value="<?php echo $discount['ngay_bat_dau']; ?>" required><br>

            <label for="ngay_ket_thuc">Ngày kết thúc:</label><br>
            <input type="datetime-loca" id="ngay_ket_thuc" name="ngay_ket_thuc" value="<?php echo $discount['ngay_ket_thuc']; ?>" required><br><br>

            <input type="submit" value="Cập nhật">
        </form>
        <form method="post" action="index.php?ctrl=discountController&action">
            <input type="submit" value="Quay lại">
        </form>
    </div>
</body>

</html>