<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
</head>

<body>
    <h2>Đổi mật khẩu</h2>
    <form action="index.php?ctrl=loginController&action=changePassword" method="POST">
        <input type="hidden" name="id_nguoi_dung" value="<?php echo $id_nguoi_dung; ?>">

        <label for="old_password">Mật khẩu cũ:</label>
        <input type="password" id="old_password" name="old_password" required><br>


        <label for="new_password">Mật khẩu mới:</label>
        <input type="password" id="new_password" name="new_password" required><br>

        <label for="confirm_password">Nhập lại mật khẩu:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <button type="submit">Xác nhận</button>
    </form>
</body>

</html>