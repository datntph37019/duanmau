<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Danh sách sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            margin: 40px;
            color: #333;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
            color: #2c3e50;
        }

        a.btn-add {
            display: inline-block;
            margin-bottom: 20px;
            background-color: #a8b0b8ff;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        a.btn-add:hover {
            background-color: #ced6ddff;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
            background-color: white;
            box-shadow: 0 4px 8px rgb(0 0 0 / 0.1);
            border-radius: 10px;
            overflow: hidden;
            font-size: 14px;
        }

        thead tr {
            background-color: #dae4b5ff;
            color: #2c3e50;
            text-align: left;
            font-weight: 600;
            font-size: 16px;
        }

        thead tr th {
            padding: 14px 20px;
        }

        tbody tr {
            background-color: #fff;
            transition: background-color 0.2s ease;
        }

        tbody tr:hover {
            background-color: #f0f8ff;
        }

        tbody tr td {
            padding: 14px 20px;
            vertical-align: middle;
            border-bottom: 1px solid #e1e5eb;
            text-align: left;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr td img {
            border-radius: 6px;
        }

        /* Nút hành động */
        a.btn {
            display: inline-block;
            padding: 6px 14px;
            background-color: #7fa8c4ff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin-right: 6px;
            transition: background-color 0.3s ease;
            font-size: 14px;
        }

        a.btn:hover {
            background-color: #6d8caaff;
        }

        a.btn.delete {
            background-color: #ac2d1fff;
        }

        a.btn.delete:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <h2>Danh sách sản phẩm</h2>
    <a class="btn-add" href="?act=admin/products/add">+ Thêm sản phẩm</a>
    <table>
        <thead>
            <tr>
                <th style="width:5%;">ID</th>
                <th style="width:20%;">Danh mục</th>
                <th style="width:35%;">Tên sản phẩm</th>
                <th style="width:15%;">Giá</th>
                <th style="width:15%;">Ảnh</th>
                <th style="width:10%;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= htmlspecialchars($product['ten_danh_muc'] ?? 'Chưa có') ?></td>
                    <td><?= htmlspecialchars($product['ten_san_pham']) ?></td>
                    <td><?= number_format($product['gia']) ?>đ</td>
                    <td><img src="uploads/<?= htmlspecialchars($product['hinh_anh']) ?>" width="50" alt="<?= htmlspecialchars($product['ten_san_pham']) ?>"></td>
                    <td>
                        <a class="btn" href="?act=admin/products/edit&id=<?= $product['id'] ?>">Sửa</a>
                        <p></p>


                        <a class="btn delete" href="?act=admin/products/delete&id=<?= $product['id'] ?>" onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>