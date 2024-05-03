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

    <div id="addCustomerContainer"></div>
    <div id="updateCustomerContainer"></div>
    <div class="overlay"></div>

    <form class="search-form-customer">
        <label for="search">Tìm kiếm khách hàng:</label>
        <input type="text" id="search" name="search" placeholder="Nhập tên khách hàng cần tìm kiếm">
        <button type="submit">Tìm kiếm</button>
    </form>



    <!-- <form class="addCustomerLink" action="index.php?ctrl=customerController&action=viewAddCustomer" method="post"> -->
    <!-- <button type="submit">Thêm khách hàng</button> -->
    <a class="addCustomerLink" href="index.php?ctrl=customerController&action=viewAddCustomer">Thêm khách hàng</a>
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
                        <a class="deleteCustomerLink" href="index.php?ctrl=customerController&action=deleteCustomer&id=<?php echo $customer['id']; ?>">Xóa</a>
                        <a class="updateCustomerLink" href="index.php?ctrl=customerController&action=updateCustomerView&id=<?php echo $customer['id']; ?>">Sửa</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <!-- </form> -->

</body>

</html>