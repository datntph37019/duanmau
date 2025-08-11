<h1>Thêm danh mục</h1>

<form method="POST" action="index.php?act=admin/categories/add">
    <label for="ten_danh_muc">Tên danh mục:</label>
    <input
        type="text"
        name="ten_danh_muc"
        id="ten_danh_muc"
        value="<?= isset($_POST['ten_danh_muc']) ? htmlspecialchars($_POST['ten_danh_muc']) : '' ?>"
        required>
    <br><br>
    <button type="submit">Lưu</button>
    <a href="index.php?act=admin/categories">Quay lại</a>
</form>