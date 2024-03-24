<?php
include(__DIR__ . '/../../lib/database.php');

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
        $query = "SELECT * FROM chi_tiet_don_hang WHERE id_don_hang = $id_don_hang";
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
}
