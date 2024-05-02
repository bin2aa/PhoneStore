<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật đơn hàng</title>
</head>

<body>
    <div class="updateOrder">
        <h2>Cập nhật đơn hàng</h2>

        <form action="index.php?ctrl=orderController&action=updateOrder" method="post">

            <input type="hidden" name="id" value="<?php echo $order['id']; ?>">

            <label for="id_khach_hang">Chọn ID khách hàng:</label>
            <select name="id_khach_hang" required>
                <?php
                foreach ($customers as $customer) {
                    echo '<option value="' . $customer['id'] . '">' . $customer['id'] . '</option>';
                }
                ?>
            </select><br>


            <label for="ngay">Ngày:</label>
            <input type="datetime-local" name="ngay" value="<?php echo $order['ngay']; ?>" required><br>

            <label for="tong_tien">Tổng tiền:</label>
            <input type="number" step="0.01" name="tong_tien" value="<?php echo $order['tong_tien']; ?>" readonly><br>

            <label for="ghi_chu">Ghi chú:</label>
            <textarea name="ghi_chu" rows="5"><?php echo $order['ghi_chu']; ?></textarea><br><br>

            <!-- <label for="tinh_trang">tinh trang:</label>
        <input type="text" name="tinh_trang"><br><br> -->


            <label for="tinh_trang">Tình trạng khách hàng:</label>
            <select name="tinh_trang" required>
                <?php
                foreach ($status as $st) {
                    $select = ($st['tinh_trang'] == $_GET['tinh_trang']) ? 'selected' : '';
                    echo '<option value="' . $st['tinh_trang'] . '" ' . $select . '>' . $st['tinh_trang'] . '</option>';
                }
                ?>
            </select><br>
            <button type="submit">Cập nhật đơn hàng</button>
        </form>
    </div>
</body>

</html>