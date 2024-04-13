<?php
include(__DIR__ . '/../../admin/model/productModel.php');
include(__DIR__ . '/../../admin/model/commentModel.php');
class ProductControllerUser
{
    private $productModel;
    private $commentModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->commentModel = new CommentModel();
    }

    public function showProductList()
    {
        $products = $this->productModel->getAllProducts();
        $categories = $this->productModel->getAllCategoriesPR();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $products = $this->productModel->getProductByCategory($id);
        }
        include __DIR__ . '/../view/productViewUser.php';
    }

    public function showProductDetail()
    {
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];
            $product = $this->productModel->getProductById($productId);
            $comments = $this->commentModel->getCommentsByProductId($productId);

            if ($product) {
                include __DIR__ . '/../view/product_detail.php';
            } else {
                echo "Product not found.";
            }
        } else {
            echo "Invalid request.";
        }
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
    case 'detail':
        $productController->showProductDetail();
        break;
    default:
        $productController->showProductList();
}
