<?php
include(__DIR__ . '/../model/cartModel.php');
//productModel.php dùng cho addToCart
include(__DIR__ . '/../../admin/model/productModel.php');
include(__DIR__ . '/../../admin/model/discountModel.php');
class CartController
{
    private $cartModel;
    private $productModel;

    private $discountModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->productModel = new ProductModel();
        $this->discountModel = new DiscountModel();
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

                $productInfo = array(
                    'ten' => $product['ten'],
                    'so_luong' => $product['so_luong']
                );
                Session::setSessionValue('product_' . $productId, $productInfo);
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
        //Đếm sản phẩm có trong giỏ hàng không
        $totalProducts = count($cartItems);


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


        // Phiếu giảm giá
        $discountPrograms = $this->discountModel->getAllDiscounts();

        include(__DIR__ . '/../view/cartView.php');
    }



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





                // Kiểm tra và áp dụng giảm giá nếu có
                if (isset($_POST['discount_program']) && !empty($_POST['discount_program'])) {
                    $discountId = $_POST['discount_program'];
                    $discountInfo = $this->discountModel->getDiscountById($discountId);
                    if ($discountInfo) {
                        // Lấy thông tin về phần trăm giảm giá và điều kiện mua
                        $discountPercentage = $discountInfo['phan_tram_giam_gia'];
                        $discountCondition = $discountInfo['dieu_kien_mua'];
                        $discountProgramName = $discountInfo['ten'];
                        $discountAmount = $tong_tien - ($tong_tien * (1 - $discountPercentage / 100));
                        $ghi_chu .= "( Giảm {$discountAmount}đ với chương trình {$discountProgramName}.)";
                        // Kiểm tra điều kiện giảm giá
                        if ($tong_tien >= $discountCondition) {
                            // Nếu đủ điều kiện, tính toán giảm giá
                            $tong_tien = $tong_tien * (1 - $discountPercentage / 100);
                        } else {
                            // Nếu không đủ điều kiện, thông báo cho người dùng
                            http_response_code(400);
                            echo "Tổng tiền đơn hàng chưa đạt điều kiện để áp dụng giảm giá.";
                            exit();
                        }
                    } else {
                        // Nếu không tìm thấy thông tin về chương trình giảm giá, thông báo cho người dùng
                        echo "Không tìm thấy thông tin về chương trình giảm giá.";
                    }
                }



                // Lấy danh sách sản phẩm trong giỏ hàng
                $cartItems = $this->cartModel->getCartItems();
                $flag = true; // Biến cờ để kiểm tra số lượng sản phẩm có đủ không

                foreach ($cartItems as $productId => $quantity) {
                    // Lấy thông tin sản phẩm từ cơ sở dữ liệu
                    // $productInfo = $this->cartModel->getProductInfo($productId);
                    // $availableQuantity = $productInfo['so_luong'];

                    $productInfo = Session::getSessionValue('product_' . $productId);
                    if ($quantity > $productInfo['so_luong']) {
                        // Nếu số lượng sản phẩm trong giỏ hàng vượt quá số lượng có sẵn trong kho
                        $flag = false;
                        http_response_code(401);
                        echo "<script>  alert('{$productInfo['ten']} chỉ còn {$productInfo['so_luong']} vui lòng giảm số lượng sản phẩm ')     </script>";
                        break; // Dừng vòng lặp khi gặp sản phẩm không đủ số lượng
                    }
                }


                // if (count($cartItems) == 0) {
                //     echo "Giỏ hàng của bạn đang trống";
                //     return;
                // }

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
