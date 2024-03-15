<?php
include(__DIR__ . '/../../lib/database.php');

class CartModel
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($product_id, $quantity)
    {
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (isset($_SESSION['cart'][$product_id])) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng
            $_SESSION['cart'][$product_id] += $quantity;
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
            $_SESSION['cart'][$product_id] = $quantity;
        }
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function updateQuantity($product_id, $quantity)
    {
        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if (isset($_SESSION['cart'][$product_id])) {
            // Cập nhật số lượng sản phẩm
            $_SESSION['cart'][$product_id] = $quantity;
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($product_id)
    {
        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if (isset($_SESSION['cart'][$product_id])) {
            // Xóa sản phẩm khỏi giỏ hàng
            unset($_SESSION['cart'][$product_id]);
        }
    }

    // Xóa toàn bộ giỏ hàng
    public function clearCart()
    {
        // Xóa toàn bộ sản phẩm khỏi giỏ hàng
        $_SESSION['cart'] = array();
    }

    // Lấy danh sách sản phẩm trong giỏ hàng
    public function getCartItems()
    {
        // Trả về danh sách sản phẩm trong giỏ hàng
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    }

    // Tính tổng số lượng sản phẩm trong giỏ hàng
    public function getTotalQuantity()
    {
        // Tính tổng số lượng sản phẩm trong giỏ hàng
        return array_sum($this->getCartItems());
    }

    // Tính tổng tiền của giỏ hàng
    public function getTotalPrice()
    {
        $total_price = 0;
        // Lặp qua từng sản phẩm trong giỏ hàng và tính tổng tiền
        foreach ($this->getCartItems() as $product_id => $quantity) {
            // Thực hiện truy vấn cơ sở dữ liệu hoặc lấy giá từ nguồn dữ liệu khác
            // Trong trường hợp này, giả sử giá sản phẩm được cố định
            $product_price = $this->getProductPrice($product_id); // Thay thế hàm này bằng cách lấy giá từ cơ sở dữ liệu
            $total_price += $product_price * $quantity; // Tính tổng tiền
        }
        return $total_price; // Trả về tổng tiền của giỏ hàng
    }

    // Lấy giá của sản phẩm từ cơ sở dữ liệu (cần thay đổi bằng cách truy vấn cơ sở dữ liệu thực tế)
    private function getProductPrice($product_id)
    {
        // Thực hiện truy vấn cơ sở dữ liệu để lấy giá của sản phẩm dựa trên ID sản phẩm
        // Trong trường hợp này, giả sử giá sản phẩm được cố định, bạn cần thay thế bằng cách thực hiện truy vấn cơ sở dữ liệu thực tế
        // Trả về giá của sản phẩm
        return 10000; // Giá sản phẩm cố định
    }

    public function getProductInfo($productId)
    {
        // Thực hiện truy vấn cơ sở dữ liệu hoặc lấy thông tin từ nguồn dữ liệu khác
        // Ví dụ:
        $query = "SELECT ten, anh, gia FROM san_pham WHERE id = $productId";
        $result = $this->db->select($query);

        if (!empty($result)) {
            return $result[0];
        }

        return array();
    }
}
