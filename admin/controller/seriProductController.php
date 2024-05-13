<?php
include(__DIR__ . '/../model/seriProductModel.php');
include(__DIR__ . '/../model/productModel.php');

class SeriProductController
{
    private $seriProductModel;
    private $productModel;

    public function __construct()
    {
        $this->seriProductModel = new SeriProductModel();
        $this->productModel = new ProductModel();
    }

    public function showSeriProductList()
    {
        if ($_SESSION['qlsan_pham'] != 1) {
            exit("Bạn không có quyền truy cập vào trang này!");
        }
        $seriProducts = $this->seriProductModel->getAllSeriProducts();
        include __DIR__ . '/../view/seriProductList.php';
    }

    public function showAddSeriProductForm()
    {
        $products = $this->productModel->getAllProducts();
        include __DIR__ . '/../view/addSeriProduct.php';
    }

    public function addSeriProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $seri = $_POST['seri'];
            $id_san_pham = $_POST['id_san_pham'];
            $result = $this->seriProductModel->createSeriProduct($seri, $id_san_pham);
            // Xử lý kết quả thêm mới seri sản phẩm
        }
    }

    public function showUpdateSeriProductForm()
    {
        if (isset($_GET['id'])) {
            $seri_product_id = $_GET['id'];
            $seriProduct = $this->seriProductModel->getSeriProductById($seri_product_id);
            $products = $this->productModel->getAllProducts();
            include __DIR__ . '/../view/updateSeriProduct.php';
        }
    }

    public function updateSeriProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $seri = $_POST['seri'];
            $id_san_pham = $_POST['id_san_pham'];
            $result = $this->seriProductModel->updateSeriProduct($id, $seri, $id_san_pham);
            // Xử lý kết quả cập nhật seri sản phẩm
        }
    }

    public function deleteSeriProduct()
    {
        if (isset($_GET['id'])) {
            $seri_product_id = $_GET['id'];
            $result = $this->seriProductModel->deleteSeriProduct($seri_product_id);
            // Xử lý kết quả xóa seri sản phẩm
        }
    }

    public function getSeriProductById($id)
    {
        return $this->seriProductModel->getSeriProductById($id);
    }
}

// Xử lý action
$action = isset($_GET['action']) ? $_GET['action'] : 'showSeriProductList';
$seriProductController = new SeriProductController();

switch ($action) {
    case 'showSeriProductList':
        $seriProductController->showSeriProductList();
        break;
    case 'showAddSeriProductForm':
        $seriProductController->showAddSeriProductForm();
        break;
    case 'addSeriProduct':
        $seriProductController->addSeriProduct();
        break;
    case 'showUpdateSeriProductForm':
        $seriProductController->showUpdateSeriProductForm();
        break;
    case 'updateSeriProduct':
        $seriProductController->updateSeriProduct();
        break;
    case 'deleteSeriProduct':
        $seriProductController->deleteSeriProduct();
        break;
    case 'getSeriProductById':
        $id = $_GET['id'];
        $seriProductController->getSeriProductById($id);
        break;

    default:
        $seriProductController->showSeriProductList();
}
