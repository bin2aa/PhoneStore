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

<style>
    .filter-and-refresh {
        display: flex;
        justify-content: space-between;
    }

    .filter-and-refresh .filterOrder,
    .filter-and-refresh{
        flex: 1;
        margin: 0 10px;
    }

    .search-container{
        display: flex;
        border: 1px solid rgb(200,200,200);
        border-radius: 5px;
        justify-content: center;
        align-items: center;
        margin-block: 10px;
        padding: 10px;
        width: 100%;
    }
    .search-container input[type="date"]{
        padding: 5px;
        border: 1px solid rgb(200,200,200);
        border-radius: 5px;
        margin: 0 10px;
    }
    .search-container form{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .refresh{
        margin-right: 20%;
    }
</style>

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
                    <div class="col-auto">
                        <label for="search" class="col-form-label">Tình trạng:</label>
                        <select id="search" name="search">
                            <option value="">Tất cả</option>
                            <option value="Chờ xác nhận">Xác nhận</option>
                            <option value="Đang xử lý">Đang xử lý</option>
                            <option value="Đang giao">Hoàn tất</option>
                            <option value="Thành công">Thành công</option>
                        </select>
                        <button type="submit" class="btn btn-light btn-outline-secondary">Lọc</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="filter-and-refresh search-container">
            <form class="filterOrder" method="GET" action="index.php">
                <input type="hidden" name="ctrl" value="orderController">
                <input type="hidden" name="action" value="filterOrder">
                Từ ngày: <input type="date" name="from_date" required>
                Đến ngày: <input type="date" name="to_date" required>
                <input type="submit" value="Lọc" class="btn btn-primary">
            </form>
            <!-- refresh -->
            <div class="refresh">
                <a href="index.php?ctrl=orderController" class="btn btn-light btn-outline-secondary">Làm mới</a>
            </div>
        </div>

        <!-- sắp xếp tổng tiền tăng giảm dần -->
        <div class="sort_total_in_orderView">
            <form class="sortOrder" method="GET" action="index.php">
                <input type="hidden" name="ctrl" value="orderController">
                <select name="action">
                    <option value="">Mặc định</option>
                    <option value="sortOrderAsc">Tăng dần</option>
                    <option value="sortOrderDesc">Giảm dần</option>
                </select>
                <input type="submit" value="Sắp xếp">
            </form>

            <div class="addNew btn btn-primary">
                <a class="addOrderLink" href="index.php?ctrl=orderController&action=viewAddOrder">Thêm mới</a>
            </div>

            <table class="table">
                <thead class="bg-dark text-white">
                    <tr>
<<<<<<< HEAD
                        <th> ID</th>
                        <th style="width: 5%"> ID K.Hàng</th>
                        <th style="width: 15%"> Tên K.Hàng</th>
                        <th style="width: 10%"> Ngày đặt</th>
                        <th> Tổng tiền</th>
                        <th style="width: 25%"> Ghi chú</th>
                        <th> Tình trạng</th>
                        <th> Thao tác</th>
=======
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['id_khach_hang']; ?></td>
                        <td><?php echo $order['ten_khach_hang']; ?></td>
                        <td><?php echo $order['ngay']; ?></td>
                        <td><?php echo number_format($order['tong_tien']); ?></td>
                        <td><?php echo $order['ghi_chu']; ?></td>
                        <td>
                            <form class="toggleUserStatuss" action="index.php?ctrl=orderController&action=toggleOrderStatus" method="POST">
                                <input type="hidden" name="orderId" value="<?php echo $order['id']; ?>">

                                <?php if ($order['tinh_trang'] == 'Chờ xác nhận') echo "<button type='submit' class='btn btn-primary'>Xác nhận</button>";
                                else if ($order['tinh_trang'] == 'Đang xử lý') echo "<button type='submit' class='btn btn-warning'>Đang xử lý</button>";
                                else if ($order['tinh_trang'] == 'Đang giao') echo "<button type='submit' class='btn btn-secondary'>Hoàn tất</button>";
                                else if ($order['tinh_trang'] == 'Thành công') echo "<button type='submit' disabled class='btn btn-success'>Thành công</button>";
                                ?>
                            </form>
                        </td>

                        <td>
                            <a class="btn btn-danger deleteOrderLink" href="index.php?ctrl=orderController&action=deleteOrder&id=<?php echo $order['id']; ?>">Xóa</a>
                            <a class="btn btn-warning updateOrderLink" href="index.php?ctrl=orderController&action=updateOrderView&id=<?php echo $order['id']; ?>&tinh_trang=<?php echo $order['tinh_trang']; ?>">Sửa</a>
                            <a class="btn btn-info detailOrderLink" href="index.php?ctrl=orderController&action=viewOrderDetail&id=<?php echo $order['id']; ?>">Chi tiết</a>
                        </td>

>>>>>>> 3453498e711916c247103c5e8e14941dc3f0e331
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
                                <form class="toggleUserStatuss" action="index.php?ctrl=orderController&action=toggleOrderStatus" method="POST">
                                    <input type="hidden" name="orderId" value="<?php echo $order['id']; ?>">

                                    <?php if ($order['tinh_trang'] == 'Chờ xác nhận') echo "<button type='submit'>Xác nhận</button>";
                                    else if ($order['tinh_trang'] == 'Đang xử lý') echo "<button type='submit'>Đang xử lý</button>";
                                    else if ($order['tinh_trang'] == 'Đang giao') echo "<button type='submit'>Hoàn tất</button>";
                                    else if ($order['tinh_trang'] == 'Thành công') echo "<button type='submit' disabled>Thành công</button>";
                                    ?>
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

<script>
    $(document).ready(function() {
        $(document).on('submit', '.toggleUserStatuss', function(e) {
            e.preventDefault();

            var actionUrl = $(this).attr('action');
            var formData = $(this).serialize();

            $.ajax({
                url: actionUrl,
                type: 'POST',
                data: formData,
                success: function(response) {
                    location.reload();
                }
            });
        });


        $(document).on('submit', 'form.sortOrder', function(event) {
            event.preventDefault();

            var action = $(this).find('select[name="action"]').val();

            $.ajax({
                url: "index.php?ctrl=orderController&action=" + action,
                type: 'GET',
                success: function(data) {
                    console.log(this.url);
                    $('table').html($(data).find('table').html());
                },
                error: function() {
                    // console.log(url);
                    aler('Lỗi productView.php xóa ajax mà test')
                }
            });
        });
    });
</script>