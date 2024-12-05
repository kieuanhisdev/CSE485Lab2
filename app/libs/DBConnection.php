<?php
namespace App\Libs; // Namespace của lớp DBConnection

use PDO;
use PDOException; // Chỉ cần khai báo PDOException mà không cần namespace App\Libs

class DBConnection {
    private static $connection = null;

    private static $host = 'localhost';  
    private static $dbName = 'tintuc';  
    private static $username = 'root';  
    private static $password = '';  

    // Lấy kết nối
    public static function getConnection() {
        if (self::$connection == null) {
            try {
                // Kết nối với CSDL bằng PDO
                $dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$dbName;
                self::$connection = new PDO($dsn, self::$username, self::$password);
                // Thiết lập chế độ báo lỗi
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) { // Sử dụng PDOException đúng cách
                // Xử lý lỗi nếu không thể kết nối
                die('Connection failed: ' . $e->getMessage());
            }
        }
        return self::$connection;  // Trả về đối tượng kết nối PDO
    }
}
?>
