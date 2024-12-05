<?php
 class News{
    private $id;
    private $title;
    private $content;
    private $image;
    private $created_at;
    private $category_id;

    public function __construct($id, $title, $content, $image, $created_at, $category_id) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->created_at = $created_at;
        $this->category_id = $category_id;
    }

    public function get_id(){
        return $this->id;
    }

    public function set_id($id){
        $this->id = $id;
    }

    public function get_content(){
        return $this->content;
    }

    public function set_content($content){
        $this->content = $content;
    }

    public function get_title(){
        return $this->title;
    }

    public function set_title($title){
        $this->title = $title;
    }

    public function get_image(){
        return $this->image;
    }

    public function set_image($image){
        $this->image = $image;
    }

    public function get_created_at(){
        return $this->created_at;
    }

    public function set_created_at($created_at){
        $this->created_at = $created_at;
    }

    public function get_category_id(){
        return $this->category_id;
    }

    public function set_category_id($category_id){
        $this->category_id = $category_id;
    }
 }
?>