<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin khách hàng</title>
</head>

<body>

    <div class="edit-form">
        <h2>Chỉnh sửa thông tin khách hàng</h2>
        <form action="index.php?ctrl=customerUserController&action=updateCustomer" method="POST">
            <input type="hidden" name="customer_id" value="<?php echo $customer['id']; ?>">
            <label for="ten">Tên:</label>
            <input type="text" id="ten" name="ten" value="<?php echo $customer['ten']; ?>">

            <label for="so_dien_thoai">Số điện thoại:</label>
            <input type="tel" id="so_dien_thoai" name="so_dien_thoai" pattern="[0-9]{10,11}" value="<?php echo $customer['so_dien_thoai']; ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $customer['email']; ?>">

            <label for="dia_chi">Địa chỉ:</label>
            <input type="text" id="dia_chi" name="dia_chi" value="<?php echo $customer['dia_chi']; ?>">

            <input type="hidden" name="id_nguoi_dung" value="<?php echo $id_nguoi_dung; ?>">

            <input type="submit" value="Lưu chỉnh sửa">
        </form>

        <a href="javascript:history.go(-1)">Quay lại</a>

    </div>
</body>

</html>