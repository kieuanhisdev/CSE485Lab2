<?php
namespace App\Models;

class Category
{
    private $id;
    private $name;

    // Constructor
    public function __construct($id = null, $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    // Getters and Setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    // Các phương thức CRUD (Create, Read, Update, Delete) có thể thực hiện ở đây
    public static function all()
    {
        // Kết nối và truy vấn cơ sở dữ liệu
        $pdo = new \PDO('mysql:host=localhost;dbname=tintuc', 'root', ''); // Thay 'tintuc' bằng tên cơ sở dữ liệu của bạn
        $stmt = $pdo->query('SELECT * FROM categories');
        $categories = $stmt->fetchAll(\PDO::FETCH_CLASS, 'App\Models\Category');
        return $categories;
    }

    public static function findById($id)
    {
        // Kết nối và lấy dữ liệu theo ID
        $pdo = new \PDO('mysql:host=localhost;dbname=tintuc', 'root', ''); // Thay 'tintuc' bằng tên cơ sở dữ liệu của bạn
        $stmt = $pdo->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Models\Category');
        return $stmt->fetch();
    }

    public function save()
    {
        // Lưu danh mục vào cơ sở dữ liệu
        $pdo = new \PDO('mysql:host=localhost;dbname=tintuc', 'root', ''); // Thay 'tintuc' bằng tên cơ sở dữ liệu của bạn
        if ($this->id) {
            // Cập nhật danh mục nếu đã có ID
            $stmt = $pdo->prepare('UPDATE categories SET name = :name WHERE id = :id');
            $stmt->execute(['name' => $this->name, 'id' => $this->id]);
        } else {
            // Thêm mới danh mục
            $stmt = $pdo->prepare('INSERT INTO categories (name) VALUES (:name)');
            $stmt->execute(['name' => $this->name]);
            $this->id = $pdo->lastInsertId();
        }
    }

    public function delete()
    {
        // Xóa danh mục
        $pdo = new \PDO('mysql:host=localhost;dbname=tintuc', 'root', ''); // Thay 'tintuc' bằng tên cơ sở dữ liệu của bạn
        $stmt = $pdo->prepare('DELETE FROM categories WHERE id = :id');
        $stmt->execute(['id' => $this->id]);
    }
}
?>
