<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Trang quản trị</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .admin-menu {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        .admin-menu a {
            display: block;
            padding: 15px 25px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .admin-menu a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Trang Quản Trị</h1>
    <div class="admin-menu">
        <a href="?act=admin/products">Sản phẩm</a>
        <a href="?act=admin/users">Người dùng</a>
        <a href="?act=admin/categories">Danh mục</a>
    </div>
</body>

</html>