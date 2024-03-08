<?php
include(__DIR__ . '/../../lib/database.php');

class ProductModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllProducts()
    {
        $query = "SELECT * FROM san_pham";
        return $this->db->select($query);
    }

    public function getProductById($id)
    {
        $query = "SELECT * FROM san_pham WHERE id = $id";

        $result = $this->db->select($query);

        return $result[0];
    }

    public function createProduct($ten, $anh, $id_danh_muc, $gia, $so_luong, $mo_ta)
    {
        $query = "INSERT INTO san_pham(ten, anh, id_danh_muc, gia, so_luong, mo_ta)
        VALUE ('$ten','$anh','$id_danh_muc','$gia','$so_luong','$mo_ta')";
        return $this->db->execute($query);
    }


    public function deleteProduct($id)
    {
        $query = "DELETE from san_pham where id = $id";
        return $this->db->execute($query);
    }

    public function updateProduct($id, $ten, $anh, $id_danh_muc, $gia, $so_luong, $mo_ta)
    {
        $query = "UPDATE san_pham SET 
        ten = '$ten', 
        anh = '$anh', 
        id_danh_muc = '$id_danh_muc', 
        gia = '$gia',
        so_luong = '$so_luong', 
        mo_ta = '$mo_ta'
        WHERE id = $id";
        return $this->db->execute($query);
    }

    public function searchProducts($keyword)
    {
        $query = "SELECT * FROM san_pham WHERE ten LIKE '%$keyword%' ";
        return $this->db->select($query);
    }

    //Hiển thị tên select tên danh mục khi thêm mới danh mục theo id
    public function getAllCategorySelect()
    {
        $query = "SELECT * FROM danh_muc_san_pham";
        return $this->db->select($query);
    }


    
}
