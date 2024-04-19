<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>

<body>
    <h2>Đăng nhập</h2>
    <form action="index.php?ctrl=loginController&action=login" method="POST">
        <label for="username">Tên người dùng:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Đăng nhập</button>
        <div class="action-links">
            <a href="/user/index.php?ctrl=productControllerUser" class="cancel-btn">Hủy bỏ</a>
            <a href="index.php?ctrl=loginController&action=registerView" class="register-btn">Đăng ký</a>
            <a href="index.php?ctrl=loginController&action=resetPassword" class="forgot-password-btn">Quên mật khẩu</a>
        </div>
    </form>

</body>

</html>