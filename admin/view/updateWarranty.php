<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật phiếu bảo hành</title>
</head>

<body>

    <div class="updateWarranty">

        <h1>Cập nhật phiếu bảo hành</h1>

        <form class="warrantySubmitUd" action="index.php?ctrl=warrantyController&action=updateWarranty" method="post">
            <input type="hidden" name="warranty_id" value="<?php echo $warranty['id']; ?>">

            <label for="id_san_pham">Sản phẩm:</label>
            <select name="id_san_pham" id="id_san_pham">
                <?php foreach ($products as $product) : ?>
                    <option value="<?php echo $product['id']; ?>" <?php if ($product['id'] == $warranty['id_san_pham']) echo 'selected'; ?>><?php echo $product['ten']; ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="id_don_hang">Đơn hàng:</label>
            <select name="id_don_hang" id="id_don_hang">
                <?php foreach ($orders as $order) : ?>
                    <option value="<?php echo $order['id']; ?>" <?php if ($order['id'] == $warranty['id_don_hang']) echo 'selected'; ?>><?php echo $order['id']; ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="ngay_lap">Ngày lập:</label>
            <input type="datetime-local" name="ngay_lap" id="ngay_lap" value="<?php echo $warranty['ngay_lap']; ?>"><br><br>

            <label for="ngay_het_han">Ngày hết hạn:</label>
            <input type="datetime-local" name="ngay_het_han" id="ngay_het_han" value="<?php echo $warranty['ngay_het_han']; ?>"><br><br>

            <label for="tinh_trang">Tình trạng:</label>
            <select name="tinh_trang" id="tinh_trang">
                <?php foreach ($statuses as $status) : ?>
                    <option value="<?php echo $status; ?>" <?php if ($status == $warranty['tinh_trang']) echo 'selected'; ?>><?php echo $status; ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="ghi_chu">Ghi chú:</label><br>
            <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="10"><?php echo $warranty['ghi_chu']; ?></textarea><br><br>

            <input type="submit" value="Cập nhật phiếu bảo hành">
        </form>
    </div>
</body>

</html>