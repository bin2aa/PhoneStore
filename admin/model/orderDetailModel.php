<?php
// include(__DIR__ . '/../../lib/database.php');

// class orderDetailModel
// {
//     private $db;

//     public function __construct()
//     {
//         $this->db = new Database();
//     }

//     public function getOrderDetailsByOrderId($order_id)
//     {
//         $query = "SELECT * FROM chi_tiet_don_hang WHERE id_don_hang = $order_id";
//         return $this->db->select($query);
//     }

//     public function addOrderDetail($order_id, $product_id, $quantity, $price)
//     {
//         $query = "INSERT INTO chi_tiet_don_hang (id_don_hang, id_san_pham, so_luong, gia) 
//                   VALUES ($order_id, $product_id, $quantity, $price)";
//         return $this->db->execute($query);
//     }

//     public function deleteOrderDetail($detail_id)
//     {
//         $query = "DELETE FROM chi_tiet_don_hang WHERE id = $detail_id";
//         return $this->db->execute($query);
//     }

//     public function updateOrderDetail($detail_id, $quantity, $price)
//     {
//         $query = "UPDATE chi_tiet_don_hang 
//                   SET so_luong = $quantity, gia = $price 
//                   WHERE id = $detail_id";
//         return $this->db->execute($query);
//     }
// }