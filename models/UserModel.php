<?php

class UserModel
{
    private $conn;

    public function __construct()
    {
        // Sử dụng thông tin từ biến môi trường
        $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
    }

    // Tạo người dùng mới
    public function create($email, $hashedPassword)
    {
        // Kiểm tra email đã tồn tại chưa
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE email = ?");
        if (!$stmt) return false;

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->close();
            return false; // Email đã tồn tại
        }
        $stmt->close();

        // Thêm người dùng mới
        $stmt = $this->conn->prepare("INSERT INTO users (email, password, created_at) VALUES (?, ?, NOW())");
        if (!$stmt) return false;

        $stmt->bind_param("ss", $email, $hashedPassword);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    // Tìm người dùng theo email
    public function findByEmail($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        if (!$stmt) return null;

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        $stmt->close();
        return $user;
    }

    // (Tuỳ chọn) Lấy danh sách tất cả người dùng – dùng trong admin
    public function getAll()
    {
        $query = "SELECT * FROM users ORDER BY created_at DESC";
        $result = $this->conn->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // (Tuỳ chọn) Xoá người dùng theo ID
    public function deleteById($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        if (!$stmt) return false;

        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
