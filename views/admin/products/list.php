<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
        }

        a.btn {
            padding: 6px 12px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 0 2px;
        }

        a.btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h2>Danh sách sản phẩm</h2>
    <a class="btn" href="?act=admin/products/add">+ Thêm sản phẩm</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= htmlspecialchars($product['ten_san_pham']) ?></td>
                    <td><?= number_format($product['gia']) ?>đ</td>
                    <td><img src="uploads/<?= htmlspecialchars($product['hinh_anh']) ?>" width="50"></td>
                    <td>
                        <a class="btn" href="?act=admin/products/edit&id=<?= $product['id'] ?>">Sửa</a>
                        <a class="btn" href="?act=admin/products/delete&id=<?= $product['id'] ?>" onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>