<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>

<body>
    <div id="loginView">
        <!--ring div starts here-->
        <div class="ring">
            <i style="--clr:#00ff0a;"></i>
            <i style="--clr:#ff0057;"></i>
            <i style="--clr:#fffd44;"></i>
            <div class="login">
                <h2>Đăng nhập</h2>
                <form class='login_form ' action="index.php?ctrl=loginController&action=login" method="POST">
                    <div class="inputBx">
                        <input type="text" placeholder="Tài khoản" id="username" name="username" required>
                    </div>
                    <div class="inputBx">
                        <input type="password" placeholder="Mật khẩu" id="password" name="password" required>
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Đăng nhập">
                    </div>
                    <div id="login-error"></div>
                    <div class="links">
                        <a href="index.php?ctrl=loginController&action=resetPassword">Quên mật khẩu</a>
                        <a href="index.php?ctrl=loginController&action=registerView">Đăng ký</a>
                    </div>
                </form>
                <div class="action-links">
                    <a href="/user/index.php?ctrl=productControllerUser" class="cancel-btn">Hủy bỏ</a>
                </div>
            </div>
        </div>
    </div>
    <!--ring div ends here-->
</body>

</html>