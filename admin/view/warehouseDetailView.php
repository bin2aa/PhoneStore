<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="css/common.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vkA4tf+gfRnJlz9+L0V5kiYcG7Bi4JF3x04fX5uU5fWVJ+u9PwIZgecokFm5P1C5" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="detailWarehouseReceipt">
            <h2>Chi tiết nhập kho</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>ID nhập kho</th>
                            <th>ID sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <!-- <th>Thao tác</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($warehousess as $warehouses) : ?>
                            <tr>
                                <td><?php echo $warehouses['id']; ?></td>
                                <td><?php echo $warehouses['id_nhap_kho']; ?></td>
                                <td><?php echo $warehouses['id_san_pham']; ?></td>
                                <td><?php echo $warehouses['so_luong']; ?></td>
                                <td><?php echo $warehouses['gia']; ?></td>
                                <!-- <td><a href="index.php?ctrl=warehouseController&action=deleteWarehouseDetail&id=<?php echo $warehouses['id']; ?>">Xóa</a></td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-NV2DWb1Wti8OY8T4O8wc4OJ1sGJ/Ocp3kiS8BRceP8OVR0sN3gkNDISPDgaFwhB3" crossorigin="anonymous"></script>
</body>

</html>
