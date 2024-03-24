<?php
include(__DIR__ . '/../../lib/database.php');

// class orderUserModel
// {
//     private $db;

//     public function __construct()
//     {
//         $this->db = new Database();
//     }




//     public function createOrder($id_khach_hang, $ngay, $tong_tien, $ghi_chu, $tinh_trang)
//     {

//         $query = "INSERT INTO don_dat_hang(id_khach_hang, ngay, tong_tien, ghi_chu, tinh_trang)
//                   VALUES ('$id_khach_hang','$ngay','$tong_tien','$ghi_chu','Chờ xác nhận')";
//         $this->db->execute($query);
//         return $this->db->getLastInsertId();
//     }

//     public function createOrderDetail($id_don_hang, $id_san_pham, $so_luong, $gia)
//     {
//         $query = "INSERT INTO chi_tiet_don_hang(id_don_hang, id_san_pham, so_luong, gia)
//                   VALUES ('$id_don_hang','$id_san_pham','$so_luong','$gia')";
//         return $this->db->execute($query);
//     }
// }
