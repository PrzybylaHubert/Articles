<?php
    session_start();
    require_once('../classes/article-changeVisibility.php');

    $changeVisibility = new articlesChangeVisibility($_GET['id'], $_SESSION['login']);
    if($changeVisibility->changeVisibility())
        header("location: ../index.php?statusChange=1");
    else{
        header("location: ../index.php?statusChange=0");
    }
?>