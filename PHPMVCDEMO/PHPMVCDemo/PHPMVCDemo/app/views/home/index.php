<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
        <h3 class="text-center text-uppercase text-success mt-3 mb-3">Quản lý sách</h3>
        <a href="?controller=addBook" class="btn btn-success">Thêm sách</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã sách</th>
                    <th scope="col">Tên sách</th>
                    <th scope="col">Tác giả</th>
                    <th scope="col">Nhà xuất bản</th>
                    <th scope="col">Số lượng tồn</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($books)) {
                    foreach ($books as $book) {
                ?>
                        <tr>
                            <th scope="row"><?= $book->get_MaSach(); ?></th>
                            <td><?= $book->get_TenSach(); ?></td>
                            <td><?= $book->get_TacGia(); ?></td>
                            <td><?= $book->get_NhaXuatBan(); ?></td>
                            <td><?= $book->get_SoLuongTon(); ?></td>
                            <td>
                                <a href="?controller=editBook&id=<?= $book->get_MaSach() ?>">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <a href="?controller=deleteBook&id=<?= $book->get_MaSach() ?>">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>