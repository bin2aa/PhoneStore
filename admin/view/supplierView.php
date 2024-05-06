<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/css/common.css">
    <!-- Thư viện BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh sách nhà cung cấp</title>

</head>

<body>
    <div class="containerr">

        <div class="header-box">
            <div class="header-icon">
                <img src="/admin/img/icon/provider.png" alt="supplierImg">
            </div>
            <h2 class="mt-0 mb-0">THÔNG TIN NHÀ CUNG CẤP</h2>
        </div>

        <div id="addSupplierContainer"></div>
        <div id="updateSupplierContainer"></div>
        <div class="overlay"></div>

        <!-- <form class="search-form-supplier">
            <label for="search">Tìm kiếm nhà cung cấp:</label>
            <input type="text" id="search" name="search" placeholder="Nhập tên nhà cung cấp cần tìm kiếm">
            <button type="submit">Tìm kiếm</button>
        </form> -->
        <div class="searchHolder">
            <form class="search-form-supplier mt-3">
                <div class="row g-3 searchField">
                    <!-- <div class="col-auto">
                        <label for="search" class="col-form-label"></label>
                    </div> -->
                    <div class="col-auto">
                        <!-- <input type="hidden" name="action" value="searchProducts"> -->
                        <input type="text" id="search" name="search" placeholder="Tên nhà cung cấp..." class="form-control" width="100%">
                    </div>
                    <div class="col-auto search">
                        <button type="submit" class="btn btn-light btn-outline-secondary">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- <form action="index.php?ctrl=supplierController&action=viewAddSupplier" method="post"> -->
        <!-- <button type="submit">Thêm nhà cung cấp</button> -->
        <div class="addNew btn btn-primary">
            <a class="addSupplierLink" href="index.php?ctrl=supplierController&action=viewAddSupplier">Thêm nhà cung cấp</a>
        </div>

        <table class="table">
            <thead class="bg-dark text-white">
                <tr>
                    <th>ID nhà cung cấp</th>
                    <th>Tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($suppliers as $supplier) : ?>
                    <tr>
                        <td><?php echo $supplier['id']; ?></td>
                        <td><?php echo $supplier['ten']; ?></td>
                        <td><?php echo $supplier['so_dien_thoai']; ?></td>
                        <td><?php echo $supplier['email']; ?></td>
                        <td><?php echo $supplier['dia_chi']; ?></td>

                        <td>
                            <a class="deleteSupplierLink btn btn-danger" href="index.php?ctrl=supplierController&action=deleteSupplier&id=<?php echo $supplier['id']; ?>">Xóa</a>
                            <a class="updateSupplierLink btn btn-success" href="index.php?ctrl=supplierController&action=updateSupplierView&id=<?php echo $supplier['id']; ?>">Sửa</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- </form> -->

</body>

</html>