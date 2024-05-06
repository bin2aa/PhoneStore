<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/css/common.css">
    <!-- Thư viện BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh sách đơn đặt hàng</title>

</head>

<body>
    <div class="containerr">
        <div class="header-box">
            <div class="header-icon">
                <img src="/admin/img/icon/list.png" alt="orderImg">
            </div>
            <h2 class="mt-0 mb-0">DANH SÁCH ĐƠN ĐẶT HÀNG</h2>
        </div>
        <p class="time">Bây giờ là:
        <?php
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        echo date('Y-m-d H:i:s'); ?></p>

        <div id="addOrderContainer"></div>
        <div id="updateOrderContainer"></div>
        <div id="detailOrderContainer"></div>
        <div class="overlay"></div>


        <!-- <form class="search-form-order">
            <label for="search">Tìm đơn đặt hàng:</label>
            <input type="text" id="search" name="search" placeholder="Nhập tên khách hàng cần tìm">
            <button type="submit">Tìm kiếm</button>
        </form> -->
        <div class="searchHolder">
            <form class="search-form-order mt-3">
                <div class="row g-3 searchField">
                    <!-- <div class="col-auto">
                        <label for="search" class="col-form-label"></label>
                    </div> -->
                    <div class="col-auto">
                        <!-- <input type="hidden" name="action" value="searchProducts"> -->
                        <input type="text" id="search" name="search" placeholder="Tên đơn đặt..." class="form-control" width="100%">
                    </div>
                    <div class="col-auto search">
                        <button type="submit" class="btn btn-light btn-outline-secondary">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="addNew btn btn-primary">
            <a class="addOrderLink" href="index.php?ctrl=orderController&action=viewAddOrder">Thêm mới</a>
        </div>

        <table class="table">
            <thead class="bg-dark text-white">
                <tr>
                    <th>                    ID</th>
                    <th style="width: 5%">  ID K.Hàng</th>
                    <th style="width: 15%">                    Tên K.Hàng</th>
                    <th style="width: 10%"> Ngày đặt</th>
                    <th>                    Tổng tiền</th>
                    <th style="width: 25%"> Ghi chú</th>
                    <th>                    Tình trạng</th>
                    <th>                    Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['id_khach_hang']; ?></td>
                        <td><?php echo $order['ten_khach_hang']; ?></td>
                        <td><?php echo $order['ngay']; ?></td>
                        <td><?php echo number_format($order['tong_tien']); ?></td>
                        <td><?php echo $order['ghi_chu']; ?></td>
                        <td>
                            <form action="index.php?ctrl=orderController&action=toggleOrderStatus" method="POST">
                                <input type="hidden" name="orderId" value="<?php echo $order['id']; ?>">
                                <?php
                                $buttonText = '';
                                $buttonClass = '';
                                switch ($order['tinh_trang']) {
                                    case 'Chờ xác nhận':
                                        $buttonText='Xác nhận';
                                        $buttonClass='btn-warning';
                                        break;
                                    case 'Đang xử lý':
                                        $buttonText='Đang xử lý';
                                        $buttonClass='btn-primary';
                                        break;
                                    case 'Đang giao':
                                        $buttonText='Đang giao';
                                        $buttonClass='btn-info';
                                        break;
                                    case 'Thành công':
                                        $buttonText='Thành công';
                                        $buttonClass='btn-success';
                                        break;
                                }
                                
                                ?>
                                <button type="submit" class="btn <?php echo $buttonClass; ?>" 
                                    <?php if ($order['tinh_trang']=='Đang xử lý' || $order['tinh_trang']=='Thành công') echo 'disabled'; ?>>
                                    <?php echo $buttonText; ?>
                                </button>
                            </form>
                        </td>

                        <td>
                            <a class="btn btn-danger deleteOrderLink" href="index.php?ctrl=orderController&action=deleteOrder&id=<?php echo $order['id']; ?>">Xóa</a>
                            <a class="btn btn-warning updateOrderLink" href="index.php?ctrl=orderController&action=updateOrderView&id=<?php echo $order['id']; ?>&tinh_trang=<?php echo $order['tinh_trang']; ?>">Sửa</a>
                            <a class="btn btn-info detailOrderLink" href="index.php?ctrl=orderController&action=viewOrderDetail&id=<?php echo $order['id']; ?>">Chi tiết</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>



</html>