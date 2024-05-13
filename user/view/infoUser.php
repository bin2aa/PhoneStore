<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>

</head>

<body>

    <video autoplay muted loop id="bg-video">
        <source src="../image/vd6.mp4" type="video/mp4">
    </video>
    <div class="customer-info">
        <div class="cssOnTop2">
            <?php include 'cssOntop2.php'; ?>
        </div>
        <h2> Thông tin khách hàng</h2>
        <?php
        // Kiểm tra xem đã có thông tin khách hàng hay chưa
        $customerData = $customer[0]; // Lấy phần tử đầu tiên của mảng kết quả
        echo '<ul>';
        echo '<li><label>ID:</label> ' . $customerData['id'] . '</li>';
        echo '<li><label>Tên:</label> ' . $customerData['ten'] . '</li>';
        echo '<li><label>Số điện thoại:</label> ' . $customerData['so_dien_thoai'] . '</li>';
        echo '<li><label>Email:</label> ' . $customerData['email'] . '</li>';
        echo '<li><label>Địa chỉ:</label> ' . $customerData['dia_chi'] . '</li>';
        echo '</ul>';

        ?>


        <div style="display: flex; justify-content: center; margin-top: 20px;">
            <a href="/login/index.php?ctrl=loginController&action=viewChangePassword">Đổi mật khẩu</a>
            <span style="margin: 0 10px;">|</span>
            <a href="index.php?ctrl=customerUserController&action=showUpdateCustomerForm&id=<?php echo $customer[0]['id']; ?>">Chỉnh sửa thông tin</a>
            <span style="margin: 0 10px;">|</span>
            <a href="index.php?ctrl=customerUserController&action=viewOrderList">Danh sách đơn hàng</a>
        </div>

    </div>
</body>

</html>