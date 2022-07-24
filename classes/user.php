<?php
    require_once('connect.php');

    class user extends connect{

        protected function searchForLogin($login){
            $sql = "select `login` from `users` where `login` like ?";
            $stmt = $this->connection()->prepare($sql);

            if(!$stmt->execute([$login])){
                header("location: ../login.php?error=stmtFail");
                exit();
            }

            return $stmt->rowCount() == 0 ? true : false;

        }

        protected function setuser($login, $password, $email){
            $sql = "insert into `users` (`login`,`password`,`email`) values (?, ?, ?)";
            $stmt = $this->connection()->prepare($sql);
            $password = sha1($password);

            if(!$stmt->execute([$login, $password, $email])){
                header("location: ../login.php?error=stmtFail");
                exit();
            }
        }

        protected function getUser($login, $password){
            $sql = "select `password` from `users` where `login` like ?";
            $stmt = $this->connection()->prepare($sql);

            if(!$stmt->execute([$login])){
                header("location: ../login.php?error=stmtFail");
                exit();
            }

            if($stmt->rowCount() == 0){
                header("location: ../login.php?error=loginNotFound");
                exit();
            }

            $comparedPassword = $stmt->fetch();
            $password = sha1($password);
            if($comparedPassword['password'] === $password){
                return true;
            }
            header("location: ../login.php?error=passwordsDontMatch");
            return false;
        }

        
    }
?>