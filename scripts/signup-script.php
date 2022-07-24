<?php
    require_once("../classes/user-signup.php");

    if(isset($_POST['submit'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['passwordRepeat'];
        $email = $_POST['email'];

        $signup = new userSignup($login, $password, $passwordRepeat, $email);
        if($signup->signupUser()){
            header("location: ../index.php?signup=1");
            session_start();
            $_SESSION['login'] = $login;
        }
    }
?>