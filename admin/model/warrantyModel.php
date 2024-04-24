<?php
// include(__DIR__ . '/../../lib/database.php');

class WarrantyModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllWarranties()
    {
        $query = "SELECT * FROM phieu_bao_hanh";
        return $this->db->select($query);
    }

    public function getWarrantyById($id)
    {
        $query = "SELECT * FROM phieu_bao_hanh WHERE id = $id";
        $result = $this->db->select($query);
        return $result[0];
    }

    public function createWarranty($id_san_pham, $id_don_hang, $ngay_lap, $ngay_het_han, $tinh_trang, $ghi_chu)
    {
        $query = "INSERT INTO phieu_bao_hanh(id_san_pham, id_don_hang, ngay_lap, ngay_het_han, tinh_trang, ghi_chu) 
                  VALUES ($id_san_pham, $id_don_hang, '$ngay_lap', '$ngay_het_han', '$tinh_trang', '$ghi_chu')";
        return $this->db->execute($query);
    }

    public function updateWarranty($id, $id_san_pham, $id_don_hang, $ngay_lap, $ngay_het_han, $tinh_trang, $ghi_chu)
    {
        $query = "UPDATE phieu_bao_hanh 
                  SET id_san_pham = $id_san_pham, id_don_hang = $id_don_hang, ngay_lap = '$ngay_lap', ngay_het_han = '$ngay_het_han', 
                  tinh_trang = '$tinh_trang', ghi_chu = '$ghi_chu' 
                  WHERE id = $id";
        return $this->db->execute($query);
    }

    public function deleteWarranty($id)
    {
        $query = "DELETE FROM phieu_bao_hanh WHERE id = $id";
        return $this->db->execute($query);
    }


    // getAllProductSelect và getAllOrderSelect dùng đế select tất cả sản phẩm và đơn hàng
    public function getAllProductSelect()
    {
        $query = "SELECT * FROM san_pham";
        return $this->db->select($query);
    }

    public function getAllOrderSelect()
    {
        $query = "SELECT * FROM don_dat_hang";
        return $this->db->select($query);
    }
}
