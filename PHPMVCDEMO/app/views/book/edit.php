<?php

/** @var Patient $patient */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sách</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        form {
            width: 30%;
            margin: auto;
        }

        button {
            margin-top: 10px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 class="text-center text-uppercase text-success mt-3 mb-3">Chỉnh sửa sách</h3>
        <form action="?controller=editBook&id=<?= $book->get_MaSach() ?>" method="post">
            <div class="mb-3">
                <label for="MaSach" class="form-label">Mã sách</label>
                <input type="text" class="form-control" id="MaSach" name="MaSach" value="<?= $book->get_MaSach(); ?>" readonly>
            </div>
   
            <div class="mb-3">
                <label for="TenSach" class="form-label">Tên sách</label>
                <input type="text" class="form-control" id="TenSach" name="TenSach" value="<?= $book->get_TenSach(); ?>">
            </div>

            <div class="mb-3">
                <label for="TacGia" class="form-label">Tác giả</label>
                <input type="text" class="form-control" id="TacGia" name="TacGia" value="<?= $book->get_TacGia(); ?>">
            </div>

            <div class="mb-3">
                <label for="NhaXuatBan" class="form-label">Nhà xuất bản</label>
                <input type="text" class="form-control" id="NhaXuatBan" name="NhaXuatBan" value="<?= $book->get_NhaXuatBan(); ?>">
            </div>

            <div class="mb-3">
                <label for="SoLuongTon" class="form-label">Số lượng tồn</label>
                <input type="text" class="form-control" id="SoLuongTon" name="SoLuongTon" value="<?= $book->get_SoLuongTon(); ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="btn_update">Cập nhật</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>