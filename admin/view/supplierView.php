<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhà cung cấp</title>
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

    <h2>Danh sách nhà cung cấp</h2>
    <form action="index.php?ctrl=supplierController&action=viewAddSupplier" method="post">
        <button type="submit">Thêm nhà cung cấp</button>
        <table>
            <thead>
                <tr>
                    <th>ID nhà cung cấp</th>
                    <th>Tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($suppliers as $supplier) : ?>
                    <tr>
                        <td><?php echo $supplier['id']; ?></td>
                        <td><?php echo $supplier['ten']; ?></td>
                        <td><?php echo $supplier['so_dien_thoai']; ?></td>
                        <td><?php echo $supplier['email']; ?></td>
                        <td><?php echo $supplier['dia_chi']; ?></td>

                        <td>
                            <a href="menu.php?ctrl=supplierController&action=deleteSupplier&id=<?php echo $supplier['id']; ?>">Xóa</a>
                            <a href="menu.php?ctrl=supplierController&action=updateSupplierView&id=<?php echo $supplier['id']; ?>">Sửa</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </form>

</body>

</html>