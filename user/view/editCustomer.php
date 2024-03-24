<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin khách hàng</title>
    <style>
        /* CSS cho form chỉnh sửa */
        .edit-form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .edit-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .edit-form label {
            display: block;
            margin-bottom: 10px;
        }

        .edit-form input[type="text"],
        .edit-form input[type="email"],
        .edit-form input[type="tel"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .edit-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        .edit-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="edit-form">
        <h2>Chỉnh sửa thông tin khách hàng</h2>
        <form action="index.php?ctrl=customerUserController&action=updateCustomer" method="POST">
            <input type="hidden" name="customer_id" value="<?php echo $customer['id']; ?>">
            <label for="ten">Tên:</label>
            <input type="text" id="ten" name="ten" value="<?php echo $customer['ten']; ?>">

            <label for="so_dien_thoai">Số điện thoại:</label>
            <input type="tel" id="so_dien_thoai" name="so_dien_thoai" value="<?php echo $customer['so_dien_thoai']; ?>">

            <label for="email">Email:</label>
<input type="email" id="email" name="email" value="<?php echo $customer['email']; ?>" readonly style="background-color: #f0f0f0; color: #666; cursor: not-allowed;">

            <label for="dia_chi">Địa chỉ:</label>
            <input type="text" id="dia_chi" name="dia_chi" value="<?php echo $customer['dia_chi']; ?>">

            <input type="hidden" name="id_nguoi_dung" value="<?php echo $id_nguoi_dung; ?>">

            
            <input type="submit" value="Lưu chỉnh sửa">
        </form>
    </div>
</body>

</html>
