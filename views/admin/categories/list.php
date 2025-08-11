<h1>Danh sách danh mục</h1>
<a href="index.php?act=admin/categories/add">+ Thêm danh mục</a>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($categories as $cat): ?>
        <tr>
            <td><?= $cat['id'] ?></td>
            <td><?= $cat['ten_danh_muc'] ?></td>
            <td>
                <a href="index.php?act=admin/categories/edit&id=<?= $cat['id'] ?>">Sửa</a> |
                <a href="index.php?act=admin/categories/delete&id=<?= $cat['id'] ?>" onclick="return confirm('Xóa danh mục này?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>