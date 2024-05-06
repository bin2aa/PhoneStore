<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật khách hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="updateCustomer container">
        <h2>Cập nhật khách hàng</h2>
        <form class="customerSubmitUd" action="index.php?ctrl=customerController&action=updateCustomer" method="post">

            <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">

            <div class="mb-3">
                <label for="id_nguoi_dung" class="form-label">Chọn id người dùng:</label>
                <select name="id_nguoi_dung" class="form-select" required>
                    <?php foreach ($users as $user) : ?>
                        <option value="<?php echo $user['id']; ?>"><?php echo $user['id']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="ten" class="form-label">Tên:</label>
                <input type="text" name="ten" value="<?php echo $customer['ten']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="so_dien_thoai" class="form-label">Số điện thoại:</label>
                <input type="text" name="so_dien_thoai" value="<?php echo $customer['so_dien_thoai']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" value="<?php echo $customer['email']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="dia_chi" class="form-label">Địa chỉ:</label>
                <input type="text" name="dia_chi" value="<?php echo $customer['dia_chi']; ?>" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật khách hàng</button>
        </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
