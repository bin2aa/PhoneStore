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

        //Sắp xếp sản phẩm theo giá tăng dần hoặc giảm dần
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'sortProductsByPriceAsc') {
                $products = $this->productModel->sortProductsByPriceAsc();
            } elseif ($_GET['action'] == 'sortProductsByPriceDesc') {
                $products = $this->productModel->sortProductsByPriceDesc();
            }
        }

        //Lọc theo danh mục
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $products = $this->productModel->getProductByCategory($id);
        }


        //Locc theo giá từ n đến m
        if (isset($_GET['price_min']) && isset($_GET['price_max'])) {
            $price_min = $_GET['price_min'] ? $_GET['price_min'] : 1;
            $price_max = $_GET['price_max'] ? $_GET['price_max'] : 1000;
            $products = $this->productModel->sortProductsByPriceRange($price_min, $price_max);
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
