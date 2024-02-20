<!-- addUser.php -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
</head>

<body>

    <h2>Thêm người dùng</h2>

    <form action="index.php?ctrl=userController&action=addUser" method="post">

        <label for="ten">Tên:</label>
        <input type="text" name="ten" required><br>

        <label for="ten_dang_nhap">Tên đăng nhập:</label>
        <input type="text" name="ten_dang_nhap" required><br>

        <label for="mat_khau">Mật khẩu:</label>
        <input type="text" name="mat_khau" required><br>

        <label for="vai_tro">Vai trò:</label>
        <input type="text" name="vai_tro" required><br><br>

        <button type="submit">Thêm người dùng</button>
    </form>

</body>

</html>