<?php
require_once('../app/config/config.php');
require_once APP_ROOT . '/app/controllers/AuthController.php';

$controller = $_GET['controller'] ?? 'auth';
$action = $_GET['action'] ?? 'showLoginForm';

switch ($controller) {
    case 'auth':
        $controller = new AuthController();
        break;
    // Bạn có thể thêm các bộ điều khiển khác tại đây
}

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Action không tồn tại.";
}
?>