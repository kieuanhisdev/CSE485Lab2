<?php
namespace App\Controllers;

// Yêu cầu thủ công file Category.php
require_once __DIR__ . '/../models/Category.php';

use App\Models\Category;

class CategoryController
{
    public function index()
    {
        // Lấy tất cả danh mục từ model
        $categories = Category::all();
        return $categories; // Trả về danh sách các danh mục
    }

    public function create()
    {
        require_once 'app/views/categories/add.php'; // Hiển thị form thêm danh mục
    }

    public function store()
    {
        if (isset($_POST['name'])) {
            $category = new Category();
            $category->setName($_POST['name']);
            $category->save(); // Lưu danh mục mới vào cơ sở dữ liệu
        }
        header('Location: /categories'); // Điều hướng trở lại trang danh mục
    }

    public function edit($id)
    {
        $category = Category::findById($id); // Lấy danh mục theo ID
        require_once 'app/views/categories/edit.php'; // Hiển thị form chỉnh sửa
    }

    public function update($id)
    {
        if (isset($_POST['name'])) {
            $category = Category::findById($id); // Lấy danh mục theo ID
            $category->setName($_POST['name']);
            $category->save(); // Cập nhật danh mục
        }
        header('Location: /categories'); // Điều hướng trở lại trang danh mục
    }

    public function delete($id)
    {
        $category = Category::findById($id); // Lấy danh mục theo ID
        $category->delete(); // Xóa danh mục
        header('Location: /categories'); // Điều hướng trở lại trang danh mục
    }
}
?>
