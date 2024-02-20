<?php
include(__DIR__ . '/../../lib/database.php');

class CustomerModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
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
    public function createCustomer($ten, $so_dien_thoai, $email, $dia_chi)
    {
        // $hashed_password = password_hash($mat_khau, PASSWORD_DEFAULT);
        $query = "INSERT INTO khach_hang (ten, so_dien_thoai, email, dia_chi) 
        VALUE ('$ten','$so_dien_thoai','$email','$dia_chi')";
        return $this->db->execute($query);
    }

    public function deleteCustomer($id)
    {
        $query = "DELETE from khach_hang where id = $id";
        return $this->db->execute($query);
    }

    public function updateCustomer($id, $ten, $so_dien_thoai, $email, $dia_chi)
    {
        $query = "UPDATE khach_hang SET ten = '$ten', 
        so_dien_thoai = '$so_dien_thoai', 
        email = '$email',
        dia_chi = '$dia_chi' 
        WHERE id = $id";
        return $this->db->execute($query);
    }

    
}
