<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khuyến mãi</title>
</head>

<body>
    <h2>Danh sách khuyến mãi</h2>

    <div id="addDiscountContainer"></div>
    <div id="updateDiscountContainer"></div>
    <div class="overlay"></div>

    <a class="addDiscountLink" href="index.php?ctrl=discountController&action=showAddDiscountForm">Thêm khuyến mãi mới</a>
    <br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Điều kiện mua</th>
            <th>Phần trăm giảm giá</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($discounts as $discount) : ?>
            <tr>
                <td><?php echo $discount['id']; ?></td>
                <td><?php echo $discount['ten']; ?></td>
                <td><?php echo $discount['dieu_kien_mua']; ?></td>
                <td><?php echo $discount['phan_tram_giam_gia']; ?>%</td>
                <td><?php echo $discount['ngay_bat_dau']; ?></td>
                <td><?php echo $discount['ngay_ket_thuc']; ?></td>
                <td>
                    <a class="updateDiscountLink" href="index.php?ctrl=discountController&action=showUpdateDiscountForm&id=<?php echo $discount['id']; ?>">Sửa</a>
                    <a href="index.php?ctrl=discountController&action=deleteDiscount&id=<?php echo $discount['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa khuyến mãi này không?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>