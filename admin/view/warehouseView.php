<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách phiếu nhập kho</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <h2>Danh sách phiếu nhập kho</h2>

    <a href="index.php?ctrl=warehouseController&action=showAddWarehouseReceiptForm">Thêm hàng vào kho</a>

    <table>
        <tr>
            <th>ID</th>
            <th>ID nhà cung cấp</th>
            <th>Tên nhà cung cấp</th>
            <th>Ngày</th>
            <th>Tổng tiền</th>
            <th>Ghi chú</th>
            <th>Thao tác</th>
        </tr>

        <?php foreach ($warehouseReceipts as $warehouseReceipt) : ?>
            <tr>
                <td><?php echo $warehouseReceipt['id']; ?></td>
                <td><?php echo $warehouseReceipt['id_nha_cung_cap']; ?></td>
                <td><?php echo $warehouseReceipt['ten_ncc']; ?></td>
                <td><?php echo $warehouseReceipt['ngay']; ?></td>
                <td><?php echo $warehouseReceipt['tong_tien']; ?></td>
                <td><?php echo $warehouseReceipt['ghi_chu']; ?></td>
                <td>
                    <a href="index.php?ctrl=warehouseController&action=deleteWarehouseReceipt&id=<?php echo $warehouseReceipt['id']; ?>">Xóa</a>
                    <a href="index.php?ctrl=warehouseController&action=showUpdateWarehouseReceiptForm&id=<?php echo $warehouseReceipt['id']; ?>">Cập nhật</a>
                    <a href="index.php?ctrl=warehouseController&action=viewWarehouseDetail&id=<?php echo $warehouseReceipt['id']; ?>">Chi tiết</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>