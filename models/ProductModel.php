<?php
require_once 'Connect.php';

class ProductModel
{
    public static function getAllProducts()
    {
        $conn = Connect::getInstance();
        $sql = "SELECT * FROM san_pham";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getAll($keyword = '')
    {
        $conn = Connect::getInstance();
        if ($keyword != '') {
            $stmt = $conn->prepare("SELECT * FROM san_pham WHERE ten_san_pham LIKE ?");
            $stmt->execute(["%$keyword%"]);
        } else {
            $stmt = $conn->prepare("SELECT * FROM san_pham");
            $stmt->execute();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $conn = Connect::getInstance();
        $stmt = $conn->prepare("SELECT * FROM san_pham WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function insert($ten, $mo_ta, $gia, $hinh_anh)
    {
        $conn = Connect::getInstance();
        $stmt = $conn->prepare("INSERT INTO san_pham (ten_san_pham, mo_ta, gia, hinh_anh) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$ten, $mo_ta, $gia, $hinh_anh]);
    }

    public static function update($id, $ten, $mo_ta, $gia, $hinh_anh = null)
    {
        $conn = Connect::getInstance();
        if ($hinh_anh) {
            $stmt = $conn->prepare("UPDATE san_pham SET ten_san_pham=?, mo_ta=?, gia=?, hinh_anh=? WHERE id=?");
            return $stmt->execute([$ten, $mo_ta, $gia, $hinh_anh, $id]);
        } else {
            $stmt = $conn->prepare("UPDATE san_pham SET ten_san_pham=?, mo_ta=?, gia=? WHERE id=?");
            return $stmt->execute([$ten, $mo_ta, $gia, $id]);
        }
    }

    public static function delete($id)
    {
        $conn = Connect::getInstance();
        $stmt = $conn->prepare("DELETE FROM san_pham WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
