<?php
// include(__DIR__ . '/../../lib/database.php');

class customerUserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getCustomerByIdNguoiDung()
    {
        $id_nguoi_dung = Session::getSessionValue('login_id'); // Lấy ID người dùng từ session
        $sql = "SELECT * FROM khach_hang WHERE id_nguoi_dung = $id_nguoi_dung";
        $result = $this->db->select($sql);
        return $result;
    }

    public function getCustomerById($id)
    {
        $query = "SELECT * FROM khach_hang WHERE id = $id";

        $result = $this->db->select($query);

        return $result[0];
    }

    public function getOrdersByCustomerId($customerId)
    {
        $sql = "SELECT * FROM don_dat_hang WHERE id_khach_hang = $customerId";
        $result = $this->db->select($sql);
        return $result;
    }

    public function getOrderDetailsByOrderId($id_don_hang)
    {

        $query = "SELECT chi_tiet_don_hang.*,san_pham.ten AS ten_san_pham
              FROM chi_tiet_don_hang
              JOIN san_pham ON chi_tiet_don_hang.id_san_pham = san_pham.id
              where id_don_hang = $id_don_hang";;
        return $this->db->select($query);
    }

    public function deleteOrder($id)
    {
        $query = "DELETE from don_dat_hang where id = $id";
        return $this->db->execute($query);
    }


    public function updateCustomer($id, $ten, $so_dien_thoai, $email, $dia_chi)
    {
        $query = "UPDATE khach_hang SET ten = '$ten', 
    so_dien_thoai = '$so_dien_thoai', 
    email = '$email',
    dia_chi = '$dia_chi'
    WHERE id = '$id'";
        return $this->db->execute($query);
    }

    //phân trang

    //lấy tổng số đơn hàng theo id người dùng
    public function getTotalOrdersByCustomerId($customerId)
    {
        $sql = "SELECT COUNT(*) as total FROM don_dat_hang WHERE id_khach_hang = $customerId";
        $result = $this->db->select($sql);
        return $result[0]['total'];
    }

    //lấy danh sách đơn hàng theo id người dùng
    public function getOrdersByCustomerIdPage($customerId, $limit, $offset)
    {
        $sql = "SELECT * FROM don_dat_hang 
        WHERE id_khach_hang = $customerId 
        Order by id desc
        LIMIT $limit OFFSET $offset";

        $result = $this->db->select($sql);
        return $result;
    }

    public function checkEmailExists($email, $id)
    {
        $query = "SELECT COUNT(*) as count FROM khach_hang WHERE email = '$email' AND id !='$id'";
        $result = $this->db->select($query);
        return $result[0]['count'] > 0;
    }
}
