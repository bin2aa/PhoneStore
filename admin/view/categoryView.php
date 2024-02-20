<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách danh mục sản phẩm</title>
</head>

<body>

    <h2>Danh sách danh mục sản phẩm</h2>

    <a href="index.php?ctrl=categoryController&action=viewAddCategory">Thêm danh mục</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Thao tác</th>
        </tr>

        <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?php echo $category['id']; ?></td>
                <td><?php echo $category['ten']; ?></td>
                <td>
                    <a href="index.php?ctrl=categoryController&action=deleteCategory&id=<?php echo $category['id']; ?>">Xóa</a>
                    <a href="index.php?ctrl=categoryController&action=updateCategoryView&id=<?php echo $category['id']; ?>">Cập nhật</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>
