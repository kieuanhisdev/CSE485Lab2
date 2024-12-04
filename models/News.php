<?php

require_once 'config/database.php'; // Đảm bảo file database.php đã được kết nối

class News
{
    // Lấy tất cả bài viết
    public static function getAll()
    {
        global $conn;
        $stmt = $conn->query("SELECT * FROM news ORDER BY created_at DESC"); // Lấy bài viết theo thời gian giảm dần
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy bài viết theo ID
    public static function find($id)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tạo bài viết mới
    public static function create($title, $content, $image, $created_at, $category_id)
    {
        global $conn;
        $stmt = $conn->prepare("
            INSERT INTO news (title, content, image, created_at, category_id) 
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([$title, $content, $image, $created_at, $category_id]);
    }

    // Cập nhật bài viết
    public static function update($id, $title, $content, $image, $category_id)
    {
        global $conn;
        $stmt = $conn->prepare("
            UPDATE news 
            SET title = ?, content = ?, image = ?, category_id = ? 
            WHERE id = ?
        ");
        return $stmt->execute([$title, $content, $image, $category_id, $id]);
    }

    // Xóa bài viết
    public static function delete($id)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM news WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>