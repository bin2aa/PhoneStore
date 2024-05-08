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
        if ($_SESSION['qlsan_pham'] != 1) {
            exit("Bạn không có quyền truy cập vào trang này!");
        }
        $products = $this->productModel->getAllProducts();
        $categorys = $this->productModel->getAllCategories();


        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            $products = $this->productModel->searchProducts($keyword);
        }

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
            // $anh = $_POST['anh'];
            $id_danh_muc = $_POST['id_danh_muc'];
            $gia = $_POST['gia'];
            // $so_luong = $_POST['so_luong'];
            // Set số lượng mặc định là 0
            $so_luong = 0;
            $mo_ta = $_POST['mo_ta'];
            $anh = $_FILES['anh']['name']; // Tên của tệp ảnh
            $anh_tmp = $_FILES['anh']['tmp_name']; // Đường dẫn tạm thời của tệp ảnh
            move_uploaded_file($anh_tmp, __DIR__ . '../../image/' . $anh); // Di chuyển tệp ảnh vào thư mục lưu trữ

            $result = $this->productModel->createProduct($ten, $anh, $id_danh_muc, $gia, $so_luong, $mo_ta);
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

        //cayyyy hàm nàyyyyyyyyyyyyyyyyyyyy 

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = $_POST['product_id'];
            $ten = $_POST['ten'];
            $anh = $_FILES['anh']['name']; // Tên của tệp ảnh
            $anh_tmp = $_FILES['anh']['tmp_name']; // Đường dẫn tạm thời của tệp ảnh
            move_uploaded_file($anh_tmp, __DIR__ . '../../image/' . $anh); // Di chuyển tệp ảnh vào thư mục lưu trữ
            $id_danh_muc = $_POST['id_danh_muc'];
            $gia = $_POST['gia'];
            $so_luong = $_POST['so_luong'];
            $mo_ta = $_POST['mo_ta'];


            //Nếu ảnh trống thì giữ nguyên ảnh cũ
            if ($anh == '') {
                $product = $this->productModel->getProductById($product_id);
                $anh = $product['anh'];
            }

            $result = $this->productModel->updateProduct($product_id, $ten, $anh, $id_danh_muc, $gia, $so_luong, $mo_ta);
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
