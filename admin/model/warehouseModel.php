<?php
// include(__DIR__ . '/../../lib/database.php');

class WarehouseModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllWarehouseReceipts()
    {
        $query = "SELECT nhap_kho.*,nha_cung_cap.ten AS ten_ncc
        FROM nhap_kho
        JOIN nha_cung_cap ON nhap_kho.id_nha_cung_cap = nha_cung_cap.id";
        return $this->db->select($query);
    }

    public function getWarehouseReceiptById($id)
    {
        $query = "SELECT * FROM nhap_kho WHERE id = $id";
        $result = $this->db->select($query);
        return $result[0];
    }

    public function addWarehouseReceipt($id_nha_cung_cap, $ngay, $ghi_chu, $details)
    {
        // Thêm mới phiếu nhập kho
        $query_add_receipt = "INSERT INTO nhap_kho (id_nha_cung_cap, ngay, tong_tien, ghi_chu) 
                              VALUES ('$id_nha_cung_cap', '$ngay', 0, '$ghi_chu')";
        $result_add_receipt = $this->db->execute($query_add_receipt); // Sử dụng phương thức execute() của class Database

        // Kiểm tra xem thêm phiếu nhập kho có thành công không
        if ($result_add_receipt) {
            // Lấy ID vừa thêm mới
            $id_nhap_kho = $this->db->getLastInsertId();

            // Thêm chi tiết các sản phẩm nhập kho
            foreach ($details as $detail) {
                // Thêm chi tiết các sản phẩm nhập kho
                $id_san_pham = $detail['id_san_pham'];
                $so_luong = $detail['so_luong'];
                $gia = $detail['gia'];
                $query_insert_detail = "INSERT INTO chi_tiet_nhap_kho (id_nhap_kho, id_san_pham, so_luong, gia) 
                                        VALUES ($id_nhap_kho, $id_san_pham, $so_luong, $gia)";
                $this->db->execute($query_insert_detail);

                // Cập nhật số lượng tồn kho cho các sản phẩm
                $query_update_inventory = "UPDATE san_pham 
                                           SET so_luong = so_luong + $so_luong 
                                           WHERE id = $id_san_pham";
                $this->db->execute($query_update_inventory);

                // Cập nhật tổng tiền cho phiếu nhập kho
                $query_update_total = "UPDATE nhap_kho 
                                       SET tong_tien = (
                                           SELECT SUM(so_luong * gia) 
                                           FROM chi_tiet_nhap_kho 
                                           WHERE id_nhap_kho = $id_nhap_kho
                                       )
                                       WHERE id = $id_nhap_kho";
                $this->db->execute($query_update_total);
            }

            return true; // Trả về true nếu thêm phiếu nhập kho và các chi tiết thành công
        } else {
            return false; // Trả về false nếu thêm phiếu nhập kho không thành công
        }
    }


    public function deleteWarehouseReceipt($id)
    {
        $query = "DELETE FROM nhap_kho WHERE id = $id";
        return $this->db->execute($query);
    }

    public function updateWarehouseReceipt($id, $id_nha_cung_cap, $ngay, $tong_tien, $ghi_chu)
    {
        $query = "UPDATE nhap_kho SET id_nha_cung_cap = '$id_nha_cung_cap', ngay = '$ngay', 
        tong_tien = '$tong_tien', ghi_chu = '$ghi_chu' WHERE id = $id";
        return $this->db->execute($query);
    }


    //Hiển thị tên select tên danh mục khi thêm mới NCC theo id
    public function getAllSupplierSelect()
    {
        $query = "SELECT * FROM nha_cung_cap";
        return $this->db->select($query);
    }
    //Hiển thị tên select tên sản phẩm khi thêm mới CT nhập kho theo id
    public function getAllProductSelect()
    {
        $query = "SELECT * FROM san_pham";
        return $this->db->select($query);
    }



    //------------------------------------
    //Chi tiết
    public function getWarehouseDetailsById($id_nhap_kho)
    {
        $query = "SELECT * FROM chi_tiet_nhap_kho WHERE id_nhap_kho = $id_nhap_kho";
        return $this->db->select($query);
    }
    public function getWarehouseDetailById($id)
    {
        $query = "SELECT * FROM nhap_kho_chi_tiet WHERE id = $id";
        $result = $this->db->select($query);
        return $result[0];
    }

    public function deleteWarehouseDetail($detail_id)
    {
        // Lấy id của phiếu nhập kho
        $query_get_receipt_id = "SELECT id_nhap_kho FROM chi_tiet_nhap_kho WHERE id = $detail_id";
        $receipt = $this->db->select($query_get_receipt_id);

        $receipt_id = $receipt[0]['id_nhap_kho'];

        // Xóa chi tiết nhập kho
        $query_delete_detail = "DELETE FROM chi_tiet_nhap_kho WHERE id = $detail_id";
        $this->db->execute($query_delete_detail);

        // Tính lại tổng tiền cho phiếu nhập kho
        $query_calculate_total = "SELECT SUM(so_luong * gia) AS total 
                              FROM chi_tiet_nhap_kho  
                              WHERE id_nhap_kho = $receipt_id";
        $total_result = $this->db->select($query_calculate_total);
        $total = $total_result[0]['total'];

        //Cập nhật tổng tiền mới
        $query_update_total = "UPDATE nhap_kho SET tong_tien = $total WHERE id = $receipt_id";
        return $this->db->execute($query_update_total);
    }


    public function updateWarehouseDetail($detail_id, $quantity, $price)
    {
        $query = "UPDATE chi_tiet_nhap_kho 
                  SET so_luong = $quantity, gia = $price 
                  WHERE id = $detail_id";
        return $this->db->execute($query);
    }


    public function searchWarehouseReceipt($search)
    {
        $query = "SELECT nhap_kho.*,nha_cung_cap.ten AS ten_ncc
        FROM nhap_kho
        JOIN nha_cung_cap ON nhap_kho.id_nha_cung_cap = nha_cung_cap.id
        WHERE nha_cung_cap.ten LIKE '%$search%'";
        return $this->db->select($query);
    }
}
