
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm khách hàng</title>
</head>

<body>

    <h2>Thêm khách hàng</h2>

    <form action="index.php?ctrl=customerController&action=addCustomer" method="post">

        <label for="ten">Tên:</label>
        <input type="text" name="ten" required><br>

        <label for="so_dien_thoai">Số điện thoại:</label>
        <input type="text" name="so_dien_thoai" required><br>

        <label for="email">email:</label>
        <input type="email" name="email" required><br>

        <label for="dia_chi">Địa chỉ:</label>
        <input type="text" name="dia_chi" required><br><br>

        <button type="submit">Thêm khách hàng</button>
    </form>

</body>

</html>