<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
</head>

<body>
    <div class="detailWarehouseReceipt">
        <h2>Chi tiết nhập kho</h2>
        <table>
            <thead>
                <tr>
                    <th>ID </th>
                    <th>ID nhập kho</th>
                    <th>ID sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <!-- <th>Thao tác</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($warehousess as $warehouses) : ?>
                    <tr>
                        <td><?php echo $warehouses['id']; ?></td>
                        <td><?php echo $warehouses['id_nhap_kho']; ?></td>
                        <td><?php echo $warehouses['id_san_pham']; ?></td>
                        <td><?php echo $warehouses['so_luong']; ?></td>
                        <td><?php echo $warehouses['gia']; ?></td>
                        <!-- <td><a href="index.php?ctrl=warehouseController&action=deleteWarehouseDetail&id=<?php echo $warehouses['id']; ?>">Xóa</a></td> -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>