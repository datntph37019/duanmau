<?php
// File: models/ProductsModel.php

class ProductsModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy danh sách sản phẩm kèm tên danh mục
    public function getAllWithCategory()
    {
        $sql = "SELECT sp.*, dm.ten_danh_muc 
                FROM san_pham sp
                LEFT JOIN danh_muc dm ON sp.id_danh_muc = dm.id
                ORDER BY sp.id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM san_pham ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM san_pham WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm sản phẩm có id_danh_muc
    public function insert($name, $description, $price, $image, $categoryId)
    {
        $stmt = $this->conn->prepare("INSERT INTO san_pham (ten_san_pham, mo_ta, gia, hinh_anh, id_danh_muc) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$name, $description, $price, $image, $categoryId]);
    }

    // Cập nhật sản phẩm có id_danh_muc
    public function update($id, $name, $description, $price, $image, $categoryId)
    {
        $stmt = $this->conn->prepare("UPDATE san_pham SET ten_san_pham = ?, mo_ta = ?, gia = ?, hinh_anh = ?, id_danh_muc = ? WHERE id = ?");
        return $stmt->execute([$name, $description, $price, $image, $categoryId, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM san_pham WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
