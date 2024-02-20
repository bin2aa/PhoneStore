<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>

<body>

    <h2>Danh sách sản phẩm</h2>

    <a href="index.php?ctrl=productController&action=viewAddProduct">Thêm sản phẩm</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Hình ảnh</th>
            <th>ID Danh mục</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Mô tả</th>
            <th>Thao tác</th>
        </tr>

        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['ten']; ?></td>
                <td>
                    <img src="/image/<?php echo $product['anh']; ?>" alt="Hình ảnh sản phẩm" width="200"><br>
                    <input type="hidden" name="anh" value="<?php echo $product['anh']; ?>">
                </td>
                <td><?php echo $product['id_danh_muc']; ?></td>
                <td><?php echo $product['gia']; ?></td>
                <td><?php echo $product['so_luong']; ?></td>
                <td><?php echo $product['mo_ta']; ?></td>
                <td>
                    <a href="index.php?ctrl=productController&action=deleteProduct&id=<?php echo $product['id']; ?>">Xóa</a>
                    <a href="index.php?ctrl=productController&action=updateProductView&id=<?php echo $product['id']; ?>">Cập nhật</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>