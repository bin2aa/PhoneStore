<?php
// include(__DIR__ . '/../../lib/database.php');

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

    //Note: decrease - giảm bớt
    public function decreaseQuantity($product_id, $quantity)
    {
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (isset($_SESSION['cart'][$product_id])) {
            // Cập nhật số lượng mới sau khi giảm
            $newQuantity = $_SESSION['cart'][$product_id] - abs($quantity);

            // Nếu số lượng mới lớn hơn 0, cập nhật số lượng
            if ($newQuantity > 0) {
                $_SESSION['cart'][$product_id] = $newQuantity;
            } else {
                // Nếu số lượng mới bé hơn hoặc bằng 0, xóa sản phẩm khỏi giỏ hàng
                unset($_SESSION['cart'][$product_id]);
            }
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
        $query = "SELECT gia FROM san_pham WHERE id = $product_id";
        $result = $this->db->select($query);
        if ($result) {
            // Lấy giá sản phẩm từ kết quả truy vấn
            $product_price = $result[0]['gia'];
            return $product_price * 1000;
        } else {
            // Trong trường hợp không có kết quả, có thể xử lý bằng cách trả về một giá trị mặc định hoặc thông báo lỗi
            return 0; // hoặc return null;
        }
    }


    public function getProductInfo($productId) {
        $query = "SELECT * FROM san_pham WHERE id = $productId";
        return $this->db->select($query)[0];
    }

    // public function getProductInfos($productId)
    // {
    //     $query = "SELECT ten, anh, gia FROM san_pham WHERE id = $productId";
    //     $result = $this->db->select($query);

    //     if (!empty($result)) {
    //         return $result[0];
    //     }

    //     return array();
    // }
    public function createOrder($id_khach_hang, $ngay, $tong_tien, $ghi_chu, $tinh_trang)
    {

        $query = "INSERT INTO don_dat_hang(id_khach_hang, ngay, tong_tien, ghi_chu, tinh_trang)
                  VALUES ('$id_khach_hang','$ngay','$tong_tien','$ghi_chu','Chờ xác nhận')";
        $this->db->execute($query);
        return $this->db->getLastInsertId();
    }

    public function createOrderDetail($id_don_hang, $id_san_pham, $so_luong, $gia)
    {
        $query = "INSERT INTO chi_tiet_don_hang(id_don_hang, id_san_pham, so_luong, gia)
                  VALUES ('$id_don_hang','$id_san_pham','$so_luong','$gia')";
        $this->db->execute($query);

        //cập nhật lại số lượng sản phẩm
        $queryUpdate = "UPDATE san_pham SET so_luong = so_luong - $so_luong WHERE id = $id_san_pham";
        $this->db->execute($queryUpdate);

        return true;
    }

    public function createWarrantyUser($id_san_pham, $id_don_hang, $ngay_lap, $ngay_het_han, $tinh_trang, $ghi_chu)
    {
        if (empty($ghi_chu)) {
            $ghi_chu = null;
        }
        $query = "INSERT INTO phieu_bao_hanh(id_san_pham, id_don_hang, ngay_lap, ngay_het_han, tinh_trang, ghi_chu) 
                  VALUES ($id_san_pham, $id_don_hang, '$ngay_lap', '$ngay_het_han', '$tinh_trang', '$ghi_chu')";
        return $this->db->execute($query);
    }

    public function getWarrantyInfoByOrderId($id_don_hang)
    {
        $query = "SELECT * FROM phieu_bao_hanh WHERE id_don_hang = $id_don_hang";
        $result = $this->db->select($query);
        return $result;
    }

    public function getWarrantyInfoById($id)
    {
        $query = "SELECT * FROM phieu_bao_hanh WHERE id = $id";
        $result = $this->db->select($query);
        return $result[0];
    }


    public function updateWarrantyInfo($id, $tinh_trang, $ghi_chu)
    {
        $query = "UPDATE phieu_bao_hanh
              SET tinh_trang = '$tinh_trang',
                  ghi_chu = '$ghi_chu'
              WHERE id = $id";
        return $this->db->execute($query);
    }
}
