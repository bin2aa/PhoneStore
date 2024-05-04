<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhà cung cấp</title>

</head>

<body>

    <h2>Danh sách nhà cung cấp</h2>

    <div id="addSupplierContainer"></div>
    <div id="updateSupplierContainer"></div>
    <div class="overlay"></div>

    <form class="search-form-supplier">
        <label for="search">Tìm kiếm nhà cung cấp:</label>
        <input type="text" id="search" name="search" placeholder="Nhập tên nhà cung cấp cần tìm kiếm">
        <button type="submit">Tìm kiếm</button>
    </form>

    <!-- <form action="index.php?ctrl=supplierController&action=viewAddSupplier" method="post"> -->
    <!-- <button type="submit">Thêm nhà cung cấp</button> -->
    <a class="addSupplierLink" href="index.php?ctrl=supplierController&action=viewAddSupplier">Thêm nhà cung cấp</a>
    <table>
        <thead>
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
                    <a class="deleteSupplierLink"
                        href="index.php?ctrl=supplierController&action=deleteSupplier&id=<?php echo $supplier['id']; ?>">Xóa</a>
                    <a class="updateSupplierLink"
                        href="index.php?ctrl=supplierController&action=updateSupplierView&id=<?php echo $supplier['id']; ?>">Sửa</a>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <!-- </form> -->

</body>

</html>