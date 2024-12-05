<?php
require_once APP_ROOT.'/app/services/NewsService.php';
class HomeController{
    public function view($viewPath, $data = []) {
        extract($data); // Tạo các biến từ mảng $data
        include APP_ROOT . '/' . str_replace('.', '/', $viewPath) . '.php';
    }

    public function index() {
        $newsService = new NewsService();
        $news = $newsService->getAllNews();
        
        include APP_ROOT . '/app/views/news/detail.php';
    }
}