<?php
    require_once('../classes/user-login.php');

    if(isset($_POST['submit'])){
        $login = $_POST['login'];
        $password = $_POST['password'];

        $loginContr = new userLogin($login,$password);
        if($loginContr->loginUser()){
            header("location: ../index.php?login=1");
            session_start();
            $_SESSION['login'] = $login;
        }
    }
?>