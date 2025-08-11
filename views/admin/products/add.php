<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Thêm sản phẩm</title>
    <style>
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .add-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 900px;
            display: flex;
            padding: 30px 40px;
            box-sizing: border-box;
            gap: 40px;
        }

        form {
            flex: 1 1 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px 24px;
        }

        form label {
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
            display: block;
            font-size: 14px;
        }

        form input[type="text"],
        form input[type="number"],
        form select,
        form textarea,
        form input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
        }

        form textarea {
            resize: vertical;
            min-height: 70px;
            grid-column: span 2;
        }

        .buttons {
            grid-column: span 2;
            display: flex;
            gap: 12px;
            margin-top: 10px;
        }

        button {
            flex-grow: 1;
            background-color: #dae4b5ff;
            border: none;
            color: white;
            padding: 12px 0;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #dae4b5ff;
        }

        .cancel-link {
            flex-grow: 1;
            text-align: center;
            line-height: 38px;
            border: 1px solid #ccc;
            border-radius: 6px;
            text-decoration: none;
            color: #555;
            font-weight: 600;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .cancel-link:hover {
            background-color: #eee;
            color: #333;
        }

        .image-placeholder {
            flex: 0 0 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
            font-size: 14px;
            border: 1px dashed #ccc;
            border-radius: 8px;
            height: 200px;
            user-select: none;
        }
    </style>
</head>

<body>
    <div class="add-container">
        <form action="?act=admin/products/store" method="POST" enctype="multipart/form-data">
            <div>
                <label for="ten_san_pham">Tên sản phẩm:</label>
                <input type="text" id="ten_san_pham" name="ten_san_pham" required>
            </div>

            <div>
                <label for="gia">Giá:</label>
                <input type="number" id="gia" name="gia" required>
            </div>

            <div>
                <label for="id_danh_muc">Danh mục:</label>
                <select id="id_danh_muc" name="id_danh_muc" required>
                    <option value="">-- Chọn danh mục --</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>">
                            <?= htmlspecialchars($category['ten_danh_muc']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="hinh_anh">Hình ảnh:</label>
                <input type="file" id="hinh_anh" name="hinh_anh" accept="image/*" required>
            </div>

            <div style="grid-column: span 2;">
                <label for="mo_ta">Mô tả:</label>
                <textarea id="mo_ta" name="mo_ta"></textarea>
            </div>

            <div class="buttons" style="grid-column: span 2;">
                <button type="submit">Lưu</button>
                <a href="?act=admin/products" class="cancel-link">Hủy</a>
            </div>
        </form>

        <div class="image-placeholder">
            <span>Chưa có hình ảnh</span>
        </div>
    </div>
</body>

</html>