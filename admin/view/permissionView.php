<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/css/common.css">
    <!-- Thư viện BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh sách quyền</title>
</head>

<body>
    <div class="containerr">
        <div class="header-box">
            <div class="header-icon">
                <img src="/admin/img/icon/customer.png" alt="authorizeImg">
            </div>
            <h2 class="mt-0 mb-0">PHÂN QUYỀN TÀI KHOẢN</h2>
        </div>

        <div id="addPermissionContainer"></div>
        <div id="updatePermissionContainer"></div>
        <div class="overlay"></div>

        <div class="addNew btn btn-primary">
            <a class="addPermissionLink" href="index.php?ctrl=permissionController&action=viewAddPermission">Thêm quyền mới</a>
        </div>

        <table class="table">
            <tr class="bg-dark text-white">
                <th class="align-middle" style="width: 7%;">Vai trò</th>
                <th>Nhập kho</th>
                <th>Nhà c.cấp</th>
                <th>Người dùng</th>
                <th>Khách hàng</th>
                <th>Đơn hàng</th>
                <th>Sản phẩm</th>
                <th>Danh mục</th>
                <th>Bảo hành</th>
                <th>Bình luận</th>
                <th>Giảm giá</th>
                <th class="align-middle" style="width: 12%;">Hành động</th>
            </tr>
            <?php foreach ($permissions as $permission) : ?>
                <tr>
                    <td><?php echo $permission['vai_tro']; ?></td>
                    <td><?php echo $permission['qlnhap_kho'] ? 'Có' : 'Không'; ?></td>
                    <td><?php echo $permission['qlnha_cung_cap'] ? 'Có' : 'Không'; ?></td>
                    <td><?php echo $permission['qlnguoi_dung'] ? 'Có' : 'Không'; ?></td>
                    <td><?php echo $permission['qlkhach_hang'] ? 'Có' : 'Không'; ?></td>
                    <td><?php echo $permission['qldon_hang'] ? 'Có' : 'Không'; ?></td>
                    <td><?php echo $permission['qlsan_pham'] ? 'Có' : 'Không'; ?></td>
                    <td><?php echo $permission['qldanh_muc'] ? 'Có' : 'Không'; ?></td>
                    <td><?php echo $permission['qlbao_hanh'] ? 'Có' : 'Không'; ?></td>
                    <td><?php echo $permission['qlbinh_luan'] ? 'Có' : 'Không'; ?></td>
                    <td><?php echo $permission['qlgiam_gia'] ? 'Có' : 'Không'; ?></td>
                    <td>
                        <a class="updatePermissionLink btn btn-primary" href="index.php?ctrl=permissionController&action=updatePermissionView&role=<?php echo $permission['vai_tro']; ?>">Sửa</a>
                        <a class="deletePermissionLink btn btn-warning" href="index.php?ctrl=permissionController&action=deletePermission&role=<?php echo $permission['vai_tro']; ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>