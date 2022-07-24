<?php
    require_once('./classes/articles-view.php');

    function showArticles(){
        if(isset($_GET['status']) && isset($_GET['category'])){
            $status = $_GET['status'];
            $category = $_GET['category'];
            $showArticles = new articlesView($status, $category);
        }
        else{
            $showArticles = new articlesView('%','%');
        }
        $showArticles->showArticles();
    }
?>