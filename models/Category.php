<?php
require_once 'config/database.php';

class Category {
    // Lấy tất cả danh mục
    public static function getAll() {
        global $conn;
        $stmt = $conn->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tìm kiếm danh mục theo ID
    public static function find($id) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tạo mới danh mục
    public static function create($name) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->execute([$name]);
    }

    // Cập nhật thông tin danh mục
    public static function update($id, $name) {
        global $conn;
        $stmt = $conn->prepare("UPDATE categories SET name = ? WHERE id = ?");
        $stmt->execute([$name, $id]);
    }

    // Xóa danh mục
    public static function delete($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
