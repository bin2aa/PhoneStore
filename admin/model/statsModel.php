<?php

class statsModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getStats()
    {
        $query = "SELECT COUNT(id) as total_products FROM san_pham";
        $total_products = $this->db->select($query);

        $query = "SELECT COUNT(id) as total_categories FROM danh_muc_san_pham";
        $total_categories = $this->db->select($query);

        $query = "SELECT COUNT(id) as total_users FROM nguoi_dung";
        $total_users = $this->db->select($query);

        $query = "SELECT COUNT(id) as total_orders FROM don_dat_hang";
        $total_orders = $this->db->select($query);

        $query = "SELECT SUM(tong_tien) as total_revenue FROM don_dat_hang";
        $total_revenue = $this->db->select($query);

        $query = "SELECT COUNT(id) as total_warehouse_receipts FROM nhap_kho";
        $total_warehouse_receipts = $this->db->select($query);

        $query = "SELECT SUM(tong_tien) as total_warehouse_receipts_value FROM nhap_kho";
        $total_warehouse_receipts_value = $this->db->select($query);

        $query = "SELECT COUNT(id) as total_warehouse_receipt_details FROM chi_tiet_nhap_kho";
        $total_warehouse_receipt_details = $this->db->select($query);

        return [
            'total_products' => $total_products[0]['total_products'],
            'total_categories' => $total_categories[0]['total_categories'],
            'total_users' => $total_users[0]['total_users'],
            'total_orders' => $total_orders[0]['total_orders'],
            'total_revenue' => $total_revenue[0]['total_revenue'],
            'total_warehouse_receipts' => $total_warehouse_receipts[0]['total_warehouse_receipts'],
            'total_warehouse_receipts_value' => $total_warehouse_receipts_value[0]['total_warehouse_receipts_value'],
            'total_warehouse_receipt_details' => $total_warehouse_receipt_details[0]['total_warehouse_receipt_details']
        ];
    }
    // LEFT JOIN chi_tiet_don_hang ON don_dat_hang.id = chi_tiet_don_hang.id_don_hang
    public function getStatsByDate()
    {
        $sql = "
        SELECT
            DATE_FORMAT(don_dat_hang.ngay, '%Y-%m') AS month_year,
            COUNT(don_dat_hang.id) AS total_orders,

                SUM(don_dat_hang.tong_tien) AS total_revenue,
            (
                SELECT SUM(nhap_kho.tong_tien) 
                FROM nhap_kho 
                WHERE DATE_FORMAT(nhap_kho.ngay, '%Y-%m') = DATE_FORMAT(don_dat_hang.ngay, '%Y-%m')
            ) AS total_warehouse_receipts_value,
            
            (
                SELECT COUNT(chi_tiet_nhap_kho.id)
                FROM chi_tiet_nhap_kho
                INNER JOIN nhap_kho ON chi_tiet_nhap_kho.id_nhap_kho = nhap_kho.id
                WHERE DATE_FORMAT(nhap_kho.ngay, '%Y-%m') = DATE_FORMAT(don_dat_hang.ngay, '%Y-%m')
            ) AS total_warehouse_receipt_details,

            (
                SELECT COUNT(nhap_kho.id)
                FROM nhap_kho
                WHERE DATE_FORMAT(nhap_kho.ngay, '%Y-%m') = DATE_FORMAT(don_dat_hang.ngay, '%Y-%m')
            ) AS total_warehouse_receipts
            
            
            
            
        FROM don_dat_hang
        
        GROUP BY DATE_FORMAT(don_dat_hang.ngay, '%Y-%m')
        ORDER BY month_year DESC; 
        ";

        $monthlyStats = $this->db->select($sql);

        return [
            'monthly_stats' => $monthlyStats
        ];
    }
}
