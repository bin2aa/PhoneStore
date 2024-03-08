<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
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

    <h2>Chi tiết đơn hàng</h2>
    <table>
        <thead>
            <tr>
                <th>ID </th>
                <th>ID nhập kho</th>
                <th>ID sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thao tác</th>
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
                    <td><a href="#" onclick="confirmDelete(<?php echo $warehouses['id']; ?>)">Xóa</a></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        function confirmDelete(id) {
            // Sử dụng hàm confirm() để hiển thị hộp thoại xác nhận
            var confirmDelete = confirm("Bạn có chắc chắn muốn xóa kho này?");
            // Nếu người dùng nhấn OK, chuyển hướng đến trang xóa và truyền id
            if (confirmDelete) {
                window.location.href = "index.php?ctrl=warehouseController&action=deleteWarehouseDetail&id=" + id;
            } else {
                // Nếu người dùng nhấn Cancel hoặc không xác nhận xóa, không làm gì cả
                return false;
            }
        }
    </script>

</body>

</html>