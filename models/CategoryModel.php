<?php
require_once 'Connect.php';

class CategoryModel
{
    public static function all()
    {
        $conn = Connect::getInstance();
        $stmt = $conn->prepare("SELECT * FROM danh_muc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $conn = Connect::getInstance();
        $stmt = $conn->prepare("SELECT * FROM danh_muc WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function store($ten_danh_muc)
    {
        $conn = Connect::getInstance();
        $stmt = $conn->prepare("INSERT INTO danh_muc (ten_danh_muc) VALUES (?)");
        return $stmt->execute([$ten_danh_muc]);
    }

    public static function update($id, $ten_danh_muc)
    {
        $conn = Connect::getInstance();
        $stmt = $conn->prepare("UPDATE danh_muc SET ten_danh_muc = ? WHERE id = ?");
        return $stmt->execute([$ten_danh_muc, $id]);
    }

    public static function delete($id)
    {
        $conn = Connect::getInstance();
        $stmt = $conn->prepare("DELETE FROM danh_muc WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
