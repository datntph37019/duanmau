<?php

// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/AdminProductController.php';
require_once './controllers/UserController.php';
require_once './controllers/ProductController.php';
require_once './controllers/ContactController.php';
require_once './controllers/AboutController.php';






//controller/admin/...
require_once './controllers/admin/DashboardController.php';
require_once './controllers/admin/ProductsController.php';
require_once './controllers/admin/UsersController.php';
require_once './controllers/admin/CategoriesController.php';






// Require toàn bộ file Models

require_once './models/ProductModel.php';
require_once './models/UserModel.php';
require_once './models/ProductsModel.php';
require_once './models/UsersModel.php';
require_once './models/CategoriesModel.php';



// Route
$act = $_GET['act'] ?? '/home';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    'home' => (new HomeController())->index(),
    'products' => (new ProductController())->index(),
    'product/detail' => (new ProductController())->detail(),
    'contact' => (new ContactController())->index(),
    'about' => (new AboutController())->index(),




    //dangki, dangnhhap
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

    // Quản lý người dùng (Admin)
    'admin/users' => (new UsersController())->index(),
    'admin/users/store' => (new UsersController())->store(),
    'admin/users/delete' => (new UsersController())->delete(),

    // danh mcuj
    'admin/categories' => (new CategoriesController())->index(),
    'admin/categories/add' => (new CategoriesController())->add(),
    'admin/categories/store' => (new CategoriesController())->store(),
    'admin/categories/edit' => (new CategoriesController())->edit(),
    'admin/categories/delete' => (new CategoriesController())->delete(),




    // Dashboard (Admin) — chặn ngay tại đây
    'admin' => (function () {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (empty($_SESSION['user'])) {
            header("Location: index.php?act=login");
            exit();
        }

        if (strtolower(trim($_SESSION['user']['role'] ?? '')) !== 'admin') {
            http_response_code(403);
            echo "<div style='
            font-family: Arial, sans-serif;
            background: #fff3f3;
            color: #d8000c;
            padding: 15px;
            margin: 20px auto;
            max-width: 600px;
            border: 1px solid #d8000c;
            border-radius: 8px;
            text-align: center;
        '>
            <h2>🚫 Truy cập bị từ chối</h2>
            <p>Bạn không có quyền truy cập vào khu vực quản trị.</p>
            <a href='index.php?act=home' style='
                display:inline-block;
                margin-top: 12px;
                background: #d8000c;
                color: white;
                padding: 8px 14px;
                border-radius: 6px;
                text-decoration: none;
            '>Quay về trang chủ</a>
        </div>";
            exit();
        }

        (new DashboardController())->index();
    })(),

    'admin/dashboard' => (function () {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (empty($_SESSION['user'])) {
            header("Location: index.php?act=login");
            exit();
        }

        if (strtolower(trim($_SESSION['user']['role'] ?? '')) !== 'admin') {
            http_response_code(403);
            echo "<div style='
            font-family: Arial, sans-serif;
            background: #fff3f3;
            color: #d8000c;
            padding: 15px;
            margin: 20px auto;
            max-width: 600px;
            border: 1px solid #d8000c;
            border-radius: 8px;
            text-align: center;
        '>
            <h2>🚫 Truy cập bị từ chối</h2>
            <p>Bạn không có quyền truy cập vào khu vực quản trị.</p>
            <a href='index.php?act=home' style='
                display:inline-block;
                margin-top: 12px;
                background: #d8000c;
                color: white;
                padding: 8px 14px;
                border-radius: 6px;
                text-decoration: none;
            '>Quay về trang chủ</a>
        </div>";
            exit();
        }

        (new DashboardController())->index();
    })(),
};
