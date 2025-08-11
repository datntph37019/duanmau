<nav>
    <a href="index.php">Trang chủ</a>
    <a href="index.php?act=about">Giới thiệu</a>
    <a href="index.php?act=contact">Liên hệ</a>

    <?php if (isset($_SESSION['user'])): ?>
        <span>Xin chào, <?= htmlspecialchars($_SESSION['user']['username']) ?></span>

        <?php if ($_SESSION['user']['role'] === 'admin'): ?>
            <a href="index.php?act=admin-dashboard">Quản trị</a>
        <?php endif; ?>

        <a href="index.php?act=logout">Đăng xuất</a>
    <?php else: ?>
        <a href="index.php?act=login">Đăng nhập</a>
    <?php endif; ?>
</nav>