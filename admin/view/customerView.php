<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khách hàng</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <h2>Danh sách khách hàng</h2>
    <form action="index.php?ctrl=customerController&action=viewAddCustomer" method="post">
        <button type="submit">Thêm khách hàng</button>
        <table>
            <thead>
                <tr>
                    <th>ID khách hàng</th>
                    <th>Tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer) : ?>
                    <tr>
                        <td><?php echo $customer['id']; ?></td>
                        <td><?php echo $customer['ten']; ?></td>
                        <td><?php echo $customer['so_dien_thoai']; ?></td>
                        <td><?php echo $customer['email']; ?></td>
                        <td><?php echo $customer['dia_chi']; ?></td>

                        <td>
                            <a href="index.php?ctrl=customerController&action=deleteCustomer&id=<?php echo $customer['id']; ?>">Xóa</a>
                            <a href="index.php?ctrl=customerController&action=updateCustomerView&id=<?php echo $customer['id']; ?>">Sửa</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </form>

</body>

</html>