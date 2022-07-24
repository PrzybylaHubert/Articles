<?php
    session_start();
    require_once('../classes/articles-remove.php');

    $deleteArticle = new articlesRemove($_GET['id'], $_SESSION['login']);
    if($deleteArticle->removeArticle())
        header("location: ../index.php?removeArticle=1");
    else{
        header("location: ../index.php?removeArticle=0");
    }
?>