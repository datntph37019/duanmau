<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background: #2c3e50;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #34495e;
        }

        .main {
            margin-left: 220px;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            background: #ecf0f1;
            padding: 10px 20px;
            border-bottom: 1px solid #bdc3c7;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="index.php?act=admin/dashboard"><i class="fas fa-home"></i> Dashboard</a>
        <a href="index.php?act=admin/products"><i class="fas fa-box"></i> Sản phẩm</a>
        <a href="index.php?act=admin/users"><i class="fas fa-user"></i> Người dùng</a>
        <a href="index.php?act=admin/categories"><i class="fas fa-list"></i> Danh mục</a>
    </div>
    <div class="main">
        <div class="header">
            <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $email = $_SESSION['user']['email'] ?? 'Khách';
            $role  = ucfirst($_SESSION['user']['role'] ?? 'Không xác định'); // ucfirst để chữ cái đầu viết hoa
            ?>
            <span>Xin chào, <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?> (<?= htmlspecialchars($role, ENT_QUOTES, 'UTF-8') ?>)</span>
        </div>
        <div class="content">
            <?php include $viewFile; ?>
        </div>
    </div>

</body>

</html>