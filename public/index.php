<?php
session_start();

require_once './controllers/AuthController.php';
require_once './controllers/UserController.php';
// Bao gồm các bộ điều khiển khác tại đây

if (!isset($_SESSION['user_id'])) {
    $controller = new AuthController();
    $controller->showLoginForm();
    exit;
}

$controller = $_GET['controller'] ?? 'user';
$action = $_GET['action'] ?? 'index';

switch ($controller) {
    case 'user':
        $controller = new UserController();
        break;
    case 'auth':
        $controller = new AuthController();
        break;
    // Thêm các bộ điều khiển khác tại đây
}

if (method_exists($controller, $action)) {
    if (isset($_GET['id'])) {
        $controller->$action($_GET['id']);
    } else {
        $controller->$action();
    }
} else {
    echo "Action không tồn tại.";
}
?>