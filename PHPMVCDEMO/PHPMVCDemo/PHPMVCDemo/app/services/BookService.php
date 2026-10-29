<?php

require_once APP_ROOT . '/app/models/books.php';

class BookService
{
    public function getAllBooks()
    {
        $books = [];
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $sql = "SELECT * FROM sach";
                $stmt = $conn->query($sql);

                while ($row = $stmt->fetch()) {
                    $book = new Book(
                        $row['MaSach'],
                        $row['TenSach'],
                        $row['TacGia'],
                        $row['NhaXuatBan'],
                        $row['SoLuongTon']
                    );
                    $books[] = $book;
                }
            }
        }

        return $books;
    }

    public function addBook(Book $book)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $MaSach = $book->get_MaSach();
                $TenSach = $book->get_TenSach();
                $TacGia = $book->get_TacGia();
                $NhaXuatBan = $book->get_NhaXuatBan();
                $GiaBan = $book->get_GiaBan();
                $SoLuongTon = $book->get_SoLuongTon();
                $sql = "INSERT INTO sach (MaSach, TenSach, TacGia, NhaXuatBan, SoLuongTon) VALUES ('$MaSach', '$TenSach', '$TacGia', '$NhaXuatBan', '$SoLuongTon')";
                $conn->exec($sql);
            }
        }
    }

    public function getBookById($MaSach)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $sql = "SELECT * FROM sach WHERE MaSach = '$MaSach'";
                $stmt = $conn->query($sql);
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch();
                    $book = new Book($row['MaSach'], $row['TenSach'], $row['TacGia'], $row['NhaXuatBan'], $row['SoLuongTon']);
                    return $book;
                }
            }
        }
    }

    public function updateBook(Book $book)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $MaSach = $book->get_MaSach();
                $TenSach = $book->get_TenSach();
                $TacGia = $book->get_TacGia();
                $NhaXuatBan = $book->get_NhaXuatBan();
                $SoLuongTon = $book->get_SoLuongTon();
                $sql = "UPDATE sach SET TenSach = '$TenSach', TacGia = '$TacGia', NhaXuatBan = '$NhaXuatBan', SoLuongTon = '$SoLuongTon' WHERE MaSach = '$MaSach'";

                $conn->exec($sql);
            }
        }
    }

    public function deleteBook($MaSach)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $sql = "DELETE FROM sach WHERE MaSach = '$MaSach'";
                $conn->exec($sql);
            }
        }
    }
}
