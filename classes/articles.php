<?php
    require_once("connect.php");

    class articles extends connect{
        
        protected function setArticle($title, $desc, $status, $category_id, $author){
            $sql = "insert into `articles` (`title`,`description`,`status`,`category_id`,`author`) values (?, ?, ?, ?, ?)";
            $stmt = $this->connection()->prepare($sql);

            if(!$stmt->execute([$title, $desc, $status, $category_id, $author])){
                header("location: ../index.php?error=stmtFail");
                exit();
            }
        }

        protected function getArticles($category, $status){
            $sql = "select `articles`.*, `categories`.`name` from `articles` inner join `categories` on `articles`.`category_id` = `categories`.`id`
            where `category_id` like ? and `status` like ? ";
            $stmt = $this->connection()->prepare($sql);

            if(!$stmt->execute([$category, $status])){
                header("location: ../index.php?error=stmtFail");
                exit();
            }
            $articles = $stmt->fetchAll();
            return $articles;
        }

        protected function deleteArticle($id){
            $sql = "delete from `articles` where `id` like '$id'";
            if(!$this->connection()->query($sql)){
                header("location: ../index.php?error=couldNotDeleteArticle");
                exit();
            }
        }

        protected function changeStatus($articleId, $desiredVisibility){
            $sql = "update `articles` set `status`='$desiredVisibility' where `id` like '$articleId'";
            if(!$this->connection()->query($sql)){
                header("location: ../index.php?error=couldNotChangeVisibility");
                exit();
            }
        }

        protected function getField($id, $fieldName){
            $sql = "select `$fieldName` from `articles` where `id` like '$id'"; 
            if(!$stmt = $this->connection()->query($sql)){
                header("location: ../index.php?error=getFieldFailed");
                exit();
            }
            $field = $stmt->fetch();
            return $field;
        }
    }
?>