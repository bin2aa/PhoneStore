<?php
// Mã PHP ở đây
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm đơn hàng</title>
</head>

<body>

    <h2>Thêm đơn hàng</h2>

    <form action="index.php?ctrl=orderController&action=addOrder" method="post">

        <label for="id_khach_hang">Chọn khách hàng:</label>
        <select name="id_khach_hang" required>
            <?php
            foreach ($customers as $customer) {
                echo '<option value="' . $customer['id'] . '">' . $customer['ten'] . '</option>';
            }
            ?>
        </select><br>

        <label for="ngay">Ngày:</label>
        <input type="date" name="ngay" required><br>

        <label for="tong_tien">Tổng tiền:</label>
        <input type="number" name="tong_tien" required><br>

        <label for="ghi_chu">Ghi chú:</label>
        <textarea name="ghi_chu" rows="5"></textarea><br><br>

        <label for="tinh_trang">tinh trang:</label>
        <input type="text" name="tinh_trang"><br><br>

        <button type="submit">Thêm đơn hàng</button>
    </form>

</body>

</html>