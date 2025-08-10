<?php

// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/ProductController.php';
require_once './controllers/UserController.php';
require_once './controllers/admin/DashboardController.php';
require_once './controllers/admin/ProductsController.php';




// Require toàn bộ file Models
require_once './models/ProductModel.php';
require_once './models/UserModel.php';
require_once './models/ProductsModel.php';

// Route
$act = $_GET['act'] ?? '/home';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ



    //dangki, dangnhhap
    'home' => (new HomeController())->index(),
    'register' => (new UserController())->showRegisterForm(),
    'register-submit' => (new UserController())->registerSubmit(),
    'login' => (new UserController())->showLoginForm(),
    'login-submit' => (new UserController())->loginSubmit(),
    'logout' => (new UserController())->logout(),

    // Quản lý sản phẩm (Admin)
    'admin/products' => (new ProductsController())->index(),
    'admin/products/add' => (new ProductsController())->add(),
    'admin/products/store' => (new ProductsController())->store(),
    'admin/products/edit' => (new ProductsController())->edit(),
    'admin/products/update' => (new ProductsController())->update(),
    'admin/products/delete' => (new ProductsController())->delete(),

    // Dashboard (Admin)
    'admin' => (new DashboardController())->adminHome(),
};
