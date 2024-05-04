<?php
// include(__DIR__ . '/../../lib/database.php');

class SupplierModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSuppliers()
    {
        $query = "SELECT * FROM nha_cung_cap";
        return $this->db->select($query);
    }

    public function getSupplierById($id)
    {
        $query = "SELECT * FROM nha_cung_cap WHERE id = $id";

        $result = $this->db->select($query);

        return $result[0];
    }

    public function createSupplier($ten, $so_dien_thoai, $email, $dia_chi)
    {
        $query = "INSERT INTO nha_cung_cap(ten, so_dien_thoai, email, dia_chi)
        VALUE ('$ten','$so_dien_thoai','$email','$dia_chi')";
        return $this->db->execute($query);
    }


    public function deleteSupplier($id)
    {
        $query = "DELETE from nha_cung_cap where id = $id";
        return $this->db->execute($query);
    }

    public function updateSupplier($id, $ten, $so_dien_thoai, $email, $dia_chi)
    {
        $query = "UPDATE nha_cung_cap SET 
        ten = '$ten', 
        so_dien_thoai = '$so_dien_thoai',
        email = '$email',
        dia_chi = '$dia_chi'
        WHERE id = $id";
        return $this->db->execute($query);
    }

    public function searchSupplier($search)
    {
        $query = "SELECT * FROM nha_cung_cap WHERE ten LIKE '%$search%'";
        return $this->db->select($query);
    }
}