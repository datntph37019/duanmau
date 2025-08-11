<?php
class ProductController
{
    private $productModel;
    private $categoryModel;


    public function __construct()
    {
        require_once __DIR__ . '/../models/ProductModel.php';
        require_once __DIR__ . '/../models/CategoriesModel.php';
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoriesModel();
    }

    public function index()
    {
        $categoryId = $_GET['category_id'] ?? null;
        if ($categoryId && is_numeric($categoryId)) {
            $products = $this->productModel->getByCategory($categoryId);
        } else {
            $products = $this->productModel->getAll();
        }

        $categories = $this->categoryModel->getAll();

        require_once __DIR__ . '/../views/list.php';
    }

    public function detail()
    {
        $id = $_GET['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            header('Location: index.php?act=products');
            exit;
        }

        $product = $this->productModel->findById($id);

        include PATH_ROOT . 'views/detail.php';
    }
}
