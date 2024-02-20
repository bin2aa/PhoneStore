<!-- updateUser.php -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật người dùng</title>
</head>

<body>
    <h2>Cập nhật người dùng</h2>
    <form action="index.php?ctrl=userController&action=updateUser" method="post">

        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">

        <label for="ten">Tên:</label>
        <input type="text" name="ten" value="<?php echo $user['ten']; ?>" required><br>

        <label for="ten_dang_nhap">Tên đăng nhập:</label>
        <input type="text" name="ten_dang_nhap" value="<?php echo $user['ten_dang_nhap']; ?>" required><br>

        <label for="mat_khau">Mật khẩu:</label>
        <input type="text" name="mat_khau" value="<?php echo $user['mat_khau']; ?>" required><br>

        <label for="vai_tro">Vai trò:</label>
        <input type="text" name="vai_tro" value="<?php echo $user['vai_tro']; ?>" required><br><br>

        <button type="submit">Cập nhật người dùng</button>
    </form>
</body>

</html>