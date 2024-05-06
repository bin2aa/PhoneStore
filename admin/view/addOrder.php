<?php
// PHP code here
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm đơn hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vkA4tf+gfRnJlz9+L0V5kiYcG7Bi4JF3x04fX5uU5fWVJ+u9PwIZgecokFm5P1C5" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="addOrder">
            <h2>Thêm đơn hàng</h2>

            <form class="orderSubmitAdd" action="index.php?ctrl=orderController&action=addOrder" method="post">

                <div class="mb-3">
                    <label for="id_khach_hang" class="form-label">Chọn khách hàng:</label>
                    <select name="id_khach_hang" class="form-select" required>
                        <?php
                        foreach ($customers as $customer) {
                            echo '<option value="' . $customer['id'] . '">' . $customer['ten'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ngay" class="form-label">Ngày:</label>
                    <input type="datetime-local" name="ngay" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tong_tien" class="form-label">Tổng tiền:</label>
                    <input type="number" name="tong_tien" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="ghi_chu" class="form-label">Ghi chú:</label>
                    <textarea name="ghi_chu" class="form-control" rows="5"></textarea>
                </div>

                <input type="hidden" name="tinh_trang">

                <button type="submit" class="btn btn-primary">Thêm đơn hàng</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-NV2DWb1Wti8OY8T4O8wc4OJ1sGJ/Ocp3kiS8BRceP8OVR0sN3gkNDISPDgaFwhB3" crossorigin="anonymous"></script>
</body>

</html>
