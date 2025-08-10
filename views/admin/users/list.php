<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Tiêu đề */
        h2 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }

        /* Bảng danh sách */
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 14px;
            background-color: #fff;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        table th {
            background-color: #2c3e50;
            color: white;
            padding: 10px;
            text-align: left;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        /* Hover trên dòng */
        table tr:hover {
            background-color: #f5f5f5;
        }

        /* Nút hành động */
        table a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 13px;
        }

        table a[href*="edit"] {
            background-color: #3498db;
            color: white;
        }

        table a[href*="delete"] {
            background-color: #e74c3c;
            color: white;
        }

        table a:hover {
            opacity: 0.85;
        }
    </style>
</head>

<body>
    <h2>Danh sách người dùng</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Quyền</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= $u['role'] ?></td>
                <td>
                    <a href="?act=admin/users/delete&id=<?= $u['id'] ?>" onclick="return confirm('Xóa người dùng này?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>