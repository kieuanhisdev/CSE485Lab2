<?php
require_once('../app/config/config.php');
require_once APP_ROOT.'/app/controllers/NewsController.php';

$homeController = new HomeController();
$homeController->index();