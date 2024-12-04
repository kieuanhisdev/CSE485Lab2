<?php

require_once 'models/News.php';

class NewsController
{
    // Hiển thị danh sách bài viết
    public function index()
    {
        // Lấy danh sách bài viết từ model
        $newsList = News::getAll();

        // Gửi dữ liệu đến view
        require_once 'views/news/index.php';
    }

    // Hiển thị chi tiết một bài viết
    public function detail($id)
    {
        // Lấy chi tiết bài viết từ model
        $news = News::find($id);

        if (!$news) {
            echo "Bài viết không tồn tại!";
            return;
        }

        // Gửi dữ liệu đến view
        require_once 'views/news/detail.php';
    }

    // Hiển thị form thêm bài viết
    public function addForm()
    {
        require_once 'views/admin/news/add.php';
    }

    // Xử lý thêm bài viết
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $image = $_POST['image'] ?? '';
            $created_at = date('Y-m-d H:i:s');
            $category_id = $_POST['category_id'] ?? 0;

            if (empty($title) || empty($content)) {
                echo "Vui lòng điền đầy đủ thông tin!";
                return;
            }

            $result = News::create($title, $content, $image, $created_at, $category_id);

            if ($result) {
                header('Location: index.php?controller=news&action=index');
            } else {
                echo "Thêm bài viết thất bại!";
            }
        }
    }

    // Hiển thị form chỉnh sửa bài viết
    public function editForm($id)
    {
        $news = News::find($id);

        if (!$news) {
            echo "Bài viết không tồn tại!";
            return;
        }

        require_once 'views/admin/news/edit.php';
    }

    // Xử lý chỉnh sửa bài viết
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $image = $_POST['image'] ?? '';
            $category_id = $_POST['category_id'] ?? 0;

            if (empty($title) || empty($content)) {
                echo "Vui lòng điền đầy đủ thông tin!";
                return;
            }

            $result = News::update($id, $title, $content, $image, $category_id);

            if ($result) {
                header('Location: index.php?controller=news&action=index');
            } else {
                echo "Cập nhật bài viết thất bại!";
            }
        }
    }

    // Xóa bài viết
    public function delete($id)
    {
        $result = News::delete($id);

        if ($result) {
            header('Location: index.php?controller=news&action=index');
        } else {
            echo "Xóa bài viết thất bại!";
        }
    }
}
?>