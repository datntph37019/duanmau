<?php
// File: controllers/admin/ProductsController.php
require_once './models/ProductsModel.php';
require_once './models/CategoriesModel.php'; // để lấy danh mục

class ProductsController
{
    private $productModel;
    private $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductsModel();
        $this->categoryModel = new CategoriesModel();
    }

    public function index()
    {
        $products = $this->productModel->getAllWithCategory(); // sửa model lấy kèm danh mục
        $viewFile = './views/admin/products/list.php';
        include './views/admin/layout.php';
    }

    public function add()
    {
        $categories = $this->categoryModel->getAll(); // lấy danh sách danh mục để chọn
        $viewFile = './views/admin/products/add.php';
        include './views/admin/layout.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['ten_san_pham'] ?? '';
            $description = $_POST['mo_ta'] ?? '';
            $price = $_POST['gia'] ?? 0;
            $categoryId = $_POST['id_danh_muc'] ?? null; // thêm dòng này
            $image = $_FILES['hinh_anh']['name'] ?? '';

            if ($image) {
                $target = 'uploads/' . basename($image);
                move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target);
            }

            $this->productModel->insert($name, $description, $price, $image, $categoryId); // sửa lại
            header('Location: index.php?act=admin/products');
            exit;
        }
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) die('Không tìm thấy sản phẩm');

        $product = $this->productModel->getById($id);
        $categories = $this->categoryModel->getAll(); // lấy danh mục để select
        $viewFile = './views/admin/products/edit.php';
        include './views/admin/layout.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $name = $_POST['ten_san_pham'] ?? '';
            $description = $_POST['mo_ta'] ?? '';
            $price = $_POST['gia'] ?? 0;
            $categoryId = $_POST['id_danh_muc'] ?? null; // thêm
            $oldImage = $_POST['hinh_anh_old'] ?? '';

            if ($_FILES['hinh_anh']['size'] > 0) {
                $image = $_FILES['hinh_anh']['name'];
                $target = 'uploads/' . basename($image);
                move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target);
            } else {
                $image = $oldImage;
            }

            $this->productModel->update($id, $name, $description, $price, $image, $categoryId); // sửa lại
            header('Location: index.php?act=admin/products');
            exit;
        }
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->productModel->delete($id);
        }
        header('Location: index.php?act=admin/products');
        exit;
    }
}
