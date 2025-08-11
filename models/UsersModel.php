<?php
require_once './models/Connect.php';
class UsersModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = Connect::getInstance();
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function insertUser($data)
    {
        $sql = "INSERT INTO users ( email, password, role) VALUES ( ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $data['email'],
            password_hash($data['password'], PASSWORD_DEFAULT),
            $data['role']
        ]);
    }

    // public function updateUser($id, $data)
    // {
    //     if (!empty($data['password'])) {
    //         $sql = "UPDATE users SET  email = ?, password = ?, role = ? WHERE id = ?";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([
    //             $data['email'],
    //             password_hash($data['password'], PASSWORD_DEFAULT),
    //             $data['role'],
    //             $id
    //         ]);
    //     } else {
    //         $sql = "UPDATE users SET email = ?, role = ? WHERE id = ?";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([
    //             $data['email'],
    //             $data['role'],
    //             $id
    //         ]);
    //     }
    // }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }
}
