<?php
include(__DIR__ . '/../../lib/database.php');

class CategoryModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllCategories()
    {
        $query = "SELECT * FROM danh_muc_san_pham";
        return $this->db->select($query);
    }

    public function getCategoryById($id)
    {
        $query = "SELECT * FROM danh_muc_san_pham WHERE id = $id";
        $result = $this->db->select($query);
        return $result[0];
    }

    public function createCategory($ten)
    {
        $query = "INSERT INTO danh_muc_san_pham(ten) VALUE ('$ten')";
        return $this->db->execute($query);
    }

    public function deleteCategory($id)
    {
        $query = "DELETE FROM danh_muc_san_pham WHERE id = $id";
        return $this->db->execute($query);
    }

    public function updateCategory($id, $ten)
    {
        $query = "UPDATE danh_muc_san_pham SET ten = '$ten' WHERE id = $id";
        return $this->db->execute($query);
    }

    //Liệt kê sản phảm theo danh mục
    public function getProductByCategory($id)
    {
        $query = "SELECT * FROM san_pham WHERE id_danh_muc = $id";
        return $this->db->select($query);
    }
}
