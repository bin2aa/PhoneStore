<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách danh mục sản phẩm</title>


    <style>
        #addCategoryContainer {
            /* display: none; */
            /* Ẩn phần tử mặc định khi tải trang */
            position: fixed;
            /* Đảm bảo phần tử luôn nằm ở cùng một vị trí trên màn hình */
            top: 50%;
            /* Đặt phần tử ở giữa theo chiều dọc */
            left: 50%;
            /* Đặt phần tử ở giữa theo chiều ngang */
            transform: translate(-50%, -50%);
            /* Dịch chuyển phần tử để canh giữa */
            background-color: #ffffff;
            /* Màu nền cho phần tử */
            padding: 20px;
            /* Khoảng cách giữa nội dung và viền của phần tử */
            border: 1px solid #ccc;
            /* Viền cho phần tử */
            border-radius: 5px;
            /* Bo tròn viền */
            z-index: 9999;
            /* Đặt phần tử ở lớp cao nhất để hiển thị trên các phần tử khác */
        }

        #addCategoryContainer .close-btn {
            position: absolute;
            /* Đảm bảo nút đóng luôn nằm ở góc trên bên phải của phần tử */
            top: 5px;
            right: 5px;
            cursor: pointer;
            /* Biến con trỏ thành dấu vết khi di chuyển qua nút */
        }
    </style>

</head>

<body>

    <h2>Danh sách danh mục sản phẩm</h2>

    <div id="addCategoryContainer"></div>

    <a href="index.php?ctrl=categoryController&action=viewAddCategory" id="addCategoryLink">Thêm danh mục</a>
    <a href="index.php?ctrl=categoryController&action=viewAddCategory"></a>
    <table>
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