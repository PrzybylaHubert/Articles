<?php
    print_r($_POST);
    require_once('../classes/articles-add.php');

    if(isset($_POST['submit'])){
        $desc = $_POST['description'];
        $title = $_POST['title'];
        $status = $_POST['status'];
        $category_id = $_POST['category'];
        $author = $_POST['author'];

        $addArticle = new articlesAdd($title, $desc, $status, $category_id, $author);
        if($addArticle->addArticle()){
            header("location: ../index.php?addArticle=1");
        }
    }
?>