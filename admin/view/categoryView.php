<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách danh mục sản phẩm</title>

</head>

<body>


    <div class="container">
        <h2 class="mt-5 mb-3">Danh sách danh mục sản phẩm</h2>


        <div id="addCategoryContainer"></div>
        <div id="updateCategoryContainer"></div>
        <div class="overlay"></div>


        <form action="index.php" method="GET" class="search-form-category">
            <label for="search">Tìm danh mục:</label>
            <!-- <input type="hidden" name="ctrl" value="categoryController">  Sài bên ajax rồi nên bỏ đi củng được-->
            <input type="text" id="search" name="search" placeholder="Nhập tên danh mục cần tìm kiếm">
            <button type="submit">Tìm kiếm</button>
        </form>

        <a href="index.php?ctrl=categoryController&action=viewAddCategory" class="btn btn-primary mb-3 addCategoryLink">Thêm danh mục</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td><?php echo $category['id']; ?></td>
                        <td><?php echo $category['ten']; ?></td>
                        <td>
                            <a class="deleteCategoryLink btn btn-danger" href="index.php?ctrl=categoryController&action=deleteCategory&id=<?php echo $category['id']; ?>">Xóa</a>
                            <a class="addCategoryLink btn btn-primary" href="index.php?ctrl=categoryController&action=updateCategoryView&id=<?php echo $category['id']; ?>">Cập nhật</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>



</body>

</html>