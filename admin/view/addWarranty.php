<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới phiếu bảo hành</title>
</head>

<body>
    <h1>Thêm mới phiếu bảo hành</h1>

    <form action="index.php?ctrl=warrantyController&action=addWarranty" method="post">
        <label for="id_san_pham">Sản phẩm:</label>
        <select name="id_san_pham" id="id_san_pham">
            <?php foreach ($products as $product) : ?>
                <option value="<?php echo $product['id']; ?>"><?php echo $product['ten']; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="id_don_hang">Đơn hàng:</label>
        <select name="id_don_hang" id="id_don_hang">
            <?php foreach ($orders as $order) : ?>
                <option value="<?php echo $order['id']; ?>"><?php echo $order['id']; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="ngay_lap">Ngày lập:</label>
        <input type="datetime-local" name="ngay_lap" id="ngay_lap"><br><br>

        <label for="ngay_het_han">Ngày hết hạn:</label>
        <input type="datetime-local" name="ngay_het_han" id="ngay_het_han"><br><br>

        <label for="tinh_trang">Tình trạng:</label>
        <select name="tinh_trang" id="tinh_trang">
            <option value="Đang bảo hành">Đang bảo hành</option>
            <option value="Chờ xử lý">Chờ xử lý</option>
            <option value="Đã từ chối">Đã từ chối</option>
            <option value="Đã hoàn thành">Đã hoàn thành</option>
            <option value="Hết hạn bảo hành">Hết hạn bảo hành</option>
        </select><br><br>

        <label for="ghi_chu">Ghi chú:</label><br>
        <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="10"></textarea><br><br>

        <input type="submit" value="Thêm phiếu bảo hành">
    </form>
</body>

</html>
