<?php

class CommentModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }





    public function getAllComments()
    {
        $query = "SELECT * FROM binh_luan";
        return $this->db->select($query);
    }




    public function getCommentById($id)
    {
        $query = "SELECT * FROM binh_luan WHERE id = $id";
        $result = $this->db->select($query);
        return $result[0];
    }

    public function createComment($id_san_pham, $id_khach_hang, $noi_dung, $nguoi_dung, $ngay_gio_binh_luan)
    {
        $query = "INSERT INTO binh_luan(id_san_pham, id_khach_hang, noi_dung, ngay_gio_binh_luan) VALUE ('$id_san_pham','$id_khach_hang','$noi_dung','$ngay_gio_binh_luan')";
        return $this->db->execute($query);
    }


    public function deleteComment($id)
    {
        $query = "DELETE FROM binh_luan WHERE id = $id";
        return $this->db->execute($query);
    }

    public function updateComment($id, $id_san_pham, $id_khach_hang, $noi_dung, $nguoi_dung, $ngay_gio_binh_luan)
    {
        $query = "UPDATE binh_luan SET 
        id_san_pham = '$id_san_pham', 
        id_khach_hang = '$id_khach_hang', 
        noi_dung = '$noi_dung', 
        nguoi_dung = '$nguoi_dung', 
        ngay_gio_binh_luan = '$ngay_gio_binh_luan' 
        WHERE id = $id";
        return $this->db->execute($query);
    }


    public function getCommentsByProductId($id_san_pham)
    {
        $query = "SELECT binh_luan.*, khach_hang.ten AS ten_khach_hang
        FROM binh_luan
        JOIN khach_hang ON binh_luan.id_khach_hang = khach_hang.id
        WHERE id_san_pham = $id_san_pham";
        return $this->db->select($query);
    }
}
