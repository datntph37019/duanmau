<?php include PATH_ROOT . 'views/layouts/header.php'; ?>

<style>
    html,
    body {

        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #e9e5e5ff;
        overflow-x: hidden;
    }

    .contact-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 25px;
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 0;
        /* bỏ bo tròn */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        font-family: Arial, sans-serif;
    }

    .contact-container h2 {
        text-align: center;
        margin-bottom: 0px;
        color: #222;
        font-weight: 600;
    }

    .contact-form label {
        display: block;
        margin-bottom: 6px;
        font-weight: 300;
        color: #444;
    }

    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 14px;
        border: 1px solid #bbb;
        border-radius: 0;
        /* ô nhập vuông vức */
        font-size: 15px;
        transition: border-color 0.2s;
    }

    .contact-form input:focus,
    .contact-form textarea:focus {
        border-color: #28a745;
        outline: none;
    }

    .contact-form button {
        width: 100%;
        padding: 12px;
        background: #28a745;
        color: #fff;
        font-size: 16px;
        border: none;
        border-radius: 0;
        /* nút vuông */
        cursor: pointer;
        transition: background 0.2s;
    }

    .contact-form button:hover {
        background: #218838;
    }
</style>

<div class="contact-container">

    <h2>Liên hệ với chúng tôi</h2>

    <form class="contact-form">
        <div>
            <label>Họ và tên</label>
            <input type="text" name="name" placeholder="Nhập họ và tên">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" placeholder="Nhập email">
        </div>
        <div>
            <label>Nội dung</label>
            <textarea name="message" rows="5" placeholder="Nhập nội dung cần liên hệ"></textarea>
        </div>
        <button type="submit">Gửi liên hệ</button>
    </form>
</div>

<?php include PATH_ROOT . 'views/layouts/footer.php'; ?>