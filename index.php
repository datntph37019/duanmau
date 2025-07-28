<<<<<<< HEAD
<?php 
=======
<?php
>>>>>>> afa8dee (Initial commit)
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ProductController.php';

// Require toàn bộ file Models
require_once './models/ProductModel.php';

// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
<<<<<<< HEAD
    '/'=>(new ProductController())->Home(),

};
=======
    '/' => (new ProductController())->Home(),
    // '/admin' => (new ProductController())->admin(),
    '/products'     => (new ProductController())->list(),
    '/detail'       => (new ProductController())->detail(),
    '/about'        => (new PageController())->about(),
    '/contact'      => (new PageController())->contact(),
    '/login'        => (new AuthController())->login(),
    '/register'     => (new AuthController())->register(),
};
>>>>>>> afa8dee (Initial commit)
