<?php
// Kiểm tra controller và action từ URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($controller) {
    case 'admin':
        require_once 'controllers/AdminController.php';
        $controllerObj = new AdminController();
        break;
    case 'news':
        require_once 'controllers/NewsController.php';
        $controllerObj = new NewsController();
        break;
    case 'home':
        require_once 'controllers/HomeController.php';
        $controllerObj = new HomeController();
        break;
    default:
        die("Controller không tồn tại.");
}

if (method_exists($controllerObj, $action)) {
    $controllerObj->$action();
} else {
    die("Action không tồn tại.");
}
?>
