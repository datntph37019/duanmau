<?php
class ProductController
{
    public function index()
    {
        // Gọi model để lấy dữ liệu sản phẩm
        require_once __DIR__ . '/../models/ProductModel.php';
        $model = new ProductModel();
        $products = $model->getAll();

        // Load view hiển thị sản phẩm cho user
        require_once __DIR__ . '/../views/list.php';
    }

    public function detail($id)
    {
        require_once __DIR__ . '/../models/ProductModel.php';
        $model = new ProductModel();
        $product = $model->getById($id);

        if (!$product) {
            echo "Sản phẩm không tồn tại!";
            exit;
        }

        require_once __DIR__ . '/../views/detail.php';
    }
}
