<?php

require_once APP_ROOT . '/app/services/BookService.php';

class BookController
{
    public function add()
    {
        include_once APP_ROOT . '/app/views/book/add.php';
    }

    public function store()
    {
        $MaSach = $_POST['MaSach'];
        $TenSach = $_POST['TenSach'];
        $TacGia = $_POST['TacGia'];
        $NhaXuatBan = $_POST['NhaXuatBan'];
        $SoLuongTon = $_POST['SoLuongTon'];

        $book = new Book($MaSach, $TenSach, $TacGia, $NhaXuatBan, $SoLuongTon);

        $bookService = new BookService();
        $bookService->addBook($book);

        header('Location: ?controller=home');
    }

    public function edit($MaSach)
    {
        if (isset($MaSach)) {
            $bookService = new BookService();
            $book = $bookService->getBookById($MaSach);

            include APP_ROOT . '/app/views/book/edit.php';
        } else {
            echo 'Id is null';
        }
    }

    public function update($MaSach)
    {
        $MaSach = $_POST['MaSach'];
        $TenSach = $_POST['TenSach'];
        $TacGia = $_POST['TacGia'];
        $NhaXuatBan = $_POST['NhaXuatBan'];
        $SoLuongTon = $_POST['SoLuongTon'];

        $book_new = new Book($MaSach, $TenSach, $TacGia, $NhaXuatBan, $SoLuongTon);
        $bookService = new BookService();
        $bookService->updateBook($book_new);
        header('Location: ?controller=home');
    }

    public function delete($MaSach)
    {
        if (isset($MaSach)) {
            $bookService = new BookService();
            $book = $bookService->getBookById($MaSach);

            include APP_ROOT . '/app/views/book/delete.php';
        } else {
            echo 'Id is null';
        }
    }

    public function destroy($MaSach)
    {
        $bookService = new BookService();
        $bookService->deleteBook($MaSach);
        header('Location: ?controller=home');
    }
}
