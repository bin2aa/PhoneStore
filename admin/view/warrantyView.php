<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/css/common.css">
    <!-- Thư viện BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh sách phiếu bảo hành</title>
</head>
<body>
    <div class="containerr">
        <div class="header-box">
            <div class="header-icon">
                <img src="/admin/img/icon/list.png" alt="orderImg">
            </div>
            <h2 class="mt-0 mb-0">DANH SÁCH PHIẾU BẢO HÀNH</h2>
        </div>

        <p>Thời gian hiện tại:
            <?php
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            echo date('Y-m-d H:i:s');
            ?>
        </p>

        <div id="updateWarrantyContainer"></div>
        <div id="addWarrantyContainer"></div>
        <div class="overlay"></div>

        <!-- <form class='search-form-warranty'>
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
        </form> -->
        <div class="searchHolder">
            <form class="search-form-warranty mt-3">
                <div class="row g-3 searchField">
                    <div class="col-auto">
                        <!-- <input type="hidden" name="action" value="searchProducts"> -->
                        <label for="search" class="col-form-label">Tình trạng:</label>
                        <select id="search" name="search">
                            <option value="">Tất cả</option>
                            <option value="Đang bảo hành">Đang bảo hành</option>
                            <option value="Chờ xử lý">Chờ xử lý</option>
                            <option value="Đã từ chối">Đã từ chối</option>
                            <option value="Đã hoàn thành">Đã hoàn thành</option>
                            <option value="Hết hạn bảo hành">Hết hạn bảo hành</option>
                        </select>
                        <button type="submit" class="btn btn-light btn-outline-secondary">Lọc</button>
                    </div>
                </div>
            </form>
        </div>



        <div class="addNew btn btn-primary">
            <a class="addWarrantyLink" href="index.php?ctrl=warrantyController&action=viewAddWarranty">Thêm phiếu bảo hành</a>
        </div>

        <table class="table">
            <thead class="bg-dark text-white">
                <tr>
                    <th>ID</th>
                    <th>ID Sản phẩm</th>
                    <th>ID Đơn hàng</th>
                    <th style="width: 12%;">Ngày lập</th>
                    <th style="width: 12%;">Ngày hết hạn</th>
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
                            <a class="updateWarrantyLink btn btn-success" href="index.php?ctrl=warrantyController&action=updateWarrantyView&id=<?php echo $warranty['id']; ?>&id_san_pham=<?php echo $warranty['id_san_pham']; ?> &id_don_hang=<?php echo $warranty['id_don_hang'];  ?> &tinh_trang=<?php echo $warranty['tinh_trang'];  ?>">Sửa</a>
                            <a href="index.php?ctrl=warrantyController&action=deleteWarranty&id=<?php echo $warranty['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa phiếu bảo hành này không?')" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>