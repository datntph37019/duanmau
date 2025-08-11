<?php
// File: controllers/admin/CategoriesController.php
require_once './models/CategoriesModel.php';

class CategoriesController
{
    private $model;

    public function __construct()
    {
        $this->model = new CategoriesModel();
    }

    public function index()
    {
        $categories = $this->model->getAll();
        $viewFile = 'views/admin/categories/list.php';
        include './views/admin/layout.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_danh_muc = trim($_POST['ten_danh_muc'] ?? '');

            if (!empty($ten_danh_muc)) {
                $model = new CategoriesModel();
                $model->insert($ten_danh_muc);

                header('Location: index.php?act=admin/categories');
                exit;
            } else {
                $error = "Tên danh mục không được để trống";
            }
        }

        $viewFile = 'views/admin/categories/add.php';
        include 'views/admin/layout.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_danh_muc = $_POST['ten_danh_muc'] ?? '';
            $this->model->insert($ten_danh_muc);
        }
        header('Location: index.php?act=admin/categories');
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: index.php?act=admin/categories');
            exit;
        }

        $category = $this->model->getById($id);
        if (!$category) {
            echo "Danh mục không tồn tại!";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_danh_muc = trim($_POST['ten_danh_muc'] ?? '');

            if (!empty($ten_danh_muc)) {
                $this->model->update($id, $ten_danh_muc);
                header('Location: index.php?act=admin/categories');
                exit;
            } else {
                $error = "Tên danh mục không được để trống";
            }
        }

        $viewFile = 'views/admin/categories/edit.php';
        include './views/admin/layout.php';
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->delete($id);
        }
        header('Location: index.php?act=admin/categories');
        exit;
    }
}
