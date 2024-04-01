<?php
include(__DIR__ . '/../model/cartModel.php');

class CartController
{
    private $cartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
    }

    public function addToCart($cart_id, $quantity)
    {
        $this->cartModel->addToCart($cart_id, $quantity);
    }

    //decrease: giảm bớt
    public function decreaseQuantity($cart_id, $quantity)
    {
        $this->cartModel->decreaseQuantity($cart_id, $quantity);
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


    public function createOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id_khach_hang'], $_POST['tong_tien'], $_POST['ghi_chu'])) {
                $id_khach_hang = $_POST['id_khach_hang'];
                $ngay = date('Y-m-d H:i:s');
                $tong_tien = $_POST['tong_tien'];
                $ghi_chu = $_POST['ghi_chu'];
                $tinh_trang = 'Chờ xác nhận';

                $id_don_hang = $this->cartModel->createOrder($id_khach_hang, $ngay, $tong_tien, $ghi_chu, $tinh_trang);
                if ($id_don_hang) {
                    echo "Tạo đơn hàng thành công";
                    // Lấy danh sách sản phẩm trong giỏ hàng
                    $cartItems = $this->cartModel->getCartItems();
                    foreach ($cartItems as $productId => $quantity) {
                        $productInfo = $this->cartModel->getProductInfo($productId);
                        $gia = $productInfo['gia'];
                        // Tạo chi tiết đơn hàng với thông tin sản phẩm
                        $this->cartModel->createOrderDetail($id_don_hang, $productId, $quantity, $gia);
                    }

                    // Xóa giỏ hàng sau khi đã tạo đơn hàng
                    $this->cartModel->clearCart();
                }
            }
        } else {
            echo "Yêu cầu không hợp lệ";
        }
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
    case 'decreaseQuantity':
        $cart_id = $_GET['cart_id'];
        $quantity = $_GET['quantity'];
        $cartController->decreaseQuantity($cart_id, $quantity);
        $cartController->showCart();
        break;

        // case 'updateQuantity':
        //     $cart_id = $_GET['cart_id'];
        //     $quantity = $_GET['quantity'];
        //     $cartController->updateQuantity($cart_id, $quantity);
        //     $cartController->showCart();
        //     break;
    case 'removeFromCart':
        $cart_id = $_GET['cart_id'];
        $cartController->removeFromCart($cart_id);
        $cartController->showCart();
        break;
    case 'clearCart':
        $cartController->clearCart();
        $cartController->showCart();
        break;
    case 'createOrder':
        $cartController->createOrder();
        break;
    default:
        $cartController->showCart();
}
