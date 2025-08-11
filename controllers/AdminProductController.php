<?php
class AdminProductController
{
    public function __construct()
    {
        session_start();

        // Nếu chưa đăng nhập → chuyển về login
        if (!isset($_SESSION['user'])) {
            header("Location: views/auth/login.php");
            exit();
        }

        // Kiểm tra quyền admin
        if ($_SESSION['user']['role'] !== 'admin') {
            echo "Bạn không có quyền truy cập trang quản trị!";
            exit();
        }
    }
}
