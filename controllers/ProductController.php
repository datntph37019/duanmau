<?php
// có class chứa các function thực thi xử lý logic 
class ProductController
{


    // public $modelProduct;

    // public function __construct()
    // {
    //     $this->modelProduct = new ProductModel();
    // }

    // public function Home()
    // {
    //     $title = "Đây là a";
    //     $thoiTiet = "Hôm nay trời có vẻ là mưa";
    //     require_once './views/trangchu.php';
    // }

    public function home()
    {
        // include PATH_ROOT . './';
        require_once PATH_ROOT . 'views/home.php';
    }

    public function admin()
    {
        // include PATH_ROOT . 'views/admin.php';
        require_once PATH_ROOT . 'views/admin.php';
    }
    public function list()
    {
        $products = ProductModel::getAllProducts();
        require_once PATH_ROOT . 'views/products/list.php';
    }

    public function detail()
    {
        require_once PATH_ROOT . 'views/products/detail.php';
    }
    public function index()
    {
        $keyword = $_GET['keyword'] ?? '';
        $products = ProductModel::getAll($keyword);
        include './views/products/list.php';
    }

    public function create()
    {
        include './views/products/add.php';
    }

    public function store()
    {
        $ten = $_POST['ten_san_pham'];
        $mo_ta = $_POST['mo_ta'];
        $gia = $_POST['gia'];
        $hinh_anh = '';

        if ($_FILES['hinh_anh']['name']) {
            $hinh_anh = time() . '-' . $_FILES['hinh_anh']['name'];
            move_uploaded_file($_FILES['hinh_anh']['tmp_name'], './uploads/' . $hinh_anh);
        }

        ProductModel::insert($ten, $mo_ta, $gia, $hinh_anh);
        header("Location: index.php?act=/product");
    }

    public function edit()
    {
        $id = $_GET['id'];
        $product = ProductModel::find($id);
        include './views/products/edit.php';
    }

    public function update()
    {
        $id = $_GET['id'];
        $ten = $_POST['ten_san_pham'];
        $mo_ta = $_POST['mo_ta'];
        $gia = $_POST['gia'];
        $hinh_anh = null;

        if ($_FILES['hinh_anh']['name']) {
            $hinh_anh = time() . '-' . $_FILES['hinh_anh']['name'];
            move_uploaded_file($_FILES['hinh_anh']['tmp_name'], './uploads/' . $hinh_anh);
        }

        ProductModel::update($id, $ten, $mo_ta, $gia, $hinh_anh);
        header("Location: index.php?act=/product");
    }

    public function delete()
    {
        $id = $_GET['id'];
        ProductModel::delete($id);
        header("Location: index.php?act=/product");
    }
}
