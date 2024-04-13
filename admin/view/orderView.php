<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn đặt hàng</title>

</head>

<body>

    <h2>Danh sách đơn đặt hàng</h2>
    <?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    echo date('Y-m-d H:i:s'); ?></p>
    <a href="index.php?ctrl=orderController&action=viewAddOrder">Thêm đơn đặt hàng</a>
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
                    <td><?php echo number_format($order['tong_tien']); ?></td>
                    <td><?php echo $order['ghi_chu']; ?></td>
                    <td>
                        <form action="index.php?ctrl=orderController&action=toggleOrderStatus" method="POST">
                            <input type="hidden" name="orderId" value="<?php echo $order['id']; ?>">

                            <?php if ($order['tinh_trang'] == 'Chờ xác nhận') echo "<button type='submit'>Xác nhận</button>";
                            else if ($order['tinh_trang'] == 'Đang giao') echo "<button type='submit'>Đang xử lý</button>";
                            else if ($order['tinh_trang'] == 'Đang xử lý') echo "<button type='submit' disabled>Thành công</button>";
                            ?>
                        </form>
                    </td>






                    <td>
                        <a href="index.php?ctrl=orderController&action=deleteOrder&id=<?php echo $order['id']; ?>">Xóa</a>
                        <a href="index.php?ctrl=orderController&action=updateOrderView&id=<?php echo $order['id']; ?>&tinh_trang=<?php echo $order['tinh_trang']; ?>">Sửa</a>
                        <a href="index.php?ctrl=orderController&action=viewOrderDetail&id=<?php echo $order['id']; ?>">Xem chi tiết</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>



</html>