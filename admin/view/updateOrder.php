<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật đơn hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vkA4tf+gfRnJlz9+L0V5kiYcG7Bi4JF3x04fX5uU5fWVJ+u9PwIZgecokFm5P1C5" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="updateOrder">
            <h2>Cập nhật đơn hàng</h2>

            <form class="orderSubmitUd" action="index.php?ctrl=orderController&action=updateOrder" method="post">

                <input type="hidden" name="id" value="<?php echo $order['id']; ?>">

                <div class="mb-3">
                    <label for="id_khach_hang" class="form-label">Chọn ID khách hàng:</label>
                    <select name="id_khach_hang" class="form-select" required>
                        <?php
                        foreach ($customers as $customer) {
                            echo '<option value="' . $customer['id'] . '">' . $customer['id'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ngay" class="form-label">Ngày:</label>
                    <input type="datetime-local" name="ngay" value="<?php echo $order['ngay']; ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tong_tien" class="form-label">Tổng tiền:</label>
                    <input type="number" step="0.01" name="tong_tien" value="<?php echo $order['tong_tien']; ?>" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label for="ghi_chu" class="form-label">Ghi chú:</label>
                    <textarea name="ghi_chu" class="form-control" rows="5"><?php echo $order['ghi_chu']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="tinh_trang" class="form-label">Tình trạng khách hàng:</label>
                    <select name="tinh_trang" class="form-select" required>
                        <?php
                        foreach ($status as $st) {
                            $select = ($st['tinh_trang'] == $_GET['tinh_trang']) ? 'selected' : '';
                            echo '<option value="' . $st['tinh_trang'] . '" ' . $select . '>' . $st['tinh_trang'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật đơn hàng</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-NV2DWb1Wti8OY8T4O8wc4OJ1sGJ/Ocp3kiS8BRceP8OVR0sN3gkNDISPDgaFwhB3" crossorigin="anonymous"></script>
</body>

</html>
