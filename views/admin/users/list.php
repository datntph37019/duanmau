<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Danh sách người dùng</title>
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

        /* Các nút hành động */
        .actions a {
            color: #2c3e50;
            text-decoration: none;
            font-weight: 600;
            margin-right: 12px;
            padding: 6px 14px;
            border-radius: 6px;
            border: 1px solid transparent;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        /* Nút Xóa đỏ */
        .actions a.delete {
            background-color: #e74c3c;
            color: white;
            border-color: #e74c3c;
        }

        .actions a.delete:hover {
            background-color: #c0392b;
            border-color: #c0392b;
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h2>Danh sách người dùng</h2>
    <table>
        <thead>
            <tr>
                <th style="width:10%;">ID</th>
                <th style="width:45%;">Email</th>
                <th style="width:25%;">Quyền</th>
                <th style="width:20%;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td><?= htmlspecialchars($u['role']) ?></td>
                    <td class="actions">
                        <a href="?act=admin/users/delete&id=<?= $u['id'] ?>" class="delete" onclick="return confirm('Xóa người dùng này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>