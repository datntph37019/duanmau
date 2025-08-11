<?php include PATH_ROOT . 'views/layouts/header.php'; ?>

<style>
    html,
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
        overflow-x: hidden;
    }

    h2 {
        text-align: center;
        color: #2c3e50;
        margin-top: 40px;
        font-size: 28px;
        font-weight: 700;
    }

    .category-filter {
        max-width: 1200px;
        margin: 20px auto 0 auto;
        padding: 0 20px;
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .category-filter a {
        padding: 10px 18px;
        background-color: #a8b0b8ff;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .category-filter a:hover,
    .category-filter a.active {
        background-color: #59656dff;
    }

    .products-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        padding: 30px 20px;
        max-width: 1200px;
        margin: 0 auto 60px auto;
    }

    .product-item {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 15px;
    }

    .product-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .product-item img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 12px;
    }

    .product-info {
        text-align: center;
        width: 100%;
    }

    .product-info h3 {
        font-size: 16px;
        margin: 0 0 8px;
        color: #343a40;
        font-weight: 600;
    }

    .product-info p.price {
        font-size: 15px;
        font-weight: 700;
        color: #e63946;
        margin: 0 0 12px;
    }

    .btn-detail {
        display: inline-block;
        padding: 8px 14px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 14px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-detail:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }
</style>

<h2>



</h2>
<h3>d</h3>

<div class="category-filter">
    <a href="?act=products" class="<?= !isset($_GET['category_id']) ? 'active' : '' ?>">Tất cả</a>
    <?php foreach ($categories as $cat): ?>
        <a href="?act=products&category_id=<?= $cat['id'] ?>" class="<?= (isset($_GET['category_id']) && $_GET['category_id'] == $cat['id']) ? 'active' : '' ?>">
            <?= htmlspecialchars($cat['ten_danh_muc']) ?>
        </a>
    <?php endforeach; ?>
</div>

<div class="products-container">
    <?php foreach ($products as $product): ?>
        <div class="product-item">
            <?php if (!empty($product['hinh_anh'])): ?>
                <img src="uploads/<?= htmlspecialchars($product['hinh_anh']) ?>" alt="<?= htmlspecialchars($product['ten_san_pham']) ?>">
            <?php endif; ?>
            <div class="product-info">
                <h3><?= htmlspecialchars($product['ten_san_pham']) ?></h3>
                <p class="price"><?= number_format($product['gia']) ?>đ</p>
                <a class="btn-detail" href="?act=product/detail&id=<?= $product['id'] ?>">Xem chi tiết</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include PATH_ROOT . 'views/layouts/footer.php'; ?>