<?php
// include(__DIR__ . '/../../lib/database.php');

class PermissionModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPermissions()
    {
        $query = "SELECT * FROM phan_quyen";
        return $this->db->select($query);
    }

    public function getPermissionByRole($role)
    {
        $query = "SELECT * FROM phan_quyen WHERE vai_tro = '$role'";
        $result = $this->db->select($query);
        return $result[0];
    }

    public function createPermission($role, $qlnhap_kho, $qlnha_cung_cap, $qlnguoi_dung, $qlkhach_hang, $qldon_hang, $qlsan_pham, $qldanh_muc, $qlbao_hanh, $qlbinh_luan)
    {
        $query = "INSERT INTO phan_quyen(vai_tro, qlnhap_kho, qlnha_cung_cap, qlnguoi_dung, qlkhach_hang, qldon_hang, qlsan_pham, qldanh_muc, qlbao_hanh, qlbinh_luan) 
                  VALUES ('$role', $qlnhap_kho, $qlnha_cung_cap, $qlnguoi_dung, $qlkhach_hang, $qldon_hang, $qlsan_pham, $qldanh_muc, $qlbao_hanh, $qlbinh_luan)";
        return $this->db->execute($query);
    }

    public function deletePermission($role)
    {
        $query = "DELETE FROM phan_quyen WHERE vai_tro = '$role'";
        return $this->db->execute($query);
    }

    public function updatePermission($role, $qlnhap_kho, $qlnha_cung_cap, $qlnguoi_dung, $qlkhach_hang, $qldon_hang, $qlsan_pham, $qldanh_muc, $qlbao_hanh, $qlbinh_luan)
    {
        $query = "UPDATE phan_quyen SET qlnhap_kho = $qlnhap_kho, 
        qlnha_cung_cap = $qlnha_cung_cap, 
        qlnguoi_dung = $qlnguoi_dung, 
        qlkhach_hang = $qlkhach_hang,
        qldon_hang = $qldon_hang, 
        qlsan_pham = $qlsan_pham, 
        qldanh_muc = $qldanh_muc, 
        qlbao_hanh = $qlbao_hanh, 
        qlbinh_luan = $qlbinh_luan
        WHERE vai_tro = '$role'";
        return $this->db->execute($query);
    }
}
