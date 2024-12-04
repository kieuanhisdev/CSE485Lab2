<?php

function connectDatabase($severname, $username, $password, $dbname)
{
    try {
        //tạo kết nối 
        $conn = new PDO("mysql:host=$severname;dbname=$dbname", $username, $password);

        //thiết lập chế độ báo lỗi
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //echo "kết nối thành công!";
        return $conn;
    } catch (PDOException $e) {
        die("kết nối thất bại: " . $e->getMessage());
    }
}

//thông tin kết nối đến cơ sở dữ liệu MySQL
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "tintuc";

$conn = connectDatabase($severname, $username, $password, $dbname);

//đóng chuỗi kết nối
//$conn = null;
?>