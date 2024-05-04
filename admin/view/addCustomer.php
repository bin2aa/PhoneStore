<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm khách hàng</title>
</head>

<body>
    <div class="addCustomer">
        <h2>Thêm khách hàng</h2>

        <form class="customerSubmitAdd" action="index.php?ctrl=customerController&action=addCustomer" method="post">

            <label for="id_nguoi_dung">Chọn id người dùng:</label>
            <select name="id_nguoi_dung" required>
                <?php foreach ($users as $user) : ?>
                <option value="<?php echo $user['id']; ?>"><?php echo $user['id']; ?></option>
                <?php endforeach; ?>
            </select><br>

            <label for="ten">Tên:</label>
            <input type="text" name="ten" required><br>

            <label for="so_dien_thoai">Số điện thoại:</label>
            <input type="text" name="so_dien_thoai" required><br>

            <label for="email">email:</label>
            <input type="email" name="email" required><br>

            <label for="dia_chi">Địa chỉ:</label>
            <input type="text" name="dia_chi" required><br><br>



            <button type="submit">Thêm khách hàng</button>
        </form>
    </div>
</body>

</html>