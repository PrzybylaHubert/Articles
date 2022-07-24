<?php
    require_once('./classes/categories-view.php');
    function showCategories(){
        $categoriesShow = new categoriesView();
        $categoriesShow->displayCategories();
    }
?>