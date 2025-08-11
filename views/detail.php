<?php include PATH_ROOT . 'views/layouts/header.php'; ?>

<?php if (!empty($product)): ?>
    <style>
        .product-detail {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(51, 51, 51, 0.1);
            display: flex;
            flex-wrap: wrap;
            overflow: hidden;
        }

        .product-detail img {
            width: 100%;
            max-width: 400px;
            height: auto;
            object-fit: contain;
            background: #f9f9f9;
            padding: 20px;
        }

        .product-info {
            flex: 1;
            padding: 30px;
            background: #ffffff;
        }

        .product-info h1 {
            font-size: 24px;
            margin-bottom: 16px;
            color: #464646ff;
        }

        .product-info .price {
            font-size: 20px;
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .product-info p.description {
            font-size: 16px;
            line-height: 1.6;
            color: #353535ff;
            margin-bottom: 20px;
        }

        .product-info .btn-back {
            display: inline-block;
            padding: 10px 18px;
            background-color: #dae4b5ff;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .product-info .btn-back:hover {
            background-color: #dae4b5ff;
        }
    </style>

    <div class="product-detail">
        <?php if (!empty($product['hinh_anh'])): ?>
            <img src="uploads/<?= htmlspecialchars($product['hinh_anh']) ?>" alt="<?= htmlspecialchars($product['ten_san_pham']) ?>">
        <?php endif; ?>

        <div class="product-info">
            <h1><?= htmlspecialchars($product['ten_san_pham']) ?></h1>
            <div class="price"><?= number_format($product['gia']) ?>đ</div>
            <p class="description">
                <?= !empty($product['mo_ta']) ? nl2br(htmlspecialchars($product['mo_ta'])) : 'Chưa có mô tả cho sản phẩm này.' ?>
            </p>
            <a class="btn-back" href="?act=products">← Quay lại danh sách</a>
        </div>
    </div>

<?php else: ?>
    <p style="text-align:center; margin-top: 60px; font-size: 18px;">Không tìm thấy sản phẩm.</p>
<?php endif; ?>

<?php include PATH_ROOT . 'views/layouts/footer.php'; ?>