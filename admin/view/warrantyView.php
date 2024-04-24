<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách phiếu bảo hành</title>
</head>
<p>Thời gian hiện tại:
    <?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    echo date('Y-m-d H:i:s');
    ?>
</p>

<body>
    <h1>Danh sách phiếu bảo hành</h1>

    <form class='search-form-warranty'>
        <label for="search">Tìm tình trạng bảo hành:</label>
        <select id="search" name="search">
            <option value="">Tất cả</option>
            <option value="Đang bảo hành">Đang bảo hành</option>
            <option value="Chờ xử lý">Chờ xử lý</option>
            <option value="Đã từ chối">Đã từ chối</option>
            <option value="Đã hoàn thành">Đã hoàn thành</option>
            <option value="Hết hạn bảo hành">Hết hạn bảo hành</option>
        </select>
        <button type="submit">Tìm kiếm</button>
    </form>





    <a href="index.php?ctrl=warrantyController&action=viewAddWarranty">Thêm phiếu bảo hành</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Sản phẩm</th>
                <th>ID Đơn hàng</th>
                <th>Ngày lập</th>
                <th>Ngày hết hạn</th>
                <th>Tình trạng</th>
                <th>Ghi chú</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($warranties as $warranty) : ?>
                <tr>
                    <td><?php echo $warranty['id']; ?></td>
                    <td><?php echo $warranty['id_san_pham']; ?></td>
                    <td><?php echo $warranty['id_don_hang']; ?></td>
                    <td><?php echo $warranty['ngay_lap']; ?></td>
                    <td><?php echo $warranty['ngay_het_han']; ?></td>
                    <td><?php echo $warranty['tinh_trang']; ?></td>
                    <td><?php echo $warranty['ghi_chu']; ?></td>
                    <td>
                        <a href="index.php?ctrl=warrantyController&action=updateWarrantyView&id=<?php echo $warranty['id']; ?>&id_san_pham=<?php echo $warranty['id_san_pham']; ?> &id_don_hang=<?php echo $warranty['id_don_hang'];  ?> &tinh_trang=<?php echo $warranty['tinh_trang'];  ?>">Sửa</a>
                        <a href="index.php?ctrl=warrantyController&action=deleteWarranty&id=<?php echo $warranty['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa phiếu bảo hành này không?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>