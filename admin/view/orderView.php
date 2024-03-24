<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn đặt hàng</title>
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

    <h2>Danh sách đơn đặt hàng</h2>
    <form action="index.php?ctrl=orderController&action=viewAddOrder" method="post">
        <button type="submit">Thêm đơn đặt hàng</button>
        <table>
            <thead>
                <tr>
                    <th>ID đơn hàng</th>
                    <th>ID khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Ghi chú</th>
                    <th>Tình trạng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['id_khach_hang']; ?></td>
                        <td><?php echo $order['ten_khach_hang']; ?></td>
                        <td><?php echo $order['ngay']; ?></td>
                        <td><?php echo number_format($order['tong_tien']);?></td>
                        <td><?php echo $order['ghi_chu']; ?></td>
                        <td><?php echo $order['tinh_trang']; ?></td>

                        <td>
                            <a href="index.php?ctrl=orderController&action=deleteOrder&id=<?php echo $order['id']; ?>">Xóa</a>
                            <a href="index.php?ctrl=orderController&action=updateOrderView&id=<?php echo $order['id']; ?>">Sửa</a>
                            <a href="index.php?ctrl=orderController&action=viewOrderDetail&id=<?php echo $order['id']; ?>">Xem chi tiết</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </form>

</body>

</html>
