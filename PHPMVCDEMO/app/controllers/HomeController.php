<?php

require_once APP_ROOT . '/app/services/BookService.php';

class HomeController
{
    public function index()
    // Gọi dữ liệu Sách
    {
        $books = [];
        $databaseError = null;

        try {
            $bookService = new BookService();
            $books = $bookService->getAllBooks();
        } catch (PDOException $e) {
            error_log('Unable to load books: ' . $e->getMessage());
            $databaseError = 'Không thể kết nối hoặc đọc dữ liệu từ CSDL. Hãy kiểm tra MySQL trong XAMPP và cấu hình kết nối.';
        }

        include APP_ROOT . '/app/views/home/index.php';
    }
}

// tức là folder này khi ng dùng ấn vào chức năng nào trên web thì nó sẽ điều phối đến đúng file đó
