<?php
session_start(); // 1. Khởi tạo session

require_once('../app/config/config.php'); 
require_once APP_ROOT . '/app/libs/DBConnection.php'; 
require_once APP_ROOT . '/app/controllers/HomeController.php';
require_once APP_ROOT . '/app/controllers/BookController.php';
require_once APP_ROOT . '/app/controllers/AuthController.php'; // 2. Nạp AuthController

// 3. Mặc định mở web là vào thẳng trang Đăng nhập
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// 4. GÁC CỔNG BẢO MẬT: Chưa đăng nhập mà vào trang khác thì bị đẩy về trang Login
if (!isset($_SESSION['user']) && $controller !== 'auth') {
    header("Location: ?controller=auth&action=login");
    exit();
}

$authController = new AuthController();
$homeController = new HomeController();
$bookController = new BookController();

// 5. ĐIỀU HƯỚNG CHUẨN
if ($controller === 'auth') {
    switch ($action) {
        case 'login':
            $authController->login();
            break;
        case 'authenticate': // Xử lý submit form đăng nhập
            $authController->authenticate();
            break;
        case 'logout': // Đăng xuất
            $authController->logout();
            break;
        default:
            $authController->login();
            break;
    }
} else if ($controller === 'home') {
    $homeController->index();
} else if ($controller === 'book') {
    switch ($action) {
        case 'index':
            $bookController->index();
            break;
        case 'add':
            $bookController->add();
            break;
        case 'edit':
            $bookController->edit($id);
            break;
        case 'delete':
            $bookController->delete($id);
            break;
        default:
            $bookController->index();
            break;
    }
} else {
    $homeController->index();
}

// LUỒNG HOẠT ĐỘNG
// 1. Khi ng dùng ấn localhost/PHPMVCDemo/public mặc định nó sẽ nhảy vào file index.php
// 2. Trong file index.php nó sẽ nạp các hằng số như APP_ROOT, DOMAIN của file config.php và yêu cầu file DBConnection.php
// 3. Sau đó khi ng dùng ko gõ thêm gì sau ?controller mặc định sẽ nhảy vào home và yêu cầu file HomeController.php, rồi chạy function index trong class HomeController
// 4. Hàm index trong file HomeController.php yêu cầu file BookService.php
// 5. File BookService.php có tác dụng kết nối CSDL thông qua class DBConnection sau đó sẽ trả về 1 mảng books
// 6. Sau khi trả xong thì tại file HomeController.php lại yêu cầu file home/index.php
// 7. Cuối cùng là file home/index.php xuất ra giao diện cho ng dùng nhìn thấy
