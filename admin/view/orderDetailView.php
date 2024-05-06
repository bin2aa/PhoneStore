<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vkA4tf+gfRnJlz9+L0V5kiYcG7Bi4JF3x04fX5uU5fWVJ+u9PwIZgecokFm5P1C5" crossorigin="anonymous">
</head>

<body>
    <div class=detailOrder>
        <h2>Chi tiết đơn hàng</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID đơn hàng</th>
                    <th>(ID): Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderDetails as $orderDetail) : ?>
                    <tr>
                        <td><?php echo $orderDetail['id']; ?></td>
                        <td><?php echo $orderDetail['id_don_hang']; ?></td>
                        <td><?php echo '(' . $orderDetail['id_san_pham'] . ')' . ': ' . $orderDetail['ten_san_pham']; ?></td>
                        <td><?php echo $orderDetail['so_luong']; ?></td>
                        <td><?php echo  number_format($orderDetail['gia']) . ',000'; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
