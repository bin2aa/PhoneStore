<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/css/common.css">
    <!-- Thư viện BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh sách phiếu nhập kho</title>
    <style>
        #detailWarehouseReceiptContainer {
            min-width: 70%;
        }

<<<<<<< HEAD
        .search-container {
            display: flex;
            border: 1px solid rgb(200, 200, 200);
            border-radius: 5px;
            justify-content: center;
            align-items: center;
            margin-block: 10px;
            padding: 10px;
            width: 100%;
        }

        .search-container input[type="date"] {
            padding: 5px;
            border: 1px solid rgb(200, 200, 200);
            border-radius: 5px;
            margin: 0 10px;
        }

        .search-container form {
=======
        .search-container{
        display: flex;
        border: 1px solid rgb(200,200,200);
        border-radius: 5px;
        justify-content: center;
        align-items: center;
        margin-block: 10px;
        padding: 10px;
        width: 100%;
        }
        .search-container input[type="date"]{
            padding: 5px;
            border: 1px solid rgb(200,200,200);
            border-radius: 5px;
            margin: 0 10px;
        }
        .search-container form{
>>>>>>> 3453498e711916c247103c5e8e14941dc3f0e331
            display: flex;
            justify-content: center;
            align-items: center;
        }
<<<<<<< HEAD

        .refresh {
=======
        .refresh{
>>>>>>> 3453498e711916c247103c5e8e14941dc3f0e331
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="containerr">
        <div class="header-box">
            <div class="header-icon">
                <img src="/admin/img/icon/list.png" alt="warehouseImg">
            </div>
            <h2 class="mt-0 mb-0">DANH SÁCH PHIẾU NHẬP KHO</h2>
        </div>

        <div id="addWarehouseReceiptContainer"></div>
        <div id="updateWarehouseReceiptContainer"></div>
        <div id="detailWarehouseReceiptContainer"></div>
        <div class="overlay"></div>

        <!-- <form class="search-form-warehouse">
            <label for="search">Tìm kiếm phiếu nhập kho:</label>
            <input type="text" id="search" name="search" placeholder="Nhập tên phiếu nhập kho cần tìm kiếm">
            <button type="submit">Tìm kiếm</button>
        </form> -->
        <div class="searchHolder">
            <form class="search-form-warehouse mt-3">
                <div class="row g-3 searchField">
                    <div class="col-auto">
                        <input type="hidden" name="action" value="searchProducts">
                        <input type="text" id="search" name="search" placeholder="Tên nhà cung cấp..." class="form-control" width="100%">
                    </div>
                    <div class="col-auto search">
                        <button type="submit" class="btn btn-light btn-outline-secondary">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="filter-and-refresh search-container">
            <form class="filterOrder" method="GET" action="index.php">
                <input type="hidden" name="ctrl" value="warehouseController">
                <input type="hidden" name="action" value="filterOrder">
                Từ ngày: <input type="date" name="from_date" required>
                Đến ngày: <input type="date" name="to_date" required>
                <input type="submit" value="Lọc" class="btn btn-primary">
            </form>
            <!-- refresh -->
            <div class="refresh">
                <a href="index.php?ctrl=warehouseController" class="btn btn-light btn-outline-secondary">Làm mới</a>
            </div>
        </div>
        <div class="addNew btn btn-primary">
            <a class="addWareHouseReceiptLink" href="index.php?ctrl=warehouseController&action=showAddWarehouseReceiptForm">Thêm hàng vào kho </a>
        </div>

        <table class="table">
            <tr class="bg-dark text-white">
                <th>ID</th>
                <th>ID nhà c.cấp</th>
                <th>Tên nhà c.cấp</th>
                <th>Ngày</th>
                <th>Tổng tiền</th>
                <th>Ghi chú</th>
                <th>Thao tác</th>
            </tr>

            <?php foreach ($warehouseReceipts as $warehouseReceipt) : ?>
                <tr>
                    <td><?php echo $warehouseReceipt['id']; ?></td>
                    <td><?php echo $warehouseReceipt['id_nha_cung_cap']; ?></td>
                    <td><?php echo $warehouseReceipt['ten_ncc']; ?></td>
                    <td><?php echo $warehouseReceipt['ngay']; ?></td>
                    <td><?php echo  number_format($warehouseReceipt['tong_tien']); ?></td>
                    <td><?php echo $warehouseReceipt['ghi_chu']; ?></td>
                    <td>
                        <a class="deleteWarehouseReceiptLink btn btn-danger" href="index.php?ctrl=warehouseController&action=deleteWarehouseReceipt&id=<?php echo $warehouseReceipt['id']; ?>">Xóa</a>
                        <a class="updateWarehouseReceiptLink btn btn-success" href="index.php?ctrl=warehouseController&action=showUpdateWarehouseReceiptForm&id=<?php echo $warehouseReceipt['id']; ?>">Cập nhật</a>
                        <a class="detailWarehouseReceiptLink btn btn-info" href="index.php?ctrl=warehouseController&action=viewWarehouseDetail&id=<?php echo $warehouseReceipt['id']; ?>">Chi tiết</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</body>

</html>