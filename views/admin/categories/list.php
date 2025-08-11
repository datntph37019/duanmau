<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Danh sách danh mục</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            margin: 40px;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
            color: #2c3e50;
        }

        .btn-add {
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

        .btn-add:hover {
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
        }

        thead tr {
            background-color: #dae4b5ff;
            color: white;
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
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .actions a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
            margin-right: 12px;
            transition: color 0.3s ease;
        }

        .actions a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .actions a.delete {
            color: #e74c3c;
        }

        .actions a.delete:hover {
            color: #e74c3c;
        }
    </style>
</head>

<body>
    <h1>Danh sách danh mục</h1>
    <a href="index.php?act=admin/categories/add" class="btn-add">+ Thêm danh mục</a>

    <table>
        <thead>
            <tr>
                <th style="width: 10%;">ID</th>
                <th style="width: 70%;">Tên danh mục</th>
                <th style="width: 20%;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $cat): ?>
                <tr>
                    <td><?= $cat['id'] ?></td>
                    <td><?= htmlspecialchars($cat['ten_danh_muc']) ?></td>
                    <td class="actions">
                        <a href="index.php?act=admin/categories/edit&id=<?= $cat['id'] ?>">Sửa</a>
                        <a href="index.php?act=admin/categories/delete&id=<?= $cat['id'] ?>" class="delete" onclick="return confirm('Xóa danh mục này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>