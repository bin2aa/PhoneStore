<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm theo danh mục</title>
</head>

<body>
    <div class="productsByCategoryView">
        <h2 class="mt-5 mb-3">Danh sách sản phẩm theo danh mục</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá</th>
                    <!-- Các cột khác bạn muốn hiển thị -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['ten']; ?></td>
                        <td><?php echo $product['gia']; ?></td>
                        <!-- Các cột khác bạn muốn hiển thị -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>