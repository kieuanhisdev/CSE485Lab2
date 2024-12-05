<?php
require_once APP_ROOT . '/app/services/UserService.php';

class AuthController
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function showLoginForm()
    {
        include APP_ROOT . '/app/views/auth/login.php';
    }

    public function login()
    {
        session_start();
        $message = '';
        $messageType = 'danger';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (trim($_POST['username']) && trim($_POST['password'])) {
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                $existingUser = $this->userService->getUserByUsername($username);

                // Thêm kiểm tra để in ra giá trị của biến

                if (!$existingUser || !password_verify($password, $existingUser->getPassword())) {
                    $message = 'Tên tài khoản hoặc mật khẩu không đúng!';
                } else {
                    $existingUser->getRole() == 1 ? $_SESSION['admin'] = true : $_SESSION['user'] = true;
                    $message = 'Đăng nhập thành công!';
                    $messageType = 'success';
                }
            }
        }
        include APP_ROOT . '/app/views/auth/login.php';
    }
    public function showRegisterForm()
    {
        include APP_ROOT . '/app/views/auth/register.php';
    }

    public function register()
    {
        session_start();
        $message = '';
        $messageType = 'danger';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (trim($_POST['username']) && trim($_POST['password'])) {
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);

                $existingUser = $this->userService->getUserByUsername($username);
                if ($existingUser) {
                    $message = 'Tên đăng nhập đã tồn tại!';
                } else {
                    $user = new User($username, $password);
                    $this->userService->saveUser($user);
                    $message = 'Đăng ký thành công, vui lòng đăng nhập!';
                    $messageType = 'success';

                }
            }
        }
        include APP_ROOT . '/app/views/auth/register.php';
    }



    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php?controller=auth&action=showLoginForm');
        exit;
    }
}
