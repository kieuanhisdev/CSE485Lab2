<?php
require_once 'models/Category.php';

class UserController {

    // Hiển thị danh sách danh mục
    public function index() {
        $categories = Category::getAll();
        
        // HTML cho danh sách danh mục
        echo "<h1>Danh Sách Danh Mục</h1>";
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Tên Danh Mục</th>
                    <th>Hành Động</th>
                </tr>";

        foreach ($categories as $category) {
            echo "<tr>
                    <td>{$category['id']}</td>
                    <td>{$category['name']}</td>
                    <td>
                        <a href='index.php?controller=user&action=edit&id={$category['id']}'>Sửa</a> |
                        <a href='index.php?controller=user&action=delete&id={$category['id']}'>Xóa</a>
                    </td>
                </tr>";
        }

        echo "</table>";
        echo "<br><a href='index.php?controller=user&action=create'>Thêm Danh Mục Mới</a>";
    }

    // Hiển thị form tạo mới danh mục
    public function create() {
        echo "<h1>Thêm Danh Mục Mới</h1>";
        echo "<form action='index.php?controller=user&action=store' method='POST'>
                <label for='name'>Tên Danh Mục:</label>
                <input type='text' id='name' name='name' required>
                <input type='submit' value='Tạo mới'>
              </form>";
    }

    // Lưu danh mục mới
    public function store() {
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            Category::create($name);
            $_SESSION['message'] = 'Danh mục đã được tạo thành công!';
            header('Location: index.php?controller=user&action=index');
            exit();
        }
    }

    // Hiển thị thông tin chi tiết của danh mục
    public function show($id) {
        $category = Category::find($id);
        if ($category) {
            echo "<h1>Chi Tiết Danh Mục</h1>";
            echo "<p><strong>ID:</strong> {$category['id']}</p>";
            echo "<p><strong>Tên Danh Mục:</strong> {$category['name']}</p>";
        } else {
            echo "Danh mục không tồn tại.";
        }
    }

    // Hiển thị form chỉnh sửa danh mục
    public function edit($id) {
        $category = Category::find($id);
        if ($category) {
            echo "<h1>Chỉnh Sửa Danh Mục</h1>";
            echo "<form action='index.php?controller=user&action=update&id={$category['id']}' method='POST'>
                    <label for='name'>Tên Danh Mục:</label>
                    <input type='text' id='name' name='name' value='{$category['name']}' required>
                    <input type='submit' value='Cập nhật'>
                  </form>";
        } else {
            echo "Danh mục không tồn tại.";
        }
    }

    // Cập nhật thông tin danh mục
    public function update($id) {
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            Category::update($id, $name);
            header('Location: index.php?controller=user&action=index');
        }
    }

    // Xóa danh mục
    public function delete($id) {
        Category::delete($id);
        header('Location: index.php?controller=user&action=index');
    }
}
?>
