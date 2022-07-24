<?php
    session_start();
    require_once('../classes/articles-remove.php');

    $deleteArticle = new articlesRemove($_GET['id'], $_SESSION['login']);
    $deleteArticle->removeArticle();
?>