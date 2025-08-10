<!-- views/commons/layout_admin.php -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h3>Admin Panel</h3>
            <ul>
                <li><a href="?act=admin-dashboard">📊 Dashboard</a></li>
                <li><a href="?act=admin-products">🛍️ Sản phẩm</a></li>
                <li><a href="?act=admin-orders">📦 Đơn hàng</a></li>
                <li><a href="?act=admin-users">👤 Người dùng</a></li>
                <li><a href="?act=admin-categories">📂 Danh mục</a></li>
                <li><a href="?act=logout">🚪 Đăng xuất</a></li>
            </ul>
        </aside>
        <main class="content">
            <?php include $view; ?>
        </main>
    </div>
</body>

</html>