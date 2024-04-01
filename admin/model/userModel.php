<?php
include(__DIR__ . '/../../lib/database.php');
class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM nguoi_dung";
        return $this->db->select($query);
    }


    public function getUserById($id)
    {
        $query = "SELECT * FROM nguoi_dung WHERE id = $id";

        $result = $this->db->select($query);

        return $result[0];
    }

    public function createUser($ten_dang_nhap, $mat_khau, $vai_tro)
    {
        $hashedPassword = md5($mat_khau); // Mã hóa mật khẩu
        $query = "INSERT INTO nguoi_dung(ten_dang_nhap, mat_khau, vai_tro)
    VALUE ('$ten_dang_nhap','$hashedPassword','$vai_tro')"; // Lưu mật khẩu đã mã hóa
        return $this->db->execute($query);
    }

    public function deleteUser($id)
    {
        $query = "DELETE from nguoi_dung where id = $id";
        return $this->db->execute($query);
    }

    public function updateUser($id, $ten_dang_nhap, $mat_khau, $vai_tro)
    {
        $user = $this->getUserById($id); // Lấy thông tin người dùng từ cơ sở dữ liệu
        
        // Kiểm tra xem mật khẩu có được thay đổi hay không
        if (!empty($mat_khau)) {
            // Nếu có, mã hóa mật khẩu mới
            $hashedPassword = md5($mat_khau);
        } else {
            // Nếu không, giữ nguyên mật khẩu hiện tại trong cơ sở dữ liệu
            $hashedPassword = $user['mat_khau'];
        }
        
        $query = "UPDATE nguoi_dung SET
        ten_dang_nhap = '$ten_dang_nhap',
        mat_khau = '$hashedPassword', 
        vai_tro = '$vai_tro'
        WHERE id = $id";
        return $this->db->execute($query);
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

    public function getAllPermissionsSelect()
    {
        $query = "SELECT * FROM phan_quyen";
        return $this->db->select($query);
    }
}
