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
        $maxPrice = $this->productModel->getProductsPriceMax();

        // Lọc theo danh mục
        if (isset($_GET['filter']) && $_GET['filter'] == 'category' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $products = $this->productModel->getProductByCategory($id);
        }
        // Lọc theo giá từ n đến m
        elseif (isset($_GET['price_min']) && isset($_GET['price_max'])) {
            $price_min = $_GET['price_min'];
            $price_max = $_GET['price_max'];
            $products = $this->productModel->sortProductsByPriceRange($price_min, $price_max);
        }
        // --- Tìm kiếm sản phẩm ---
        elseif (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            $products = $this->productModel->searchProducts($keyword);
        }
        // Sắp xếp sản phẩm theo giá
        elseif (isset($_GET['action'])) {
            if ($_GET['action'] == 'sortProductsByPriceAsc') {
                $products = $this->productModel->sortProductsByPriceAsc();
            } elseif ($_GET['action'] == 'sortProductsByPriceDesc') {
                $products = $this->productModel->sortProductsByPriceDesc();
            } elseif ($_GET['action'] == 'topSelling') {
                $products = $this->productModel->getTopSellingProducts();
            }
        }


        else {
            $products = $this->productModel->getAllProducts();
        }


        //---------------------------Phân trang-----------------------------
        $item_per_page = 8; //Số lượng sản phẩm hiển thị trên mỗi trang
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại

        //lấy tổng số sản phẩm
        $total_products = count($products);

        //Tính offset (vị trí bắt đầu của mỗi trang)
        $offset = ($current_page - 1) * $item_per_page;
        $products = array_slice($products, $offset, $item_per_page);



        include __DIR__ . '/../view/productViewUser.php';
    }

    public function showProductDetail()
    {
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];
            $product = $this->productModel->getProductById($productId);

            // Sản phẩm liên quan
            $suggestedProducts = $this->productModel->getSuggestedProducts($productId);

            // Số lượng bình luận hiển thị trên mỗi trang
            $item_per_page = 5;
            // Tính trang hiện tại
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

            // Lấy tổng số bình luận
            $total_comments = $this->commentModel->getCommentCountByProductId($product['id']);

            // Tính offset (vị trí bắt đầu của mỗi trang)
            $offset = ($current_page - 1) * $item_per_page;
            $comments = $this->commentModel->getCommentsByProductId($productId, $item_per_page, $offset);

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
