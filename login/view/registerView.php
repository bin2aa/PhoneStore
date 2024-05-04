<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>

<body>
    <h2>Đăng ký</h2>
    <form class="register_form" action="index.php?ctrl=loginController&action=register" method="POST">



        <!-- Các trường đăng nhập -->
        <label for="ten_dang_nhap">Tên tài khoản (ít nhất 3 ký tự):</label>
        <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" minlength="3" required><br>

        <div id="username-exists-message" class="error-message"></div>



        <label for="password">Mật khẩu (ít nhất 6 ký tự, ít nhất 1 ký tự viết hoa):</label>
        <input type="password" id="password" name="password" pattern="(?=.*[A-Z]).{6,}"
            title="Ít nhất 6 ký tự, bao gồm ít nhất một ký tự viết hoa" required><br>

        <!-- <div id="password-error" class="error-message"></div> -->

        <label for="confirm_password">Nhập lại mật khẩu:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>
        <div id="confirm-password-error" class="error-message"></div>

        <!-- Thông tin khách hàng -->
        <h3>Thông tin khách hàng</h3>


        <label for="ho_ten">Họ và tên:</label>
        <input type="text" id="ho_ten" name="ho_ten" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <div id="email-exists-message" class="error-message"></div>

        <label for="so_dien_thoai">Số điện thoại (10-11 số):</label>
        <input type="tel" id="so_dien_thoai" name="so_dien_thoai" pattern="[0-9]{10,11}" required><br>



        <label for="dia_chi">Địa chỉ:</label>
        <input type="text" id="dia_chi" name="dia_chi" required><br>

        <button class='register_button' type="submit">Đăng ký</button>
        <div class='action-links'>
            <a href="/user/index.php?ctrl=productControllerUser" class="cancel-btn">Hủy bỏ</a>
            <a href="index.php?ctrl=loginController&action=loginView" class="login-btn">Đăng nhập</a>
        </div>
    </form>
</body>

</html>