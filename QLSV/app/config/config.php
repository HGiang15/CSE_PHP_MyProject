<?php
// đi từ config.php ra EXAM đi lại 3 lần tù thư mục hiện tại lên thư mục cha
define('APP_ROOT', dirname(__FILE__, 3));

// đường dẫn tuyệt đối APPROOT ko điều hướng liên kết web chuyển trang được
// define('DOMAIN', 'http://localhost/exam/');

define('DB_HOST', 'localhost');
define('DB_PORT', '3307');
define('DB_NAME', 'quanlysinhvien');
define('DB_USER', 'root');
define('DB_PASS', '123');



?>