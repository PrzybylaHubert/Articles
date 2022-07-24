<?php
    require_once("connect.php");

    class categories extends connect{
        
        protected function queryAllCategories(){
            $sql = 'select * from `categories`';
            $stmt = $this->connection()->query($sql);
            $categories = $stmt->fetchAll();
            return $categories;
        }

        protected function queryCategory($category_id){
            $sql = "select `name` from `categories` where `id` like '$category_id'";
            $stmt = $this->connection()->query($sql);
            $category = $stmt->fetch();
            return $category;
        }
    }
?>