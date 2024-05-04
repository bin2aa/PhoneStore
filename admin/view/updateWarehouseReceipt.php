<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật phiếu nhập kho</title>
</head>

<body>
    <div class="updateWarehouseReceipt">
        <h2>Cập nhật phiếu nhập kho</h2>
        <?php
        if (isset($warehouseReceipt)) {
        ?>
        <form class="warehouseReceiptSubmitUd" action="index.php?ctrl=warehouseController&action=updateWarehouseReceipt"
            method="post">
            <input type="hidden" name="id" value="<?php echo $warehouseReceipt['id']; ?>">
            <label for="id_nha_cung_cap">Nhà cung cấp:</label>
            <select name="id_nha_cung_cap" required>
                <?php
                    foreach ($suppliers as $supplier) {
                        echo '<option value="' . $supplier['id'] . '">' . $supplier['ten'] . '</option>';
                    }
                    ?>
            </select><br>

            <label for="ngay">Ngày:</label>
            <input type="datetime-local" name="ngay" id="ngay" value="<?php echo $warehouseReceipt['ngay']; ?>"
                required><br>

            <label for="tong_tien">Tổng tiền:</label>
            <input type="text" name="tong_tien" id="tong_tien" value="<?php echo $warehouseReceipt['tong_tien']; ?>"
                readonly><br>

            <label for="ghi_chu">Ghi chú:</label><br>
            <textarea name="ghi_chu" id="ghi_chu" cols="30"
                rows="5"><?php echo $warehouseReceipt['ghi_chu']; ?></textarea><br>

            <button type="submit">Cập nhật</button>
        </form>
        <?php
        } else {
            echo "Không tìm thấy phiếu nhập kho.";
        }
        ?>
    </div>
</body>

</html>