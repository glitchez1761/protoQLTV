<?php

class AuthController
{
    public function login()
    {
        include_once APP_ROOT . '/app/views/auth/login.php';
    }

    public function authenticate()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username === 'admin' && $password === 'admin') {
            // LƯU SESSION để router biết đã đăng nhập thành công
            $_SESSION['user'] = $username;

            header('Location: ?controller=home');
            exit();
        } else {
            $errorMessage = 'Tên đăng nhập hoặc mật khẩu không đúng.';
            include_once APP_ROOT . '/app/views/auth/login.php';
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: ?controller=auth&action=login');
        exit();
    }
}