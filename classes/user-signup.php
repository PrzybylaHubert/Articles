<?php
    require_once('user.php');

    class userSignup extends user{
        
        private $login;
        private $password;
        private $passwordRepeat;
        private $email;

        function __construct($login, $password, $passwordRepeat, $email){
            $this->login = $login;
            $this->password = $password;
            $this->passwordRepeat = $passwordRepeat;
            $this->email = $email;
        }

        public function signupUser(){
            if($this->inputsFilled() == false){
                header("location: ../login.php?error=emptyInput");
            }
            else if($this->isEmail() == false){
                header("location: ../login.php?error=notEmail");
            }
            else if($this->passwordsMatch() == false){
                header("location: ../login.php?error=passwordsMatch");
            }
            else if($this->isLoginUnique() == false){
                header("location: ../login.php?error=loginTaken");
            }
            else if($this->loginMaxChar() == false){
                header("location: ../login.php?error=loginTooLong");
            }
            else if($this->loginMinChar() == false){
                header("location: ../login.php?error=loginTooShort");
            }
            else{   
                $this->setUser($this->login, $this->password, $this->email);
                return true;
            }
            return false;
        }

        private function inputsFilled(){
            return empty($this->login) || empty($this->password) || empty($this->email) || empty($this->passwordRepeat) ? false : true;
        }

        private function isEmail(){
            return !filter_var($this->email, FILTER_VALIDATE_EMAIL) ? false : true;
        }

        private function passwordsMatch(){
            return $this->password !== $this->passwordRepeat ? false : true;
        }

        private function loginMaxChar(){
            return strlen($this->login)>16 ? false : true;
        }

        private function loginMinChar(){
            return strlen($this->login)<3 ? false : true;
        }

        private function isLoginUnique(){
            return !parent::searchForLogin($this->login) ? false : true;
        }
    }
?>