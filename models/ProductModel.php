<?php
class ProductModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = Connect::getInstance();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM san_pham ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM san_pham WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getByCategory($categoryId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM san_pham WHERE id_danh_muc = ? ORDER BY id DESC");
        $stmt->execute([$categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
