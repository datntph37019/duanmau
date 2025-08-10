<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
</head>

<body>
    <h2>Thêm sản phẩm</h2>
    <form action="?act=admin/products/store" method="POST" enctype="multipart/form-data">
        <p>
            <label>Tên sản phẩm:</label><br>
            <input type="text" name="ten_san_pham" required>
        </p>
        <p>
            <label>Mô tả:</label><br>
            <textarea name="mo_ta" rows="4"></textarea>
        </p>
        <p>
            <label>Giá:</label><br>
            <input type="number" name="gia" required>
        </p>
        <p>
            <label>Hình ảnh:</label><br>
            <input type="file" name="hinh_anh" accept="image/*" required>
        </p>
        <p>
            <button type="submit">Lưu</button>
            <a href="?act=admin/products">Hủy</a>
        </p>
    </form>
</body>

</html>