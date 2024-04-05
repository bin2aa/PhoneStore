<!DOCTYPE html>
<html>

<head>
    <title>Thêm quyền mới</title>
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
    <h2>Thêm quyền mới</h2>
    <form method="POST" action="index.php?ctrl=permissionController&action=addPermission">
        <label for="role">Vai trò:</label>
        <input type="text" id="role" name="role" required>

        <label>Quyền quản lý:</label>
        <h3>------------------------------------</h3>


        <input type="checkbox" id="qlnhap_kho" name="qlnhap_kho" value="1">
        <label for="qlnhap_kho">Quản lý nhập kho</label><br>

        <input type="checkbox" id="qlnha_cung_cap" name="qlnha_cung_cap" value="1">
        <label for="qlnha_cung_cap">Quản lý nhà cung cấp</label><br>

        <input type="checkbox" id="qlnguoi_dung" name="qlnguoi_dung" value="1">
        <label for="qlnguoi_dung">Quản lý người dùng</label><br>

        <input type="checkbox" id="qlkhach_hang" name="qlkhach_hang" value="1">
        <label for="qlkhach_hang">Quản lý khách hàng</label><br>

        <input type="checkbox" id="qldon_hang" name="qldon_hang" value="1">
        <label for="qldon_hang">Quản lý đơn hàng</label><br>

        <input type="checkbox" id="qlsan_pham" name="qlsan_pham" value="1">
        <label for="qlsan_pham">Quản lý sản phẩm</label><br>

        <input type="checkbox" id="qldanh_muc" name="qldanh_muc" value="1">
        <label for="qldanh_muc">Quản lý danh mục</label><br>

        <input type="submit" value="Thêm quyền">
    </form>
</body>

</html>