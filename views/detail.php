<?php include PATH_ROOT . 'views/layouts/header.php'; ?>

<?php if (!empty($product)): ?>
    <style>
        body {
            background-color: #f0efefff;
            /* xám nhạt */
        }

        .product-container {
            max-width: 1000px;
            margin: 60px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            overflow: hidden;
        }

        .product-image {
            flex: 1 1 45%;
            background: #f6f6f6;
            padding: 30px;
            text-align: center;
        }

        .product-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .product-info {
            flex: 1 1 55%;
            padding: 30px;
            background: #ffffff;
        }

        .product-info h1 {
            font-size: 28px;
            margin-bottom: 14px;
            color: #222;
        }

        .product-info .price {
            font-size: 22px;
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 16px;
        }

        .product-info .description {
            font-size: 16px;
            color: #444;
            margin-bottom: 24px;
        }

        .product-info .actions {
            display: flex;
            gap: 12px;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-back {
            background: #dae4b5ff;
            color: #333;
        }

        .btn-back:hover {
            background: #c9d8c3;
        }

        .btn-cart {
            background: #555353ff;
            color: white;
        }

        .btn-cart:hover {
            background: #dd6a3cff;
        }

        .alert-success {
            display: none;
            margin-top: 20px;
            padding: 12px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            border-radius: 6px;
        }
    </style>

    <div class="product-container">
        <div class="product-image">
            <img src="uploads/<?= htmlspecialchars($product['hinh_anh']) ?>" alt="<?= htmlspecialchars($product['ten_san_pham']) ?>">
        </div>
        <div class="product-info">
            <h1><?= htmlspecialchars($product['ten_san_pham']) ?></h1>
            <div class="price"><?= number_format($product['gia']) ?>đ</div>
            <p class="description"><?= nl2br(htmlspecialchars($product['mo_ta'] ?? 'Chưa có mô tả')) ?></p>

            <div class="actions">
                <a class="btn btn-back" href="?act=products">← Quay lại danh sách</a>
                <button class="btn btn-cart" onclick="addToCart()">🛒 Thêm vào giỏ hàng</button>
            </div>

            <div class="alert-success" id="cartAlert">✔️ Sản phẩm đã được thêm vào giỏ hàng!</div>
        </div>
    </div>

    <script>
        function addToCart() {
            // Gửi request AJAX đến server để thêm vào giỏ hàng
            // Ở đây làm đơn giản bằng cách hiển thị alert
            const alertBox = document.getElementById('cartAlert');
            alertBox.style.display = 'block';

            // Ẩn sau 3 giây
            setTimeout(() => {
                alertBox.style.display = 'none';
            }, 3000);
        }
    </script>

<?php else: ?>
    <p style="text-align:center; margin-top: 60px; font-size: 18px;">Không tìm thấy sản phẩm.</p>
<?php endif; ?>

<?php include PATH_ROOT . 'views/layouts/footer.php'; ?>