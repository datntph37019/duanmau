<h2>Sửa sản phẩm</h2>
<form method="post" action="?act=admin-product-edit-submit">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <label>Tên sản phẩm:</label><br>
    <input type="text" name="name" value="<?= $product['name'] ?>"><br>
    <label>Giá:</label><br>
    <input type="number" name="price" value="<?= $product['price'] ?>"><br><br>
    <button type="submit">Cập nhật</button>
</form>