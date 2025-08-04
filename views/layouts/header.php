<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .main-header {
        background-color: #111;
        padding: 10px 0;
        color: #fff;
        font-family: Arial, sans-serif;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
    }

    body {
        margin: 0;
        padding: 0;
        padding-top: 70px;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    .container {
        width: 95%;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .logo {
        background-color: #ff4500;
        padding: 10px 20px;
        font-weight: bold;
        font-size: 24px;
        color: white;
    }

    .main-nav a {
        color: white;
        text-decoration: none;
        margin: 0 10px;
        transition: color 0.3s;
    }

    .main-nav a:hover,
    .main-nav a.active {
        color: #ff4500;
    }

    .user-section {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn {
        background-color: #fff;
        color: #000;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #ff4500;
        color: white;
    }

    .welcome-text {
        margin-right: 10px;
        font-style: italic;
    }

    .user-section a,
    .user-section button {
        background-color: #fff;
        color: #111;
        border: none;
        padding: 6px 14px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .user-section a:hover,
    .user-section button:hover {
        background-color: #ff4500;
        color: #fff;
        cursor: pointer;
    }

    .user-section span {
        color: #fff;
        font-size: 14px;
        font-style: italic;
        margin-right: 6px;
    }

    .user-section a+a,
    .user-section a+button {
        margin-left: 6px;
    }
</style>

<header class="main-header">
    <div class="container">
        <div class="logo">ADIDAS</div>
        <nav class="main-nav">
            <a href="?act=home">Trang Chủ</a>
            <a href="?act=product">Sản Phẩm</a>
            <a href="?act=contact">Liên hệ</a>
            <a href="?act=about">Giới Thiệu</a>
            <a href="?act=cart">Giỏ Hàng</a>
            <a href="?act=order">Đơn Hàng</a>
        </nav>
        <div class="user-section">
            <?php
            if (session_status() === PHP_SESSION_NONE) session_start();
            ?>

            <!-- Hiển thị phần chào tên người dùng nếu đã đăng nhập -->
            <?php if (isset($_SESSION['user'])): ?>
                <span>Chào <?= $_SESSION['user']['email'] ?></span>
                <a href="?act=logout"><button>Đăng xuất</button></a>
            <?php else: ?>
                <a href="?act=login">Đăng nhập</a>
                <a href="?act=register">Đăng ký</a>
            <?php endif; ?>
        </div>
    </div>
</header>