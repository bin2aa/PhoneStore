<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật phiếu nhập kho</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vkA4tf+gfRnJlz9+L0V5kiYcG7Bi4JF3x04fX5uU5fWVJ+u9PwIZgecokFm5P1C5" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="updateWarehouseReceipt">
            <h2>Cập nhật phiếu nhập kho</h2>
            <?php if (isset($warehouseReceipt)) : ?>
                <form class="warehouseReceiptSubmitUd" action="index.php?ctrl=warehouseController&action=updateWarehouseReceipt" method="post">
                    <input type="hidden" name="id" value="<?php echo $warehouseReceipt['id']; ?>">
                    <div class="mb-3">
                        <label for="id_nha_cung_cap" class="form-label">Nhà cung cấp:</label>
                        <select name="id_nha_cung_cap" class="form-select" required>
                            <?php foreach ($suppliers as $supplier) : ?>
                                <option value="<?php echo $supplier['id']; ?>"><?php echo $supplier['ten']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="ngay" class="form-label">Ngày:</label>
                        <input type="datetime-local" name="ngay" id="ngay" value="<?php echo $warehouseReceipt['ngay']; ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="tong_tien" class="form-label">Tổng tiền:</label>
                        <input type="text" name="tong_tien" id="tong_tien" value="<?php echo $warehouseReceipt['tong_tien']; ?>" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="ghi_chu" class="form-label">Ghi chú:</label>
                        <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="5" class="form-control"><?php echo $warehouseReceipt['ghi_chu']; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            <?php else : ?>
                <p>Không tìm thấy phiếu nhập kho.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-NV2DWb1Wti8OY8T4O8wc4OJ1sGJ/Ocp3kiS8BRceP8OVR0sN3gkNDISPDgaFwhB3" crossorigin="anonymous"></script>
</body>

</html>
