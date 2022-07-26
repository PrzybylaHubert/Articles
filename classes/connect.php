<?php
    abstract class connect{
        private $host = 'localhost';
        private $user = 'root';
        private $pwd = '';
        private $db_name = 'articles';

        protected function connection(){
            try{
                $dsn ='mysql:host='.$this->host.';dbname='.$this->db_name;
                $pdo = new PDO($dsn, $this->user, $this->pwd);
                $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $pdo;
            }
            catch(PDOException $e){
                echo "error ".$e->getMessage()."<br>";
                die();
            }
        }
    }
?>
