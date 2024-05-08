<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/css/common.css">
    <!-- Thư viện BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh sách người dùng</title>
</head>

<body>
    <div class="containerr">
        <div class="header-box">
            <div class="header-icon">
                <img src="/admin/img/icon/user.png" alt="userImg">
            </div>
            <h2 class="mt-0 mb-0">THÔNG TIN NGƯỜI DÙNG</h2>
        </div>

        <div id="addUserContainer"></div>
        <div id="updateUserContainer"></div>
        <div class="overlay"></div>

        <!-- <form class="search-form-user">
            <label for="search">Tìm kiếm người dùng:</label>
            <input type="text" id="search" name="search" placeholder="Nhập tên người dùng cần tìm kiếm">
            <button type="submit">Tìm kiếm</button> <br>
        </form> -->
        <div class="searchHolder">
            <form class="search-form-user mt-3">
                <div class="row g-3 searchField">
                    <div class="col-auto">
                        <label for="search" class="col-form-label"></label>
                    </div>
                    <div class="col-auto">
                        <input type="hidden" name="action" value="searchProducts">
                        <input type="text" id="search" name="search" placeholder="Tên người dùng..." class="form-control" width="100%">
                    </div>
                    <div class="col-auto search">
                        <button type="submit" class="btn btn-light btn-outline-secondary">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="addNew btn btn-primary">
            <a class="addUserLink" href="index.php?ctrl=userController&action=viewAddUser">Thêm người dùng</a>
        </div>

        <table class="table">
            <thead class="bg-dark text-white">
                <tr>
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>Vai trò</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['ten_dang_nhap']; ?></td>
                        <td><?php echo $user['mat_khau']; ?></td>
                        <td><?php echo $user['vai_tro']; ?></td>
                        <td>
                            <!-- <form action="index.php?ctrl=userController&action=toggleUserStatus" method="POST">
                                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                <?php
                                if ($user['trang_thai'] == '1') echo "<button type='submit'>Khóa</button>";
                                else if ($user['trang_thai'] == '0') echo "<button type='submit'>Mở Khóa</button>";
                                ?>
                            </form> -->


                            <a class="toggleUserStatus" href="index.php?ctrl=userController&action=toggleUserStatus&id=<?php echo $user['id']; ?>&status=<?php echo $user['trang_thai']; ?>">
                                <?php
                                if ($user['trang_thai'] == 1) {
                                    echo "Khóa";
                                } else {
                                    echo "Mở khóa";
                                }
                                ?>
                            </a>
                        </td>



                        <td>
                            <a class="deleteUserLink btn btn-danger" href="index.php?ctrl=userController&action=deleteUser&id=<?php echo $user['id']; ?>">Xóa</a>
                            <a class="updateUserLink btn btn-success" href="index.php?ctrl=userController&action=updateUserView&id=<?php echo $user['id']; ?>&vai_tro=<?php echo $user['vai_tro']; ?>">Sửa</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        // $('.toggleUserStatus').click(function(e) {
        $(document).on('click', '.toggleUserStatus', function(e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ a
            var toggleUrl = $(this).attr('href');
            $.ajax({
                url: toggleUrl,
                type: 'GET',
                success: function(response) {
                    location.reload(); // Tải lại trang
                }
            });
        });
    });
</script>