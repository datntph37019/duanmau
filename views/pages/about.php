<?php include PATH_ROOT . 'views/layouts/header.php'; ?>

<style>
    html,
    body {

        background-color: #e9e5e5ff;
    }

    .about-container {
        max-width: 700px;
        margin: 40px auto;
        padding: 25px;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 0;
        /* hình chữ nhật */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        font-family: Arial, sans-serif;
        line-height: 1.6;
    }

    .about-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #222;
        font-size: 22px;
        border-bottom: 2px solid #28a745;
        padding-bottom: 10px;
        display: inline-block;
    }

    .about-container p {
        margin-bottom: 15px;
        color: #444;
        font-size: 15px;
    }
</style>

<div class="about-container">
    <h2>Giới thiệu</h2>
    <p>Chào mừng bạn đến với website bán quần áo của chúng tôi!</p>
    <p>Chúng tôi cung cấp sản phẩm chất lượng cao, dịch vụ uy tín, giá cả hợp lý.</p>
</div>

<?php include PATH_ROOT . 'views/layouts/footer.php'; ?>