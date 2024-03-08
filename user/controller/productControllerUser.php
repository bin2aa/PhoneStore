<?php
include(__DIR__ . '/../../admin/model/productModel.php');

class ProductControllerUser
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function showProductList()
    {
        $products = $this->productModel->getAllProducts();
        include __DIR__ . '/../view/productViewUser.php';
    }
}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$productController = new ProductControllerUser();
switch ($action) {
    case 'index':
        $productController->showProductList();
        break;
    default:
        $productController->showProductList();
}
