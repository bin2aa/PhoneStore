<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/css/common.css">
    <link rel="stylesheet" href="/admin/css/product.css">
    <!-- Thư viện BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh sách sản phẩm</title>
</head>

<body>
    <div class="containerr">
        <div class="header-box">
            <div class="header-icon">
                <img src="/admin/img/icon/product.png" alt="productImg">
            </div>
            <h2 class="mt-0 mb-0">DANH SÁCH SẢN PHẨM</h2>
        </div>

        <div id="addProductContainer"></div>
        <div id="updateProductContainer"></div>
        <div class="overlay"></div>

        <!-- <form class="search-form-product">
            <label for="search">Tìm kiếm sản phẩm:</label>
            <input type="text" id="search" name="search" placeholder="Nhập tên sản phẩm cần tìm kiếm">
            <button type="submit">Tìm kiếm</button>
        </form> -->
        <div class="searchHolder">
            <form class="search-form-product mt-3">
                <div class="row g-3 searchField">
                    <div class="col-auto">
                        <input type="hidden" name="action" value="searchProducts">
                        <input type="text" id="search" name="search" placeholder="Tên sản phẩm..." class="form-control" width="100%">
                    </div>
                    <div class="col-auto search">
                        <button type="submit" class="btn btn-light btn-outline-secondary">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="addNew btn btn-primary">
            <a class="addProductLink" href="index.php?ctrl=productController&action=viewAddProduct">Thêm sản phẩm</a>
        </div>
        <table class="table">
            <div class="product-list">
                <?php foreach ($products as $product) : ?>
                    <tr class="product-item">
                        <td class="product-img">
                            <img src="/image/SanPham/<?php echo $product['anh']; ?>" alt="Hình ảnh sản phẩm" width="200">
                        </td>
                        <td class="product-info">
                            <div class="product-name fs-3 fw-3"><?php echo $product['ten']; ?></div>
                            <div>ID sản phẩm: <?php echo $product['id']; ?></div>
                            <div>ID danh mục sản phẩm: <?php echo $product['id_danh_muc']; ?></div>
                            <div>Giá: <?php echo number_format($product['gia']); ?> VNĐ</div>
                            <div>Số lượng: <?php echo $product['so_luong']; ?></div>
                            <div>Mô tả: <?php echo $product['mo_ta']; ?></div>
                            <div class="d-grid gap-2 d-md-block">
                                <a class="deleteProductLink btn btn-danger" href="index.php?ctrl=productController&action=deleteProduct&id=<?php echo $product['id']; ?>">Xóa</a>
                                <a class="updateProductLink btn btn-warning" href="index.php?ctrl=productController&action=updateProductView&id=<?php echo $product['id']; ?>&id_danh_muc=<?php echo $product['id_danh_muc']; ?>">Cập nhật</a>
                            </div>
                        </td>
                        <td class="product-bg">
                            <img src="/image/SanPham/<?php echo $product['anh']; ?>" alt="Hình ảnh sản phẩm" width="200">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </div>
        </table>
    </div>
</body>

</html>