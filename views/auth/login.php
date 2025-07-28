<?php include PATH_ROOT . 'views/layouts/header.php'; ?>

<h2>Đăng nhập</h2>

<form action="" method="post">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Mật khẩu:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Đăng nhập</button>
</form>

<?php include PATH_ROOT . 'views/layouts/footer.php'; ?>