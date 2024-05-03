<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật danh mục sản phẩm</title>
</head>

<body>

    <div class="updateCategory">

        <h2>Cập nhật danh mục sản phẩm</h2>

        <form class="categorySubmitUd" action="index.php?ctrl=categoryController&action=updateCategory" method="post">

            <input type="hidden" name="category_id" value="<?php echo $category['id']; ?>">

            <label for="ten">Tên danh mục:</label>
            <input type="text" name="ten" value="<?php echo $category['ten']; ?>" required><br><br>

            <button type="submit">Cập nhật danh mục</button>
        </form>
    </div>
</body>

</html>