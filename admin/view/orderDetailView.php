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
                <th>ID</th>
                <th>ID đơn hàng</th>
                <th>ID sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderDetails as $orderDetail) : ?>
                <tr>
                    <td><?php echo $orderDetail['id']; ?></td>
                    <td><?php echo $orderDetail['id_don_hang']; ?></td>
                    <td><?php echo $orderDetail['id_san_pham']; ?></td>
                    <td><?php echo $orderDetail['so_luong']; ?></td>
                    <td><?php echo $orderDetail['gia']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>