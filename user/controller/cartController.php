<?php
include(__DIR__ . '/../model/cartModel.php');

class CartController
{
    private $cartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        // Session::startSession();
    }

    public function addToCart($cart_id, $quantity)
    {
        $this->cartModel->addToCart($cart_id, $quantity);
    }

    public function updateQuantity($cart_id, $quantity)
    {
        $this->cartModel->updateQuantity($cart_id, $quantity);
    }

    public function removeFromCart($cart_id)
    {
        $this->cartModel->removeFromCart($cart_id);
    }

    public function clearCart()
    {
        $this->cartModel->clearCart();
    }

    public function showCart()
    {
        $cartItems = $this->cartModel->getCartItems();
        $totalQuantity = $this->cartModel->getTotalQuantity();
        $totalPrice = $this->cartModel->getTotalPrice();

        $productNames = array();
        $productImages = array();
        $productPrices = array();

        foreach ($cartItems as $productId => $quantity) {
            // Lấy thông tin sản phẩm từ cơ sở dữ liệu hoặc nguồn dữ liệu khác
            $productInfo = $this->cartModel->getProductInfo($productId);
            $productNames[$productId] = $productInfo['ten'];
            $productImages[$productId] = $productInfo['anh'];
            $productPrices[$productId] = $productInfo['gia'];
        }

        include(__DIR__ . '/../view/cartView.php');
    }
}


$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$cartController = new cartController();
switch ($action) {
    case 'index':
        $cartController->showCart();
        break;
    case 'addToCart':
        $cart_id = $_GET['cart_id'];
        // $cart_name = $_GET['ten'];
        $quantity = $_GET['quantity'];
        $cartController->addToCart($cart_id, $quantity);
        $cartController->showCart();
        break;
        // case 'updateQuantity':
        //     $cart_id = $_GET['cart_id'];
        //     $quantity = $_GET['quantity'];
        //     $cartController->updateQuantity($cart_id, $quantity);
        //     $cartController->showCart();
        //     break;
    default:
        $cartController->showCart();
}
