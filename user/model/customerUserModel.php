<?php
include(__DIR__ . '/../../lib/database.php');

class customerUserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getCustomerById()
    {
        $id_nguoi_dung = Session::getSessionValue('login_id'); // Lấy ID người dùng từ session
        $sql = "SELECT * FROM khach_hang WHERE id_nguoi_dung = $id_nguoi_dung";
        $result = $this->db->select($sql);
        return $result;
    }
}
