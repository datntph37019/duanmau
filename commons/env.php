<<<<<<< HEAD
<?php 
=======
<?php
>>>>>>> afa8dee (Initial commit)

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

<<<<<<< HEAD
define('BASE_URL'       , 'http://localhost/duanmau/mvc-oop-basic/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'database');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
=======
define('BASE_URL', 'http://localhost/duanmau/mvc-oop-basic/');

define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'shop_quan_ao');  // Tên database

// define('PATH_ROOT', __DIR__ . '/../');
define('PATH_ROOT', realpath(__DIR__ . '/../') . '/');
>>>>>>> afa8dee (Initial commit)
