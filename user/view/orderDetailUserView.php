<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <style>
        /* CSS cho trang chi tiết đơn hàng */
        .order-details {
            width: 80%;
            margin: 20px auto;
        }

        .order-details h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .order-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-details th,
        .order-details td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="order-details">
        <h2>Chi tiết đơn hàng</h2>
        <?php if (!empty($orderDetails)) : ?>
            <table>
                <thead>
                    <tr>
                        <th>ID Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderDetails as $orderDetail) : ?>
                        <tr>
                            <td><?php echo $orderDetail['id_san_pham']; ?></td>
                            <td><?php echo $orderDetail['so_luong']; ?></td>
                            <td><?php echo number_format($orderDetail['gia']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Không có chi tiết đơn hàng nào.</p>
        <?php endif; ?>
    </div>
</body>

</html>