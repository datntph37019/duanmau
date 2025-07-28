<?php include PATH_ROOT . 'views/layouts/header.php'; ?>

<h2>Danh sách sản phẩm</h2>

<?php foreach ($products as $product): ?>
    <div class="product-item" style="border:1px solid #ccc; margin:10px; padding:10px;">
        <h3><?= $product['ten_san_pham'] ?></h3>
        <p><?= $product['mo_ta'] ?></p>
        <p>Giá: <?= number_format($product['gia']) ?>đ</p>
        <?php if (!empty($product['hinh_anh'])): ?>
            <img src="uploads/<?= $product['hinh_anh'] ?>" alt="<?= $product['ten_san_pham'] ?>" width="150">
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<?php include PATH_ROOT . 'views/layouts/footer.php'; ?>