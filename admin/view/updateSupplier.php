<!-- updatesupplier.php -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật nhà cung cấp</title>
</head>

<body>
    <div class="updateSupplier">

        <h2>Cập nhật nhà cung cấp</h2>
        <form class="supplierSubmitUd" action="index.php?ctrl=supplierController&action=updateSupplier" method="post">

            <input type="hidden" name="id" value="<?php echo $supplier['id']; ?>">

            <label for="ten">Tên:</label>
            <input type="text" name="ten" value="<?php echo $supplier['ten']; ?>" required><br>

            <label for="so_dien_thoai">Số điện thoại:</label>
            <input type="text" name="so_dien_thoai" value="<?php echo $supplier['so_dien_thoai']; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $supplier['email']; ?>" required><br>

            <label for="dia_chi">Địa chỉ:</label>
            <input type="text" name="dia_chi" value="<?php echo $supplier['dia_chi']; ?>" required><br><br>

            <button type="submit">Cập nhật nhà cung cấp</button>
        </form>
    </div>
</body>

</html>