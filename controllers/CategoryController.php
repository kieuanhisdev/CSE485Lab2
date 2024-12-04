<?php
require_once 'models/Category.php';

class CategoryController {
    // Hiển thị danh sách danh mục
    public function index() {
        $categories = Category::getAll();
        include 'views/categories/index.php';
    }

    // Hiển thị form tạo mới danh mục
    public function create() {
        include 'views/categories/create.php';
    }

    // Lưu danh mục mới
    public function store() {
        $name = $_POST['name'];
        Category::create($name);
        $_SESSION['message'] = 'Danh mục đã được tạo thành công!';
        header('Location: index.php?controller=category&action=index');
        exit();
    }

    // Hiển thị thông tin chi tiết của danh mục
    public function show($id) {
        $category = Category::find($id);
        if ($category) {
            include 'views/categories/show.php';
        } else {
            echo "Danh mục không tồn tại.";
        }
    }

    // Hiển thị form chỉnh sửa danh mục
    public function edit($id) {
        $category = Category::find($id);
        if ($category) {
            include 'views/categories/edit.php';
        } else {
            echo "Danh mục không tồn tại.";
        }
    }

    // Cập nhật thông tin danh mục
    public function update($id) {
        $name = $_POST['name'];
        Category::update($id, $name);
        header('Location: index.php?controller=category&action=index');
    }

    // Xóa danh mục
    public function delete($id) {
        Category::delete($id);
        header('Location: index.php?controller=category&action=index');
    }
}
?>