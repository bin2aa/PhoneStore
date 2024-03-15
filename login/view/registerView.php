<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>

<body>
    <h2>Đăng ký</h2>
    <form action="index.php?ctrl=loginController&action=register" method="POST">

        <label for="ten_dang_nhap">Tên tài khoản:</label>
        <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" required><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="confirm_password">Nhập lại mật khẩu:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <button type="submit">Đăng ký</button>
    </form>
</body>

</html>