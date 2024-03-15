<!-- updatecustomer.php -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật khách hàng</title>
</head>

<body>
    <h2>Cập nhật khách hàng</h2>
    <form action="index.php?ctrl=customerController&action=updateCustomer" method="post">

        <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">

        <label for="id_nguoi_dung">Chọn id người dùng:</label>
        <select name="id_nguoi_dung" required>
            <?php foreach ($users as $user) : ?>
                <option value="<?php echo $user['id']; ?>"><?php echo $user['id']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="ten">Tên:</label>
        <input type="text" name="ten" value="<?php echo $customer['ten']; ?>" required><br>

        <label for="so_dien_thoai">Số điện thoại:</label>
        <input type="text" name="so_dien_thoai" value="<?php echo $customer['so_dien_thoai']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $customer['email']; ?>" required><br>

        <label for="dia_chi">Địa chỉ:</label>
        <input type="text" name="dia_chi" value="<?php echo $customer['dia_chi']; ?>" required><br><br>

        <button type="submit">Cập nhật khách hàng</button>
    </form>
</body>

</html>