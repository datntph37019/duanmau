<?php
// có class chứa các function thực thi xử lý logic 
class ProductController
{
<<<<<<< HEAD
    public $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
    }

    public function Home()
    {
        $title = "Đây là trang chủ nhé hahaa";
        $thoiTiet = "Hôm nay trời có vẻ là mưa";
        require_once './views/trangchu.php';
=======
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
>>>>>>> afa8dee (Initial commit)
    }
}
