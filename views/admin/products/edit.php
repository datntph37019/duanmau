<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sửa sản phẩm</title>
</head>

<body>
    <h2>Sửa sản phẩm</h2>
    <form action="?act=admin/products/update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <input type="hidden" name="hinh_anh_old" value="<?= $product['hinh_anh'] ?>">

        <p>
            <label>Tên sản phẩm:</label><br>
            <input type="text" name="ten_san_pham" value="<?= htmlspecialchars($product['ten_san_pham']) ?>" required>
        </p>
        <p>
            <label>Mô tả:</label><br>
            <textarea name="mo_ta" rows="4"><?= htmlspecialchars($product['mo_ta']) ?></textarea>
        </p>
        <p>
            <label>Giá:</label><br>
            <input type="number" name="gia" value="<?= $product['gia'] ?>" required>
        </p>
        <p>
            <label>Hình ảnh hiện tại:</label><br>
            <img src="uploads/<?= htmlspecialchars($product['hinh_anh']) ?>" width="100"><br>
            <label>Đổi hình ảnh:</label><br>
            <input type="file" name="hinh_anh" accept="image/*">
        </p>
        <p>
            <button type="submit">Cập nhật</button>
            <a href="?act=admin/products">Hủy</a>
        </p>
    </form>
</body>

</html>