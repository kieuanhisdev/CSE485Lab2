<?php
require_once APP_ROOT . '/app/libs/DBConnection.php';
require_once APP_ROOT . '/app/models/User.php';

class UserService
{
    public function getUserByUsername($userName)
    {
        // B1: Kết nối đến cơ sở dữ liệu
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        // B2: Truy vấn dữ liệu
        if ($conn != null) {
            $sql = "SELECT * FROM USERS WHERE USERNAME=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $userName, PDO::PARAM_STR);
            $stmt->execute();

            // B3: Xử lý kết quả
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $user = new User(
                    $result['username'],
                    $result['password'],
                );
                $user->setId($result['id']);
                $user->setRole($result['role']);
                return $user;
            }
            return null;  // Trả về null nếu không tìm thấy người dùng
        }
        return null;  // Trả về null nếu kết nối thất bại
    }


    public function saveUser(User $user)
    {
        try {
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();
            $sql = "INSERT INTO users(username, password, role) VALUES (?,?,0)";
            $stmt = $conn->prepare($sql);
            $username = $user->getUsername();
            $password = $user->getPassword();
            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindParam(1, $username, PDO::PARAM_STR);
            $stmt->bindParam(2, $passwordHashed, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>