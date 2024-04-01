<?php
include(__DIR__ . '/../../lib/database.php');
class loginModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getUserByUsernameAndPassword($username, $password)
    {
        $hashedPassword = md5($password); // Mã hóa mật khẩu trước khi so sánh
        $query = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap = '$username' AND mat_khau = '$hashedPassword'";
        $result = $this->db->select($query);
        if ($result && count($result) > 0) {
            return $result[0]; // Trả về dữ liệu người dùng nếu tìm thấy
        } else {
            return null;
        }
    }

    public function createUser($ten_dang_nhap, $mat_khau, $ho_ten, $email, $so_dien_thoai, $dia_chi)
    {
        $hashedPassword = md5($mat_khau); // Mã hóa mật khẩu
        $vai_tro = "Khách hàng"; // Đặt vai trò mặc định là 1
        // Thêm người dùng vào bảng nguoi_dung
        $query = "INSERT INTO nguoi_dung(ten_dang_nhap, mat_khau, vai_tro) VALUES ('$ten_dang_nhap','$hashedPassword','$vai_tro')";
        $userInserted = $this->db->execute($query);
        if ($userInserted) {
            // Lấy ID của người dùng vừa được thêm vào
            $id_nguoi_dung = $this->db->getLastInsertId();
            // Thêm thông tin của khách hàng vào bảng khach_hang
            $query = "INSERT INTO khach_hang(ten, so_dien_thoai, email, dia_chi, id_nguoi_dung) VALUES ('$ho_ten', '$so_dien_thoai', '$email', '$dia_chi',$id_nguoi_dung)";
            return $this->db->execute($query);
        } else {
            return false;
        }
    }

    public function changePassword($id_nguoi_dung, $mat_khau_moi)
    {
        $hashedPassword = md5($mat_khau_moi);
        $query = "UPDATE nguoi_dung SET mat_khau = '$hashedPassword' WHERE id = $id_nguoi_dung";
        return $this->db->execute($query);
    }


    public function getCustomerById($id_nguoi_dung)
    {
        $query = "SELECT * FROM khach_hang WHERE id_nguoi_dung = $id_nguoi_dung";
        $result = $this->db->select($query);
        if ($result && count($result) > 0) {
            return $result[0]; // Trả về thông tin khách hàng
        } else {
            return null;
        }
    }
    // public function getPessionByRole($role)
    // {
    //     $query = "SELECT * FROM phan_quyen WHERE vai_tro = '$role'";
    //     $result = $this->db->select($query);
    //     return $result; // Trả về danh sách các quyền
    // }

    // Trong file model/loginModel.php

    public function getUserPermissionsByRole($role)
    {
        $query = "SELECT * FROM phan_quyen WHERE vai_tro = '$role'";
        $result = $this->db->select($query);

        if ($result) {
            $permissions = $result[0]; // mỗi vai trò chỉ có một bản ghi trong bảng phan_quyen
            return $permissions;
        } else {
            return false; // Trả về false nếu không có quyền nào được tìm thấy
        }
    }
}
