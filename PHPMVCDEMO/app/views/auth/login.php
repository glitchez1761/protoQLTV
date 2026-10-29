<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Hệ thống Thư viện</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card-login {
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card card-login bg-white p-4">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-primary">THƯ VIỆN BÁCH KHÓA</h3>
                        <p class="text-muted small">Đăng nhập để vào hệ thống quản lý</p>
                    </div>

                    <!-- Hiển thị thông báo nếu đăng nhập sai -->
                    <?php if (isset($errorMessage)): ?>
                        <div class="alert alert-danger py-2 text-center small" role="alert">
                            <?= htmlspecialchars($errorMessage) ?>
                        </div>
                    <?php endif; ?>

                    <!-- Form gửi thông tin sang action=authenticate -->
                    <form action="?controller=auth&action=authenticate" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tên đăng nhập</label>
                            <input type="text" name="username" class="form-control" required autofocus placeholder="Nhập admin">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" required placeholder="Nhập admin">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold mt-2">
                            Đăng nhập
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>