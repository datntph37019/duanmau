<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Thêm danh mục</title>
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

        form {
            max-width: 480px;
            margin: 0 auto;
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgb(0 0 0 / 0.1);
            box-sizing: border-box;
        }

        label {
            display: block;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            font-size: 14px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 20px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #a8b0b8ff;
            outline: none;
            box-shadow: 0 0 5px #a8b0b8ff;
        }

        .btn-submit {
            width: 100%;
            background-color: #a8b0b8ff;
            color: white;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 15px;
        }

        .btn-submit:hover {
            background-color: #ced6ddff;
        }

        .btn-cancel {
            display: inline-block;
            text-align: center;
            width: 94%;
            padding: 12px;
            border-radius: 8px;
            background-color: #eee;
            color: #333;
            text-decoration: none;
            font-weight: 600;
            border: 1px solid #ccc;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-cancel:hover {
            background-color: #d3d9de;
            color: #2c3e50;
        }
    </style>
</head>

<body>
    <h1>Thêm danh mục</h1>
    <form method="POST" action="index.php?act=admin/categories/add">
        <label for="ten_danh_muc">Tên danh mục:</label>
        <input
            type="text"
            name="ten_danh_muc"
            id="ten_danh_muc"
            value="<?= isset($_POST['ten_danh_muc']) ? htmlspecialchars($_POST['ten_danh_muc']) : '' ?>"
            required>

        <button type="submit" class="btn-submit">Lưu </button>
        <a href="index.php?act=admin/categories" class="btn-cancel">Quay lại</a>
    </form>
</body>

</html>