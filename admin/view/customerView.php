<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/css/common.css">
    <!-- Thư viện BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh sách khách hàng</title>
    <style>
        /* table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        } */
    </style>
</head>

<body>
    <div class="containerr">
        <div class="header-box">
            <div class="header-icon">
                <img src="/admin/img/icon/customer.png" alt="customerImg">
            </div>
            <h2 class="mt-0 mb-0">THÔNG TIN KHÁCH HÀNG</h2>
        </div>

        <div id="addCustomerContainer"></div>
        <div id="updateCustomerContainer"></div>
        <div class="overlay"></div>

        <!-- <form class="search-form-customer">
            <label for="search">Tìm kiếm khách hàng:</label>
            <input type="text" id="search" name="search" placeholder="Nhập tên khách hàng cần tìm kiếm">
            <button type="submit">Tìm kiếm</button>
        </form> -->

        <div class="searchHolder">
            <form class="search-form-customer mt-3">
                <div class="row g-3 searchField">
                    <!-- <div class="col-auto">
                        <label for="search" class="col-form-label"></label>
                    </div> -->
                    <div class="col-auto">
                        <input type="hidden" name="action" value="searchProducts">
                        <input type="text" id="search" name="search" placeholder="Tên khách hàng..." class="form-control" width="100%">
                    </div>
                    <div class="col-auto search">
                        <button type="submit" class="btn btn-light btn-outline-secondary">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>



        <!-- <form class="addCustomerLink" action="index.php?ctrl=customerController&action=viewAddCustomer" method="post"> -->
        <!-- <button type="submit">Thêm khách hàng</button> -->
        <div class="addNew btn btn-primary">
            <a class="addCustomerLink" href="index.php?ctrl=customerController&action=viewAddCustomer">THÊM MỚI</a>
        </div>
        <table class="table">
            <thead class="bg-dark text-white">
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
                            <a class="btn btn-danger deleteCustomerLink" href="index.php?ctrl=customerController&action=deleteCustomer&id=<?php echo $customer['id']; ?>">Xóa</a>
                            <a class="btn btn-success updateCustomerLink" href="index.php?ctrl=customerController&action=updateCustomerView&id=<?php echo $customer['id']; ?>">Sửa</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <!-- </form> -->
</body>

</html>
