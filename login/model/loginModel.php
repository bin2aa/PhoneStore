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

    public function createUser($ten_dang_nhap, $mat_khau)
    {   
        $hashedPassword = md5($mat_khau); // Mã hóa mật khẩu
        $vai_tro = 1; // Đặt vai trò mặc định là 1
        $query = "INSERT INTO nguoi_dung(ten_dang_nhap, mat_khau, vai_tro) VALUES ('$ten_dang_nhap','$hashedPassword','$vai_tro')";
        return $this->db->execute($query);
    }
}
