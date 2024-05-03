<!-- addUser.php -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
</head>

<body>

    <div class="addUser">
        <h2>Thêm người dùng</h2>

        <form class="userSubmitAdd" action="index.php?ctrl=userController&action=addUser" method="post">

            <label for="ten_dang_nhap">Tên đăng nhập:</label>
            <input type="text" name="ten_dang_nhap" required><br>

            <label for="mat_khau">Mật khẩu:</label>
            <input type="text" name="mat_khau" required><br>

            <label for="vai_tro">Vai trò:</label>
            <select name="vai_tro" required>
                <?php
                foreach ($users as $user) {
                    echo '<option value="' . $user['vai_tro'] . '">' . $user['vai_tro'] . '</option>';
                }
                ?>
            </select><br>

            <label for="trang_thai">Trạng thái</label>
            <select name="trang_thai" required>
                <option value="1">Hoạt động</option>
                <option value="0">Khóa</option>
            </select><br>


            <button type="submit">Thêm người dùng</button>
        </form>
    </div>
</body>

</html>