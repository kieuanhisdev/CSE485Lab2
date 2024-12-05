<?php
require_once APP_ROOT.'/app/models/News.php';
class NewsService{

    public function getAllNews(){
        try{
            $conn = new PDO('mysql:host=localhost;dbname=tintuc', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM NEWS";
            $stmt = $conn->query($sql);

            $news = [];
            while($row = $stmt->fetch()){
                $new = new News($row['id'], $row['title'], $row['content'], $row['image'], $row['created_at'], $row['category_id']);
                $news[] = $new;
            }
             return $news;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}
?>