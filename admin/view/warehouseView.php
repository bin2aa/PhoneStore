<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách phiếu nhập kho</title>

</head>

<body>

    <h2>Danh sách phiếu nhập kho</h2>

    <div id="addWarehouseReceiptContainer"></div>
    <div id="updateWarehouseReceiptContainer"></div>
    <div class="overlay"></div>

    <form class="search-form-warehouse">
        <label for="search">Tìm kiếm phiếu nhập kho:</label>
        <input type="text" id="search" name="search" placeholder="Nhập tên phiếu nhập kho cần tìm kiếm">
        <button type="submit">Tìm kiếm</button>
    </form>

    <a class="addWareHouseReceiptLink" href="index.php?ctrl=warehouseController&action=showAddWarehouseReceiptForm">Thêm hàng vào kho </a>
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
                <td><?php echo  number_format($warehouseReceipt['tong_tien']); ?></td>
                <td><?php echo $warehouseReceipt['ghi_chu']; ?></td>
                <td>
                    <a href="index.php?ctrl=warehouseController&action=deleteWarehouseReceipt&id=<?php echo $warehouseReceipt['id']; ?>">Xóa</a>
                    <a class="updateWarehouseReceiptLink" href="index.php?ctrl=warehouseController&action=showUpdateWarehouseReceiptForm&id=<?php echo $warehouseReceipt['id']; ?>">Cập nhật</a>
                    <a href="index.php?ctrl=warehouseController&action=viewWarehouseDetail&id=<?php echo $warehouseReceipt['id']; ?>">Chi tiết</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>