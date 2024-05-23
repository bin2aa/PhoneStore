<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/css/common.css">
    <link rel="stylesheet" href="/admin/css/stat.css">
    <!-- Thư viện BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Thống kê</title>
</head>

<body>
    <div class="containerr">
        <div class="header-box">
            <div class="header-icon">
                <img src="/admin/img/icon/growth.png" alt="statImg">
            </div>
            <h2 class="mt-0 mb-0">THỐNG KÊ</h2>
        </div>

        <div id="chart-container">
            <canvas id="myBarChart"></canvas>
            <canvas id="myBarChart2"></canvas>
        </div>
        <button id="toggleChartTypeBtn">Chuyển đổi loại biểu đồ</button>
    </div>
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
            <p><?php echo number_format($stats['total_revenue']); ?></p>
        </div>
        <div class="stat-item">
            <h2>Tổng số phiếu nhập kho</h2>
            <p><?php echo $stats['total_warehouse_receipts']; ?></p>
        </div>
        <div class="stat-item">
            <h2>Giá trị tổng phiếu nhập kho</h2>
            <p><?php echo number_format ($stats['total_warehouse_receipts_value']); ?></p>
        </div>
        <div class="stat-item">
            <h2>Tổng số chi tiết phiếu nhập kho</h2>
            <p><?php echo $stats['total_warehouse_receipt_details']; ?></p>
        </div>
    </div>

    <div class="monthly-stats containerr">
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
                        <td><?php echo number_format($monthlyStats['total_revenue']); ?></td>
                        <td><?php echo number_format($monthlyStats['total_warehouse_receipts_value']); ?></td>
                        <td><?php echo $monthlyStats['total_warehouse_receipt_details']; ?></td>
                        <td><?php echo $monthlyStats['total_warehouse_receipts']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Thư viện biểu đồ chart.js (bar, 3line, pie, radar, scatter, doughnut, polarArea) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom"></script>
    <script>
        //hàm sắp xếp mảng theo tháng
        var monthlyStats = <?php echo json_encode($statsDate['monthly_stats']); ?>;
        monthlyStats.sort((a, b) => {
            return new Date(a.month_year) - new Date(b.month_year);
        });

        var ctx = document.getElementById('myBarChart').getContext('2d');
        var currentChartType = 'bar'; // Loại biểu đồ hiện tại
        var myBarChart = new Chart(ctx, {
            type: currentChartType, // Loại biểu đồ ban đầu
            data: {
                labels: monthlyStats.map(item => item.month_year),
                datasets: [{
                        label: 'Tổng số đơn hàng',
                        data: <?php echo json_encode(array_column($statsDate['monthly_stats'], 'total_orders')); ?>,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
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
                scales: {
                    x: {
                        ticks: {
                            maxRotation: 0, // Không cho phép xoay nhãn
                            maxTicksLimit: 6 // Giới hạn số lượng nhãn tối đa là 6
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Thống kê theo từng tháng'
                    },
                    zoom: {
                        pan: {
                            enabled: true, // Cho phép kéo qua kéo lại trên trục x
                            mode: 'x' // Chỉ kéo qua kéo lại trên trục x
                        },
                        zoom: {
                            wheel: {
                                enabled: true // Cho phép phóng to / thu nhỏ bằng cách cuộn chuột
                            },
                            // pinch: {
                            //     enabled: true // Cho phép phóng to / thu nhỏ bằng cách chạm và kéo trên thiết bị cảm ứng
                            // },
                            mode: 'x' // Chỉ phóng to / thu nhỏ trên trục x
                        }
                    }
                }
            }
        });

        // -----------------------------------------------------------------------------------------------

        var ctx = document.getElementById('myBarChart2').getContext('2d');
        var currentChartType = 'bar'; // Loại biểu đồ hiện tại
        var myBarChart2 = new Chart(ctx, {
            type: currentChartType, // Loại biểu đồ ban đầu
            data: {
                labels: monthlyStats.map(item => item.month_year),
                datasets: [{
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
                    }
                ]
            },
            options: {
                scales: {
                    x: {
                        ticks: {
                            maxRotation: 0, // Không cho phép xoay nhãn
                            maxTicksLimit: 6 // Giới hạn số lượng nhãn tối đa là 6
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Thống kê theo từng tháng'
                    },
                    zoom: {
                        pan: {
                            enabled: true, // Cho phép kéo qua kéo lại trên trục x
                            mode: 'x' // Chỉ kéo qua kéo lại trên trục x
                        },
                        zoom: {
                            wheel: {
                                enabled: true // Cho phép phóng to / thu nhỏ bằng cách cuộn chuột
                            },
                            // pinch: {
                            //     enabled: true // Cho phép phóng to / thu nhỏ bằng cách chạm và kéo trên thiết bị cảm ứng
                            // },
                            mode: 'x' // Chỉ phóng to / thu nhỏ trên trục x
                        }
                    }
                }
            }
        });

        // Bắt sự kiện click trên nút chuyển đổi
        document.getElementById('toggleChartTypeBtn').addEventListener('click', function() {
            // Chuyển đổi loại biểu đồ
            if (currentChartType === 'bar') {
                currentChartType = 'line';
            } else {
                currentChartType = 'bar';
            }

            // Cập nhật loại biểu đồ
            myBarChart.config.type = currentChartType;
            myBarChart2.config.type = currentChartType;

            // Vẽ lại biểu đồ
            myBarChart.update();
            myBarChart2.update();
        });
    </script>


</body>

</html>