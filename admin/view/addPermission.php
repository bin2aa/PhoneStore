<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm quyền mới</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vkA4tf+gfRnJlz9+L0V5kiYcG7Bi4JF3x04fX5uU5fWVJ+u9PwIZgecokFm5P1C5" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="addPermission">
            <h2 class="lead fs-1" style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px dotted black;">Thêm nhóm quyền</h2>
            <form class="permissionSubmitAdd" method="POST" action="index.php?ctrl=permissionController&action=addPermission">
                <div class="mb-3">
                    <label for="role" class="form-label">Vai trò:</label>
                    <input type="text" id="role" name="role" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quyền quản lý:</label>
                    <h3>------------------------------------</h3>
                    <div class="form-check">
                        <input type="checkbox" id="qlnhap_kho" name="qlnhap_kho" value="1" class="form-check-input">
                        <label for="qlnhap_kho" class="form-check-label">Quản lý nhập kho</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="qlnha_cung_cap" name="qlnha_cung_cap" value="1" class="form-check-input">
                        <label for="qlnha_cung_cap" class="form-check-label">Quản lý nhà cung cấp</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="qlnguoi_dung" name="qlnguoi_dung" value="1" class="form-check-input">
                        <label for="qlnguoi_dung" class="form-check-label">Quản lý người dùng</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="qlkhach_hang" name="qlkhach_hang" value="1" class="form-check-input">
                        <label for="qlkhach_hang" class="form-check-label">Quản lý khách hàng</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="qldon_hang" name="qldon_hang" value="1" class="form-check-input">
                        <label for="qldon_hang" class="form-check-label">Quản lý đơn hàng</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="qlsan_pham" name="qlsan_pham" value="1" class="form-check-input">
                        <label for="qlsan_pham" class="form-check-label">Quản lý sản phẩm</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="qldanh_muc" name="qldanh_muc" value="1" class="form-check-input">
                        <label for="qldanh_muc" class="form-check-label">Quản lý danh mục</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="qlbao_hanh" name="qlbao_hanh" value="1" class="form-check-input">
                        <label for="qlbao_hanh" class="form-check-label">Quản lý bảo hành</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="qlbinh_luan" name="qlbinh_luan" value="1" class="form-check-input">
                        <label for="qlbinh_luan" class="form-check-label">Quản lý bình luận</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="qlgiam_gia" name="qlgiam_gia" value="1" class="form-check-input">
                        <label for="qlgiam_gia" class="form-check-label">Quản lý giảm giá</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Thêm quyền</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-NV2DWb1Wti8OY8T4O8wc4OJ1sGJ/Ocp3kiS8BRceP8OVR0sN3gkNDISPDgaFwhB3" crossorigin="anonymous"></script>
</body>

</html>
