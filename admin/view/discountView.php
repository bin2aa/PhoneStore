<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/css/common.css">
    <!-- Thư viện BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh sách khuyến mãi</title>
</head>

<body>
    <div class="containerr">
        <div class="header-box">
            <div class="header-icon">
                <img src="/admin/img/icon/discount.png" alt="discountImg">
            </div>
            <h2 class="mt-0 mb-0">CHƯƠNG TRÌNH KHUYẾN MÃI</h2>
        </div>

    <div id="addDiscountContainer"></div>
    <div id="updateDiscountContainer"></div>
    <div class="overlay"></div>

    <a class="addDiscountLink addNew btn btn-primary" href="index.php?ctrl=discountController&action=showAddDiscountForm">Thêm chương trình</a>
    <br><br>
    <table class="table">
        <thead class="bg-dark text-white">
            <tr>
                <th>ID</th>
                <th>Tên chương trình</th>
                <th>Mức giá tối thiểu</th>
                <th>Phần trăm giảm giá</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <?php foreach ($discounts as $discount) : ?>
            <tr>
                <td class="align-middle"><?php echo $discount['id']; ?></td>
                <td class="align-middle"><?php echo $discount['ten']; ?></td>
                <td class="align-middle"><?php echo number_format($discount['dieu_kien_mua']); ?></td>
                <td class="align-middle"><?php echo $discount['phan_tram_giam_gia']; ?>%</td>
                <td class="align-middle"><?php echo $discount['ngay_bat_dau']; ?></td>
                <td class="align-middle"><?php echo $discount['ngay_ket_thuc']; ?></td>
                <td>
                    <a class="btn btn-primary updateDiscountLink" href="index.php?ctrl=discountController&action=showUpdateDiscountForm&id=<?php echo $discount['id']; ?>">Sửa</a>
                    <a class="btn btn-danger deleteDiscountLink" href="index.php?ctrl=discountController&action=deleteDiscount&id=<?php echo $discount['id']; ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
</body>

</html>
