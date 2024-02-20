<?php
include(__DIR__ . '/../model/productModel.php');

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function showProductList()
    {
        $products = $this->productModel->getAllProducts();
        include __DIR__ . '/../view/productView.php';
    }

    public function showAddProductForm()
    {
        $categorys = $this->productModel->getAllCategorySelect();
        include __DIR__ . '/../view/addProduct.php';
    }

    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['ten'];
            $anh = $_POST['anh'];
            $id_danh_muc = $_POST['id_danh_muc'];
            $gia = $_POST['gia'];
            $so_luong = $_POST['so_luong'];
            $mo_ta = $_POST['mo_ta'];

            $result = $this->productModel->createProduct($ten, $anh, $id_danh_muc, $gia, $so_luong, $mo_ta);

            if ($result) {
                echo "Thêm sản phẩm thành công!";
            } else {
                echo "Thêm sản phẩm không thành công.";
            }
        }
    }

    public function deleteProduct()
    {
        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];
            $result = $this->productModel->deleteProduct($product_id);
        }
    }

    public function showUpdateProductForm()
    {
        if (isset($_GET['id'])) {
            $categorys = $this->productModel->getAllCategorySelect();
            $product_id = $_GET['id'];
            $product = $this->productModel->getProductById($product_id);
            include __DIR__ . '/../view/updateProduct.php';
        }

    }

    public function updateProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = $_POST['product_id'];
            $ten = $_POST['ten'];
            $anh = $_POST['anh'];
            $id_danh_muc = $_POST['id_danh_muc'];
            $gia = $_POST['gia'];
            $so_luong = $_POST['so_luong'];
            $mo_ta = $_POST['mo_ta'];

            $result = $this->productModel->updateProduct($product_id, $ten, $anh, $id_danh_muc, $gia, $so_luong, $mo_ta);

            if ($result) {
                echo "Cập nhật sản phẩm thành công!";
            } else {
                echo "Cập nhật sản phẩm không thành công.";
            }
        }
    }
}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showProductList';
}

$productController = new ProductController();
switch ($action) {
    case 'index':
        $productController->showProductList();
        break;
    case 'viewAddProduct':
        $productController->showAddProductForm();
        break;
    case 'addProduct':
        $productController->addProduct();
        break;
    case 'deleteProduct':
        $productController->deleteProduct();
        break;
    case 'updateProductView':
        $productController->showUpdateProductForm();
        break;
    case 'updateProduct':
        $productController->updateProduct();
        break;
    default:
        $productController->showProductList();
}
