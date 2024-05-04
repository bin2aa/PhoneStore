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

    .warranty-info {
        margin-top: 20px;
    }

    .warranty-info h3 {
        text-align: center;
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
                    <th>(ID): Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderDetails as $orderDetail) : ?>
                <tr>
                    <td><?php echo '(ID ' . $orderDetail['id_san_pham'] . "): " . $orderDetail['ten_san_pham']; ?></td>
                    <td><?php echo $orderDetail['so_luong']; ?></td>
                    <td><?php echo $orderDetail['gia'] . ' đ'; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else : ?>
        <p>Không có chi tiết đơn hàng nào.</p>
        <?php endif; ?>

        <div class="warranty-info">
            <h3>Thông tin bảo hành</h3>
            <p>Liên hệ để được tư vấn và hổ trợ: 113114115</p>
            <?php if (!empty($warrantyInfo)) : ?>
            <table>
                <thead>
                    <tr>
                        <th> ID sản phẩm </th>
                        <th>Ngày kết thúc</th>
                        <th>Tình trạng</th>
                        <th>Ghi chú</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($warrantyInfo as $warranty) : ?>
                    <tr>
                        <td><?php echo $warranty['id_san_pham']; ?></td>
                        <td><?php echo $warranty['ngay_het_han']; ?></td>
                        <td><?php echo $warranty['tinh_trang']; ?></td>
                        <td>
                            <form
                                action="index.php?ctrl=customerUserController&action=updateWarrantyInfo&id=<?php echo $warranty['id_don_hang']; ?>"
                                method="post">
                                <input type="hidden" name="warranty_id" value="<?php echo $warranty['id']; ?>">
                                <?php
                                        // Kiểm tra nếu trạng thái là "Chờ xử lý" thì disabled trường Ghi chú và nút Gửi bảo hành
                                        if ($warranty['tinh_trang'] == 'Chờ xử lý' || $warranty['tinh_trang'] == 'Hết hạn bảo hành') {
                                            echo '<input type="text" name="ghi_chu" value="' . $warranty['ghi_chu'] . '" required disabled>';
                                        } else {
                                            echo '<input type="text" name="ghi_chu" value="' . $warranty['ghi_chu'] . '" required>';
                                        }
                                        
                                        ?>
                        </td>
                        <td>
                            <?php
                                    // Kiểm tra nếu trạng thái là "Chờ xử lý" thì disabled nút Gửi bảo hành
                                    if ($warranty['tinh_trang'] == 'Chờ xử lý' ||  $warranty['tinh_trang'] == 'Hết hạn bảo hành') {
                                        echo '<input type="submit" value="Gửi bảo hành" disabled>';
                                    } else {
                                        echo '<input type="submit" value="Gửi bảo hành">';
                                    }
                                    ?>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else : ?>
            <p>Không có thông tin bảo hành cho đơn hàng này.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>