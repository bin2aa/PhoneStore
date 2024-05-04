<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "phonestore";

    private $conn;

    // Hàm khởi tạo, tự động kết nối cơ sở dữ liệu khi tạo đối tượng Database
    public function __construct()
    {
        $this->conn = $this->connectDB();
    }

    // Phương thức kết nối cơ sở dữ liệu
    private function connectDB()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        // Kiểm tra kết nối
        if (!$conn) {
            die(mysqli_connect_error());
        }

        return $conn;
    }

    // Phương thức thực hiện truy vấn SELECT
    public function select($query)
    {
        $result = mysqli_query($this->conn, $query);

        // Kiểm tra và xử lý kết quả
        if ($result) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        } else {
            die(mysqli_error($this->conn));
        }
    }

    // Phương thức thực hiện truy vấn INSERT, UPDATE, DELETE
    public function execute($query)
    {
        $result = mysqli_query($this->conn, $query);
        // Kiểm tra và xử lý kết quả
        if ($result) {
            return true; // Thực hiện thành công
        } else {
            die(mysqli_error($this->conn));
        }
    }


    // lấy giá trị id 
    public function getLastInsertId()
    {
        return mysqli_insert_id($this->conn);
    }

    // Phương thức đóng kết nối cơ sở dữ liệu
    public function close()
    {
        mysqli_close($this->conn);
    }
}