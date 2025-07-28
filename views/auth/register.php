<?php include PATH_ROOT . 'views/layouts/header.php'; ?>

<h2>Đăng ký tài khoản</h2>

<form action="" method="post">
    <label>Họ và tên:</label><br>
    <input type="text" name="fullname" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Mật khẩu:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Nhập lại mật khẩu:</label><br>
    <input type="password" name="repassword" required><br><br>

    <button type="submit">Đăng ký</button>
</form>

<?php include PATH_ROOT . 'views/layouts/footer.php'; ?>