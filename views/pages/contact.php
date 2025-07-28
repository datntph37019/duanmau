<?php include PATH_ROOT . 'views/layouts/header.php'; ?>

<h2>Liên hệ</h2>

<form action="" method="post">
    <label>Họ và tên:</label><br>
    <input type="text" name="fullname" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Nội dung:</label><br>
    <textarea name="message" rows="5" required></textarea><br><br>

    <button type="submit">Gửi liên hệ</button>
</form>

<?php include PATH_ROOT . 'views/layouts/footer.php'; ?>