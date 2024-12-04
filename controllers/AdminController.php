<?php
class AdminController {
    // Tên đăng nhập và mật khẩu tĩnh
    private $adminUsername = 'admin';
    private $adminPassword = '123456';

    // Hiển thị trang đăng nhập
    public function login() {
        include 'views/admin/login.php';
    }

    // Xử lý đăng nhập
    public function handleLogin() {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === $this->adminUsername && $password === $this->adminPassword) {
            $_SESSION['admin'] = $username;
            header('Location: index.php?controller=admin&action=dashboard');
            exit();
        } else {
            $_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu không đúng.';
            header('Location: index.php?controller=admin&action=login');
            exit();
        }
    }

    // Trang dashboard sau khi đăng nhập
    public function dashboard() {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?controller=admin&action=login');
            exit();
        }
        include 'views/admin/dashboard.php';
    }

    // Đăng xuất
    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?controller=admin&action=login');
        exit();
    }
}
?>
