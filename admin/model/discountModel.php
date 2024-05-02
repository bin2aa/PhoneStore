<?php

class discountModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllDiscounts()
    {
        $query = "SELECT * FROM giam_gia";
        return $this->db->select($query);
    }

    public function getDiscountById($id)
    {
        $query = "SELECT * FROM giam_gia WHERE id = $id";
        $result = $this->db->select($query);
        return $result[0];
    }

    public function createDiscount($ten, $dieu_kien_mua, $phan_tram_giam_gia, $ngay_bat_dau, $ngay_ket_thuc)
    {
        $query = "INSERT INTO giam_gia(ten, dieu_kien_mua, phan_tram_giam_gia, ngay_bat_dau, ngay_ket_thuc) 
                VALUE ('$ten', $dieu_kien_mua, $phan_tram_giam_gia, '$ngay_bat_dau', '$ngay_ket_thuc')";
        return $this->db->execute($query);
    }

    public function deleteDiscount($id)
    {
        $query = "DELETE FROM giam_gia WHERE id = $id";
        return $this->db->execute($query);
    }

    public function updateDiscount($id, $ten, $dieu_kien_mua, $phan_tram_giam_gia, $ngay_bat_dau, $ngay_ket_thuc)
    {
        $query = "UPDATE giam_gia 
        SET ten= '$ten', 
        dieu_kien_mua = $dieu_kien_mua, 
        phan_tram_giam_gia = $phan_tram_giam_gia, 
        ngay_bat_dau = '$ngay_bat_dau', 
        ngay_ket_thuc = '$ngay_ket_thuc' 
        WHERE id = $id";
        return $this->db->execute($query);
    }
}
