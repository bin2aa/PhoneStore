<!DOCTYPE html>
<html>

<head>
    <title>Danh sách quyền</title>
</head>

<body>
    <h2>Danh sách quyền</h2>

    <div id="addPermissionContainer"></div>
    <div id="updatePermissionContainer"></div>
    <div class="overlay"></div>

    <a class="addPermissionLink" href="index.php?ctrl=permissionController&action=viewAddPermission">Thêm quyền mới</a>
    <table>
        <tr>
            <th>Vai trò</th>
            <th>Quản lý nhập kho</th>
            <th>Quản lý nhà cung cấp</th>
            <th>Quản lý người dùng</th>
            <th>Quản lý khách hàng</th>
            <th>Quản lý đơn hàng</th>
            <th>Quản lý sản phẩm</th>
            <th>Quản lý danh mục</th>
            <th>Quản lý bảo hành</th>
            <th>Quản lý bình luận</th>
            <th>Quản lý giảm giá</th>
            <th>Hành động</th>
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
                    <a class="updatePermissionLink" href="index.php?ctrl=permissionController&action=updatePermissionView&role=<?php echo $permission['vai_tro']; ?>">Sửa</a>
                    <a href="index.php?ctrl=permissionController&action=deletePermission&role=<?php echo $permission['vai_tro']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa quyền này?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>