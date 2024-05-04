<?php
// include(__DIR__ . '/../../lib/database.php');

// class warehouseDetailModel
// {
//     private $db;

//     public function __construct()
//     {
//         $this->db = new Database();
//     }

//     // Lấy danh sách chi tiết nhập kho dựa trên ID nhập kho
//     public function getWarehouseDetailsByReceiptId($receipt_id)
//     {
//         $query = "SELECT * FROM chi_tiet_nhap_kho WHERE id_nhap_kho = $receipt_id";
//         return $this->db->select($query);
//     }

//     // Thêm chi tiết nhập kho
//     public function addWarehouseDetail($receipt_id, $product_id, $quantity, $price)
//     {
//         $query = "INSERT INTO chi_tiet_nhap_kho (id_nhap_kho, id_san_pham, so_luong, gia) 
//                   VALUES ($receipt_id, $product_id, $quantity, $price)";
//         return $this->db->execute($query);
//     }

//     // Xóa chi tiết nhập kho dựa trên ID chi tiết nhập kho
//     public function deleteWarehouseDetail($detail_id)
//     {
//         $query = "DELETE FROM chi_tiet_nhap_kho WHERE id = $detail_id";
//         return $this->db->execute($query);
//     }

//     // Cập nhật chi tiết nhập kho
//     public function updateWarehouseDetail($detail_id, $quantity, $price)
//     {
//         $query = "UPDATE chi_tiet_nhap_kho 
//                   SET so_luong = $quantity, gia = $price 
//                   WHERE id = $detail_id";
//         return $this->db->execute($query);
//     }
// }
?>