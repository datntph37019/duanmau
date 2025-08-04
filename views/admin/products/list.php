<h2>Danh sách sản phẩm</h2>
<a href="?act=admin-product-add">Thêm sản phẩm</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td>
                <a href="?act=admin-product-edit&id=<?= $product['id'] ?>">Sửa</a> |
                <a href="?act=admin-product-delete&id=<?= $product['id'] ?>" onclick="return confirm('Xóa?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>