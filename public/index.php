<?php
require_once('../app/config/config.php');
require_once APP_ROOT.'/app/controllers/HomeController.php';

$homeController = new HomeController();
$homeController->index();