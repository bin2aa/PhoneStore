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



        <!-- Các trường đăng nhập -->
        <label for="ten_dang_nhap">Tên tài khoản:</label>
        <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" required><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="confirm_password">Nhập lại mật khẩu:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <!-- Thông tin khách hàng -->
        <h3>Thông tin khách hàng</h3>


        <label for="ho_ten">Họ và tên:</label>
        <input type="text" id="ho_ten" name="ho_ten" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="so_dien_thoai">Số điện thoại:</label>
        <input type="number" id="so_dien_thoai" name="so_dien_thoai" required><br>


        <label for="dia_chi">Địa chỉ:</label>
        <input type="text" id="dia_chi" name="dia_chi" required><br>

        <button type="submit">Đăng ký</button>
        <div class='action-links'>
            <a href="/user/index.php?ctrl=productControllerUser" class="cancel-btn">Hủy bỏ</a>
            <a href="index.php?ctrl=loginController&action=loginView" class="login-btn">Đăng nhập</a>
        </div>
    </form>
</body>

</html>