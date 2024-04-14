<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .stat-item {
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
        }

        .stat-item h2 {
            margin-top: 0;
        }

        .monthly-stats {
            margin-top: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Thống kê</h1>
    <div class="stats-container">
        <div class="stat-item">
            <h2>Tổng số sản phẩm</h2>
            <p><?php echo $stats['total_products']; ?></p>
        </div>
        <div class="stat-item">
            <h2>Tổng số danh mục</h2>
            <p><?php echo $stats['total_categories']; ?></p>
        </div>
        <div class="stat-item">
            <h2>Tổng số người dùng</h2>
            <p><?php echo $stats['total_users']; ?></p>
        </div>
        <div class="stat-item">
            <h2>Tổng số đơn hàng</h2>
            <p><?php echo $stats['total_orders']; ?></p>
        </div>
        <div class="stat-item">
            <h2>Tổng doanh thu</h2>
            <p><?php echo $stats['total_revenue']; ?></p>
        </div>
        <div class="stat-item">
            <h2>Tổng số phiếu nhập kho</h2>
            <p><?php echo $stats['total_warehouse_receipts']; ?></p>
        </div>
        <div class="stat-item">
            <h2>Giá trị tổng phiếu nhập kho</h2>
            <p><?php echo $stats['total_warehouse_receipts_value']; ?></p>
        </div>
        <div class="stat-item">
            <h2>Tổng số chi tiết phiếu nhập kho</h2>
            <p><?php echo $stats['total_warehouse_receipt_details']; ?></p>
        </div>
    </div>

    <div class="monthly-stats">
        <h2>Thống kê theo từng tháng</h2>
        <form method="GET" action="index.php?ctrl=statsController&action=showStats">
            <label for="month_year">Chọn tháng/năm:</label>
            <select name="month_year" id="month_year">
                <option value="">Tất cả</option>
                <?php foreach ($statsDate['monthly_stats'] as $monthlyStats) { ?>
                    <option value="<?php echo $monthlyStats['month_year']; ?>"><?php echo $monthlyStats['month_year']; ?></option>
                <?php } ?>
            </select>
            <button type="submit">Xem thống kê</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Tháng/Năm</th>
                    <th>Tổng số đơn hàng</th>
                    <th>Tổng doanh thu</th>
                    <th>Giá trị tổng phiếu nhập kho</th>
                    <th>Tổng số chi tiết phiếu nhập kho</th>
                    <th>Tổng số phiếu nhập kho</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($statsDate['monthly_stats'] as $monthlyStats) { ?>
                    <tr>
                        <td><?php echo $monthlyStats['month_year']; ?></td>
                        <td><?php echo $monthlyStats['total_orders']; ?></td>
                        <td><?php echo $monthlyStats['total_revenue']; ?></td>
                        <td><?php echo $monthlyStats['total_warehouse_receipts_value']; ?></td>
                        <td><?php echo $monthlyStats['total_warehouse_receipt_details']; ?></td>
                        <td><?php echo $monthlyStats['total_warehouse_receipts']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
