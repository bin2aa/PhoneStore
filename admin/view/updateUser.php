<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật người dùng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vkA4tf+gfRnJlz9+L0V5kiYcG7Bi4JF3x04fX5uU5fWVJ+u9PwIZgecokFm5P1C5" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="updateUser">
            <h2 class="lead fs-1" style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px dotted black;">Cập nhật người dùng</h2>
            <form class="userSubmitUd" action="index.php?ctrl=userController&action=updateUser" method="post">
                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                <div class="mb-3">
                    <label for="ten_dang_nhap" class="form-label">Tên đăng nhập:</label>
                    <input type="text" name="ten_dang_nhap" value="<?php echo $user['ten_dang_nhap']; ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="mat_khau" class="form-label">Mật khẩu:</label>
                    <input type="password" name="mat_khau" placeholder="Nhập mật khẩu mới nếu cần" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="vai_tro" class="form-label">Vai trò:</label>
                    <select name="vai_tro" class="form-select" required>
                        <?php
                        foreach ($permissions as $permission) {
                            $selected = ($permission['vai_tro'] == $_GET['vai_tro']) ? 'selected' : '';
                            echo '<option value="' . $permission['vai_tro'] . '" ' . $selected . '>' . $permission['vai_tro'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="trang_thai" class="form-label">Tình trạng:</label>
                    <select name="trang_thai" class="form-select" required>
                        <option value="1" <?php if ($user['trang_thai'] == 1) echo 'selected'; ?>>Hoạt động</option>
                        <option value="0" <?php if ($user['trang_thai'] == 0) echo 'selected'; ?>>Khóa</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật người dùng</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-NV2DWb1Wti8OY8T4O8wc4OJ1sGJ/Ocp3kiS8BRceP8OVR0sN3gkNDISPDgaFwhB3" crossorigin="anonymous"></script>
</body>

</html>
