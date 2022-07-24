<?php
    require_once('user.php');

    class userLogin extends user{

        private $login;
        private $password;

        function __construct($login, $password){
            $this->login = $login;
            $this->password = $password;
        }

        public function loginUser(){
            if($this->inputsFilled() == false){
                header("location: ../login.php?error=emptyInput");
            }
            else if($this->getUser($this->login, $this->password)){
                return true;
            }
            return false;
        }

        private function inputsFilled(){
            return empty($this->login) || empty($this->password) ? false : true;
        }
    }
?>