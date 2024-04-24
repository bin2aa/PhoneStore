<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mua Hàng</title>
</head>

<body>
    <h1>Thông tin đơn hàng</h1>
    <form action="?action=buy" method="POST">
        <label for="id_khach_hang">ID Khách hàng:</label><br>
        <input type="text" id="id_khach_hang" name="id_khach_hang"><br><br>

        <label for="ngay">Ngày đặt hàng:</label><br>
        <input type="date" id="ngay" name="ngay"><br><br>

        <label for="tong_tien">Tổng tiền:</label><br>
        <input type="text" id="tong_tien" name="tong_tien"><br><br>

        <label for="ghi_chu">Ghi chú:</label><br>
        <textarea id="ghi_chu" name="ghi_chu"></textarea><br><br>

        <label for="tinh_trang">Tình trạng:</label><br>
        <input type="text" id="tinh_trang" name="tinh_trang"><br><br>

        <input type="submit" value="Mua hàng">
    </form>
</body>

</html>