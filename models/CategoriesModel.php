<?php
// File: models/CategoriesModel.php
require_once __DIR__ . '/../models/Connect.php'; // Sửa lại dùng connect.php

class CategoriesModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = Connect::getInstance();
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM danh_muc ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM danh_muc WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($ten_danh_muc)
    {
        $sql = "INSERT INTO danh_muc (ten_danh_muc) VALUES (:ten_danh_muc)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':ten_danh_muc' => $ten_danh_muc]);
    }
    public function update($id, $ten_danh_muc)
    {
        $sql = "UPDATE danh_muc SET ten_danh_muc = :ten_danh_muc WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':ten_danh_muc' => $ten_danh_muc,
            ':id' => $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM danh_muc WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
