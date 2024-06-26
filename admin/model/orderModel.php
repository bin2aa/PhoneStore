<?php
// include __DIR__ . '/../../lib/database.php';

class OrderModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }



    public function getAllOrders()
    {
        $query = "SELECT don_dat_hang.*,khach_hang.ten AS ten_khach_hang
              FROM don_dat_hang
              JOIN khach_hang ON don_dat_hang.id_khach_hang = khach_hang.id";
        return $this->db->select($query);
    }

    public function getOrderById($id)
    {
        $query = "SELECT * FROM don_dat_hang WHERE id = $id";

        $result = $this->db->select($query);

        return $result[0];
    }

    public function createOrder($id_khach_hang, $ngay, $tong_tien, $ghi_chu, $tinh_trang)
    {
        $query = "INSERT INTO don_dat_hang(id_khach_hang, ngay, tong_tien, ghi_chu, tinh_trang)
        VALUE ('$id_khach_hang','$ngay','$tong_tien','$ghi_chu','Chờ xác nhận')";
        return $this->db->execute($query);
    }

    public function deleteOrder($id)
    {
        $query = "DELETE from don_dat_hang where id = $id";
        return $this->db->execute($query);
    }

    public function updateOrder($id, $id_khach_hang, $ngay, $tong_tien, $ghi_chu, $tinh_trang)
    {
        $query = "UPDATE don_dat_hang SET
        id_khach_hang = '$id_khach_hang',
        ngay = '$ngay',
        tong_tien = '$tong_tien',
        ghi_chu = '$ghi_chu',
        tinh_trang = '$tinh_trang'
        WHERE id = $id";
        return $this->db->execute($query);
    }

    //Hiển thị tên select khách hàng khi thêm mới khách hàng theo id
    public function getAllCustomersSelect()
    {
        $query = "SELECT * FROM khach_hang";
        return $this->db->select($query);
    }

    //Hiển thị select tình trạng đơn hàng 

    public function getStatusSelect()
    {
        $query = "SELECT DISTINCT tinh_trang FROM don_dat_hang";
        return $this->db->select($query);
    }

    // public function getOrderDetailsByOrderId($id_don_hang)
    // {
    //     $query = "SELECT * FROM chi_tiet_don_hang WHERE id_don_hang = $id_don_hang";
    //     return $this->db->select($query);
    // }

    public function getOderDetailsSelect($id_don_hang)
    {
        $query = "SELECT chi_tiet_don_hang.*,san_pham.ten AS ten_san_pham
              FROM chi_tiet_don_hang
              JOIN san_pham ON chi_tiet_don_hang.id_san_pham = san_pham.id
              where id_don_hang = $id_don_hang";
        return $this->db->select($query);
    }

    public function updateOrderStatus($id, $newStatus)
    {
        $query = "UPDATE don_dat_hang SET tinh_trang = '$newStatus' WHERE id = $id";
        return $this->db->execute($query);
    }

    public function searchOrder($keyword)
    {
        $query = "SELECT don_dat_hang.*, khach_hang.ten AS ten_khach_hang
              FROM don_dat_hang
              JOIN khach_hang ON don_dat_hang.id_khach_hang = khach_hang.id
              WHERE don_dat_hang.tinh_trang LIKE '%$keyword%'";
        return $this->db->select($query);
    }

    // //Lọc sản phẩm từ ngày này đến ngày kia
    public function filterOrders($fromDate, $toDate)
    {
        $query = "SELECT don_dat_hang.*, khach_hang.ten AS ten_khach_hang
              FROM don_dat_hang
              JOIN khach_hang ON don_dat_hang.id_khach_hang = khach_hang.id
              WHERE ngay >= '$fromDate' AND ngay <= '$toDate'";
        return $this->db->select($query);
    }

    //sắp xếp giá giảm dần
    public function sortOrdersDesc($sort)
    {
        $query = "SELECT don_dat_hang.*, khach_hang.ten AS ten_khach_hang
              FROM don_dat_hang
              JOIN khach_hang ON don_dat_hang.id_khach_hang = khach_hang.id
              ORDER BY tong_tien $sort";
        return $this->db->select($query);
    }

    //sắp xếp giá tăng dần
    public function sortOrdersAsc($sort)
    {
        $query = "SELECT don_dat_hang.*, khach_hang.ten AS ten_khach_hang
              FROM don_dat_hang
              JOIN khach_hang ON don_dat_hang.id_khach_hang = khach_hang.id
              ORDER BY tong_tien $sort";
        return $this->db->select($query);
    }
}
