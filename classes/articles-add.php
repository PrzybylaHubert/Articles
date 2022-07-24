<?php
    require_once('articles.php');

    class articlesAdd extends articles{
        
        private $title;
        private $desc;
        private $status;
        private $category_id;
        private $author;

        function __construct($title, $desc, $status, $category_id, $author){
            $this->title = $title;
            $this->desc = $desc;
            $this->status = $status;
            $this->category_id = $category_id;
            $this->author = $author;
        }

        public function addArticle(){
            if($this->inputsFilled() == false){
                header("location: ../index.php?error=emptyInput");
            }
            else if($this->descMaxLength() == false){
                header("location: ../index.php?error=descriptionTooLong");
            }
            else if($this->titleMaxLength() == false){
                header("location: ../index.php?error=titleTooLong");
            }
            else if($this->titleDescMinlength() == false){
                header("location ../index.php?error=titleOrDescTooShort");
            }
            else{   
                $this->setArticle($this->title, $this->desc, $this->status, $this->category_id, $this->author);
                return true;
            }
            return false;
        }

        private function inputsFilled(){
            return empty($this->title) || empty($this->desc) || empty($this->status) || empty($this->category_id) ? false : true;
        }

        private function descMaxLength(){
            return strlen($this->desc)>2500 ? false : true;
        }

        private function titleMaxLength(){
            return strlen($this->desc)>30 ? false : true;
        }

        private function titleDescMinlength(){
            return strlen($this->title)<3 ||  strlen($this->desc)<3 ? false : true;
        }

    }
?>