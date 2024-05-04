<?php
// include(__DIR__ . '/../../lib/database.php');

class CustomerModel
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

    public function getAllCustomers()
    {
        $query = "SELECT * FROM khach_hang";
        return $this->db->select($query);
    }

    public function getCustomerById($id)
    {
        $query = "SELECT * FROM khach_hang WHERE id = $id";

        $result = $this->db->select($query);

        return $result[0];
    }

    // DÙng password_hard để bảo mật hơn
    public function createCustomer($ten, $so_dien_thoai, $email, $dia_chi, $id_nguoi_dung)
    {
        // $hashed_password = password_hash($mat_khau, PASSWORD_DEFAULT);
        $query = "INSERT INTO khach_hang (ten, so_dien_thoai, email, dia_chi, id_nguoi_dung) 
        VALUE ('$ten','$so_dien_thoai','$email','$dia_chi','$id_nguoi_dung')";
        return $this->db->execute($query);
    }

    public function deleteCustomer($id)
    {
        $query = "DELETE from khach_hang where id = $id";
        return $this->db->execute($query);
    }

    public function updateCustomer($id, $ten, $so_dien_thoai, $email, $dia_chi, $id_nguoi_dung)
    {
        $query = "UPDATE khach_hang SET ten = '$ten', 
        so_dien_thoai = '$so_dien_thoai', 
        email = '$email',
        dia_chi = '$dia_chi',
        id_nguoi_dung = '$id_nguoi_dung'
        WHERE id = $id";
        return $this->db->execute($query);
    }


    public function getAllUserSelect()
    {
        $query = "SELECT * FROM nguoi_dung";
        return $this->db->select($query);
    }

    public function searchCustomer($keyword)
    {
        $query = "SELECT * FROM khach_hang WHERE ten LIKE '%$keyword%' ";
        return $this->db->select($query);
    }
}