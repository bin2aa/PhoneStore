<?php
class SeriProductModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSeriProducts()
    {
        $query = "SELECT ssp.id, ssp.seri, sp.ten AS san_pham 
                  FROM seri_san_pham ssp
                  JOIN san_pham sp ON ssp.id_san_pham = sp.id";
        return $this->db->select($query);
    }

    public function getSeriProductById($id)
    {
        $query = "SELECT ssp.id, ssp.seri, sp.ten AS san_pham
                  FROM seri_san_pham ssp
                  JOIN san_pham sp ON ssp.id_san_pham = sp.id
                  WHERE ssp.id = $id";
        $result = $this->db->select($query);
        return $result ? $result[0] : null;
    }

    public function createSeriProduct($seri, $id_san_pham)
    {
        $query = "INSERT INTO seri_san_pham (seri, id_san_pham) VALUES ('$seri', '$id_san_pham')";
        return $this->db->execute($query);
    }

    public function updateSeriProduct($id, $seri, $id_san_pham)
    {
        $query = "UPDATE seri_san_pham SET seri = '$seri', id_san_pham = '$id_san_pham' WHERE id = $id";
        return $this->db->execute($query);
    }

    public function deleteSeriProduct($id)
    {
        $query = "DELETE FROM seri_san_pham WHERE id = $id";
        return $this->db->execute($query);
    }
}
