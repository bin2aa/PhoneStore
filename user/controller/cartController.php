<?php
include(__DIR__ . '/../model/cartModel.php');
//productModel.php dùng cho addToCart
include(__DIR__ . '/../../admin/model/productModel.php');
class CartController
{
    private $cartModel;
    private $productModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->productModel = new ProductModel();
    }

    // public function addToCart($cart_id, $quantity)
    // {
    //     $this->cartModel->addToCart($cart_id, $quantity);
    // }
    public function addToCart()
    {
        if (isset($_GET['cart_id']) && isset($_GET['quantity'])) {
            $productId = $_GET['cart_id'];
            $quantity = $_GET['quantity'];

            // Lấy thông tin sản phẩm từ cơ sở dữ liệu
            $product = $this->productModel->getProductById($productId);

            // Kiểm tra xem số lượng sản phẩm có đủ không
            if ($product['so_luong'] >= $quantity) {
                // Nếu đủ, thêm vào giỏ hàng
                $this->cartModel->addToCart($productId, $quantity);
                echo "Thêm vào giỏ hàng thành công";
            } else {
                // Nếu không đủ, hiển thị thông báo
                echo "Số lượng sản phẩm không đủ. Vui lòng chọn lại.";
            }
        } else {
            echo "Yêu cầu không hợp lệ";
        }
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


    //     public function createOrder()
    //     {
    //         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //             if (isset($_POST['id_khach_hang'], $_POST['tong_tien'], $_POST['ghi_chu'])) {
    //                 $id_khach_hang = $_POST['id_khach_hang'];
    //                 date_default_timezone_set('Asia/Ho_Chi_Minh');
    //                 $ngay = date('Y-m-d H:i:s');
    //                 $tong_tien = $_POST['tong_tien'];
    //                 $ghi_chu = $_POST['ghi_chu'];
    //                 $tinh_trang = 'Chờ xác nhận';

    //                 $id_don_hang = $this->cartModel->createOrder($id_khach_hang, $ngay, $tong_tien, $ghi_chu, $tinh_trang);
    //                 if ($id_don_hang) {
    //                     echo "Tạo đơn hàng thành công";
    //                     $ngay_het_han = date('Y-m-d', strtotime('+3 months', strtotime($ngay)));

    //                     // Lấy danh sách sản phẩm trong giỏ hàng
    //                     $cartItems = $this->cartModel->getCartItems();
    //                     foreach ($cartItems as $productId => $quantity) {
    //                         $productInfo = $this->cartModel->getProductInfo($productId);
    //                         $gia = $productInfo['gia'];
    //                         // Tạo chi tiết đơn hàng với thông tin sản phẩm
    //                         $this->cartModel->createOrderDetail($id_don_hang, $productId, $quantity, $gia);
    //                         $this->cartModel->createWarrantyUser($productId, $id_don_hang, $ngay, $ngay_het_han, 'Đang bảo hành', '');
    //                     }

    //                     // Xóa giỏ hàng sau khi đã tạo đơn hàng
    //                     $this->cartModel->clearCart();
    //                 }
    //             }
    //         } else {
    //             echo "Yêu cầu không hợp lệ";
    //         }
    //     }
    // }


    public function createOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id_khach_hang'], $_POST['tong_tien'], $_POST['ghi_chu'])) {
                $id_khach_hang = $_POST['id_khach_hang'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngay = date('Y-m-d H:i:s');
                $tong_tien = $_POST['tong_tien'];
                $ghi_chu = $_POST['ghi_chu'];
                $tinh_trang = 'Chờ xác nhận';

                // Lấy danh sách sản phẩm trong giỏ hàng
                $cartItems = $this->cartModel->getCartItems();
                $flag = true; // Biến cờ để kiểm tra số lượng sản phẩm có đủ không

                foreach ($cartItems as $productId => $quantity) {
                    // Lấy thông tin sản phẩm từ cơ sở dữ liệu
                    $productInfo = $this->cartModel->getProductInfo($productId);
                    $availableQuantity = $productInfo['so_luong'];
                    if ($quantity > $availableQuantity) {
                        // Nếu số lượng sản phẩm trong giỏ hàng vượt quá số lượng có sẵn trong kho
                        $flag = false;
                        echo "Sản phẩm '{$productInfo['ten']}' chỉ còn {$availableQuantity} sản phẩm trong kho. Vui lòng giảm số lượng hoặc chọn sản phẩm khác.";
                        break; // Dừng vòng lặp khi gặp sản phẩm không đủ số lượng
                    }
                }

                if ($flag) {
                    // Tiến hành tạo đơn hàng và chi tiết đơn hàng
                    $id_don_hang = $this->cartModel->createOrder($id_khach_hang, $ngay, $tong_tien, $ghi_chu, $tinh_trang);
                    if ($id_don_hang) {
                        echo "Tạo đơn hàng thành công";
                        $ngay_het_han = date('Y-m-d', strtotime('+3 months', strtotime($ngay)));

                        foreach ($cartItems as $productId => $quantity) {
                            $productInfo = $this->cartModel->getProductInfo($productId);
                            $gia = $productInfo['gia'];
                            // Tạo chi tiết đơn hàng với thông tin sản phẩm
                            $this->cartModel->createOrderDetail($id_don_hang, $productId, $quantity, $gia);
                            $this->cartModel->createWarrantyUser($productId, $id_don_hang, $ngay, $ngay_het_han, 'Đang bảo hành', '');
                            // Cập nhật số lượng sản phẩm trong kho
                        }
                        // Xóa giỏ hàng sau khi đã tạo đơn hàng
                        $this->cartModel->clearCart();
                    }
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
