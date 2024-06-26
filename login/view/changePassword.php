<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
</head>

<body>
    <h2>Đổi mật khẩu</h2>
    <form class="changePassword" action="index.php?ctrl=loginController&action=changePassword" method="POST">
        <input type="hidden" name="id_nguoi_dung" value="<?php echo $id_nguoi_dung; ?>">

        <label for="old_password">Mật khẩu cũ:</label>
        <input type="password" id="old_password" name="old_password" required><br>

        <div id="paswordOldErrorMatch" class="error-message"></div>


        <label for="new_password">Mật khẩu mới: (ít nhất 6 ký tự và 1 ký tự viết hoa)</label>
        <input type="password" id="new_password" name="new_password" pattern="(?=.*[A-Z]).{6,}" required><br>

        <label for="confirm_password">Nhập lại mật khẩu:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>
        <div id="confirm-password-error" class="error-message"></div>
        <button type="submit">Xác nhận</button>
    </form>
    <!-- quay lại -->
    <a href="javascript:history.go(-1)">Quay lại</a>
</body>

</html>