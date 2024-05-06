<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/css/common.css">
    <!-- Thư viện BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh sách danh mục sản phẩm</title>

</head>

<body>
    <div class="containerr">
        <div class="header-box">
            <div class="header-icon">
                <img src="/admin/img/icon/list2.png" alt="categoryImg">
            </div>
            <h2 class="mt-0 mb-0">DANH MỤC SẢN PHẨM</h2>
        </div>


        <div id="addCategoryContainer"></div>
        <div id="updateCategoryContainer"></div>
        <div id="productsByCategoryViewContainer"></div>
        <div class="overlay"></div>


        <!-- <form action="index.php" method="GET" class="search-form-category">
            <label for="search">Tìm danh mục:</label> -->
            <!-- <input type="hidden" name="ctrl" value="categoryController">  Sài bên ajax rồi nên bỏ đi củng được-->
            <!-- <input type="text" id="search" name="search" placeholder="Nhập tên danh mục cần tìm kiếm">
            <button type="submit">Tìm kiếm</button>
        </form> -->

        <div class="searchHolder">
            <form action="index.php" method="GET" class="search-form-category mt3">
                <div class="row g-3 searchField" style="margin-top: 0px;">
                    <!-- <div class="col-auto">
                        <label for="search" class="col-form-label"></label>
                    </div> -->
                    <div class="col-auto">
                        <input type="hidden" name="ctrl" value="categoryController">
                        <input type="text" id="search" name="search" placeholder="Tên khách hàng..." class="form-control" width="100%">
                    </div>
                    <div class="col-auto search">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="addNew btn btn-primary">
            <a href="index.php?ctrl=categoryController&action=viewAddCategory" class="addCategoryLink">Thêm danh mục</a>
        </div>

        <table class="table">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">ID danh mục</th>
                    <th scope="col">Tên danh mục</th>
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
                            <a class="updateCategoryLink btn btn-primary" href="index.php?ctrl=categoryController&action=updateCategoryView&id=<?php echo $category['id']; ?>">Cập nhật</a>
                            <a class="productsByCategoryViewLink btn btn-success" href="index.php?ctrl=categoryController&action=viewProduct&id=<?php echo $category['id']; ?>">Xem sản phẩm</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>



</body>

</html>
