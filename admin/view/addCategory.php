<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục sản phẩm</title>
</head>

<body>
    <div class="addCategory">
        <h2>Thêm danh mục sản phẩm</h2>
        <form action="index.php?ctrl=categoryController&action=addCategory" method="post">
            <label for="ten">Tên danh mục:</label>
            <input type="text" name="ten" required><br>
            <button type="submit">Thêm danh mục</button>
        </form>
    </div>
</body>

</html>