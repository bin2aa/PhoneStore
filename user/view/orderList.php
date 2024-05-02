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

        <!-- paginationOrderList -->
        <div class="paginationOrderList">

            <?php
            // Tính tổng số trang
            $totalPages = ceil($total_orders / $item_per_page);
            $num_links_side = 2;

            // Hiển thị nút trang trước
            if ($current_page > 1) {
                echo '<a href="index.php?ctrl=customerUserController&action=viewOrderList&id=' . $customerId  . '&page=' . ($current_page - 1) . '">&laquo;</a>';
            }

            // Hiển thị các nút trang
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $current_page) {
                    echo '<span>' . $i . '</span>';
                } else {
                    if ($i >= $current_page - $num_links_side && $i <= $current_page + $num_links_side) {
                        echo '<a href="index.php?ctrl=customerUserController&action=viewOrderList&id=' . $customerId  . '&page=' . $i . '">' . $i . '</a>';
                    } else if ($i == 1 || $i == $totalPages) {
                        echo '<a href="index.php?ctrl=customerUserController&action=viewOrderList&id=' . $customerId  . '&page=' . $i . '">' . $i . '</a>';
                    } else if ($i == $current_page - $num_links_side - 1 || $i == $current_page + $num_links_side + 1) {
                        echo '<span>...</span>';
                    }
                }
            }

            // Hiển thị nút trang sau
            if ($current_page < $totalPages) {
                echo '<a href="index.php?ctrl=customerUserController&action=viewOrderList&id=' . $customerId  . '&page=' . ($current_page + 1) . '">&raquo;</a>';
            }

            ?>



        </div>

    </div>
</body>

</html>