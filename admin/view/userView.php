<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <h2>Danh sách người dùng</h2>

    <?php
    // include_once('../model/userModel.php'); // Đảm bảo file này được require để có thể sử dụng class UserModel
    // $userModel = new UserModel();
    // $users = $userModel->getAllUsers(); // Lấy dữ liệu người dùng  

    ?>
    <form action="index.php?ctrl=userController&action=viewAddUser" method="post">
        <button type="submit">Thêm người dùng</button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>Vai trò</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['ten']; ?></td>
                        <td><?php echo $user['ten_dang_nhap']; ?></td>
                        <td><?php echo $user['mat_khau']; ?></td>
                        <td><?php echo $user['vai_tro']; ?></td>
                        <td>
                            <a href="index.php?ctrl=userController&action=deleteUser&id=<?php echo $user['id']; ?>">Xóa</a>
                            <a href="index.php?ctrl=userController&action=updateUserView&id=<?php echo $user['id']; ?>">Sửa</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </form>

</body>

</html>