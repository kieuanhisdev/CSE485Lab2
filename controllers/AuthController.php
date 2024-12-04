<?php
require_once 'models/User.php';

class AuthController
{
    public function showLoginForm()
    {
        include 'views/auth/login.php';
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = User::findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header('Location: index.php');
        } else {
            $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
            include 'views/auth/login.php';
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php?controller=auth&action=showLoginForm');
    }
}
?>