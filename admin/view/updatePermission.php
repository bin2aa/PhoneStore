<!DOCTYPE html>
<html>

<head>
    <title>Cập nhật quyền</title>
    <style>
        form {
            width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="updatePermission">
        <h2>Cập nhật quyền</h2>
        <form class="permissionSubmitUd" method="POST" action="index.php?ctrl=permissionController&action=updatePermission">
            <input type="hidden" name="role" value="<?php echo $permission['vai_tro']; ?>">

            <label>Vai trò:</label>
            <input type="text" value="<?php echo $permission['vai_tro']; ?>" disabled>

            <label>Quyền quản lý:</label>
            <h3>------------------------------------</h3>
            <input type="checkbox" id="qlnhap_kho" name="qlnhap_kho" value="1" <?php echo $permission['qlnhap_kho'] ? 'checked' : ''; ?>>
            <label for="qlnhap_kho">Quản lý nhập kho</label><br>

            <input type="checkbox" id="qlnha_cung_cap" name="qlnha_cung_cap" value="1" <?php echo $permission['qlnha_cung_cap'] ? 'checked' : ''; ?>>
            <label for="qlnha_cung_cap">Quản lý nhà cung cấp</label><br>

            <input type="checkbox" id="qlnguoi_dung" name="qlnguoi_dung" value="1" <?php echo $permission['qlnguoi_dung'] ? 'checked' : ''; ?>>
            <label for="qlnguoi_dung">Quản lý người dùng</label><br>

            <input type="checkbox" id="qlkhach_hang" name="qlkhach_hang" value="1" <?php echo $permission['qlkhach_hang'] ? 'checked' : ''; ?>>
            <label for="qlkhach_hang">Quản lý khách hàng</label><br>

            <input type="checkbox" id="qldon_hang" name="qldon_hang" value="1" <?php echo $permission['qldon_hang'] ? 'checked  ' : ''; ?>>
            <label for="qldon_hang">Quản lý đơn hàng</label><br>

            <input type="checkbox" id="qlsan_pham" name="qlsan_pham" value="1" <?php echo $permission['qlsan_pham'] ? 'checked' : ''; ?>>
            <label for="qlsan_pham">Quản lý sản phẩm</label><br>

            <input type="checkbox" id="qldanh_muc" name="qldanh_muc" value="1" <?php echo $permission['qldanh_muc'] ? 'checked' : ''; ?>>
            <label for="qldanh_muc">Quản lý danh mục</label><br>

            <input type="checkbox" id="qlbao_hanh" name="qlbao_hanh" value="1" <?php echo $permission['qlbao_hanh'] ? 'checked' : ''; ?>>
            <label for="qlbao_hanh">Quản lý bảo hành</label><br>

            <input type="checkbox" id="qlbinh_luan" name="qlbinh_luan" value="1" <?php echo $permission['qlbinh_luan'] ? 'checked' : ''; ?>>
            <label for="qlbinh_luan">Quản lý bình luận</label><br>

            <input type="checkbox" id="qlgiam_gia" name="qlgiam_gia" value="1" <?php echo $permission['qlgiam_gia'] ? 'checked' : ''; ?>>
            <label for="qlgiam_gia">Quản lý giảm giá</label><br>

            <input type="submit" value="Cập nhật quyền">
        </form>
    </div>
</body>

</html>