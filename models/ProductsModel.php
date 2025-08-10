<?php
// File: models/ProductsModel.php

class ProductsModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
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

    public function insert($name, $description, $price, $image)
    {
        $stmt = $this->conn->prepare("INSERT INTO san_pham (ten_san_pham, mo_ta, gia, hinh_anh) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $description, $price, $image]);
    }

    public function update($id, $name, $description, $price, $image)
    {
        $stmt = $this->conn->prepare("UPDATE san_pham SET ten_san_pham = ?, mo_ta = ?, gia = ?, hinh_anh = ? WHERE id = ?");
        return $stmt->execute([$name, $description, $price, $image, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM san_pham WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
