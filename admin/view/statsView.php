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

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    #toggleChartTypeBtn {
        display: block;
        margin: 20px auto;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
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


    <div id="chart-container">
        <canvas id="myBarChart"></canvas>
    </div>
    <button id="toggleChartTypeBtn">Chuyển đổi loại biểu đồ</button>

    <!-- Thư viện biểu đồ chart.js (bar, line, pie, radar, scatter, doughnut, polarArea) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    var ctx = document.getElementById('myBarChart').getContext('2d');
    var currentChartType = 'bar'; // Loại biểu đồ hiện tại
    var myBarChart = new Chart(ctx, {
        type: currentChartType, // Loại biểu đồ ban đầu
        data: {
            labels: <?php echo json_encode(array_column($statsDate['monthly_stats'], 'month_year')); ?>,
            datasets: [{
                    label: 'Tổng số đơn hàng',
                    data: <?php echo json_encode(array_column($statsDate['monthly_stats'], 'total_orders')); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Tổng doanh thu',
                    data: <?php echo json_encode(array_column($statsDate['monthly_stats'], 'total_revenue')); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Giá trị tổng phiếu nhập kho',
                    data: <?php echo json_encode(array_column($statsDate['monthly_stats'], 'total_warehouse_receipts_value')); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Tổng số chi tiết phiếu nhập kho',
                    data: <?php echo json_encode(array_column($statsDate['monthly_stats'], 'total_warehouse_receipt_details')); ?>,
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Tổng số phiếu nhập kho',
                    data: <?php echo json_encode(array_column($statsDate['monthly_stats'], 'total_warehouse_receipts')); ?>,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            // scales: {
            //     y: {
            //         beginAtZero: true
            //     }
            // },
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Thống kê theo từng tháng'
                }
            }
        }
    });


    // Bắt sự kiện click trên nút chuyển đổi
    document.getElementById('toggleChartTypeBtn').addEventListener('click', function() {
        // Chuyển đổi loại biểu đồ

        if (currentChartType === 'bar') {
            currentChartType = 'doughnut';
        } else {
            currentChartType = 'bar';
        }

        // Cập nhật loại biểu đồ
        myBarChart.config.type = currentChartType;
        // Vẽ lại biểu đồ
        myBarChart.update();
    });
    </script>


</body>

</html>