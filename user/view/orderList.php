<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>
    <style>
        /* Style cho thông tin khách hàng */
        .customer-info {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .customer-info h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .customer-info ul {
            list-style-type: none;
            padding: 0;
        }

        .customer-info li {
            margin-bottom: 10px;
        }

        .customer-info label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="customer-info">
        <h2>Danh sách đơn hàng</h2>
        <?php
        if (!empty($orders)) {
            echo '<ul>';
            foreach ($orders as $order) {
                echo '<li>';
                echo '<label>ID Đơn hàng:</label> ' . $order['id'] . '<br>';
                echo '<label>Ngày đặt hàng:</label> ' . $order['ngay'] . '<br>';
                echo '<label>Tổng tiền:</label> ' . number_format($order['tong_tien']) . ' đ<br>';
                echo '<label>Tình trạng:</label> ' . $order['tinh_trang'] . '<br>';
                //delete không được sài
                // echo '<a href="index.php?ctrl=customerUserController&action=deleteOrder&id=' . $order['id'] . '" class="delete-btn">Xóa</a>';
                echo '<a href="index.php?ctrl=customerUserController&action=viewOrderDetail&id=' . $order['id'] . '">Xem chi tiết</a><br>';
                echo '-----------------';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>Không có đơn hàng nào được tìm thấy cho khách hàng này.</p>';
        }
        ?>
    </div>
</body>

</html>