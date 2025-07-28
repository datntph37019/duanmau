<<<<<<< HEAD
<?php 
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class ProductModel 
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách sản phẩm 
    public function getAllProduct()
    {
        
    }
}
=======
 <!-- <php  -->
 <!-- // Có class chứa các function thực thi tương tác với cơ sở dữ liệu
  class ProductModel
  {
  public $conn;
  public function __construct()
  {
  $this->conn = connectDB();
  }

  Viết truy vấn danh sách sản phẩm
  public function getAllProduct()
  {

  }
  } -->

 <?php
    require_once 'Connect.php';

    class ProductModel
    {
        public static function getAllProducts()
        {
            $conn = Connect::getInstance();
            $sql = "SELECT * FROM san_pham";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
>>>>>>> afa8dee (Initial commit)
