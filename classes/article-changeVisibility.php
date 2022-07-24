<?php
    require_once('articles.php');

    class articlesChangeVisibility extends articles{

        private $articleId;
        private $loggedUser;

        function __construct($articleId, $loggedUser){
            $this->articleId = $articleId;
            $this->loggedUser = $loggedUser;
        }

        public function changeVisibility(){
            if($this->LoggedUserAuthorAdmin() == false){
                header("location: ../index.php?error=unauthorizedAttemptToDelete");
            }
            else{
                $currentVisibility = $this->getField($this->articleId, 'status')['status'];
                $this->changeStatus($this->articleId, -$currentVisibility);
            }
        }

        private function LoggedUserAuthorAdmin(){
            $author = $this->getField($this->articleId, 'author');
            if($this->loggedUser === 'admin'){
                return true;
            }
            else if($author['author']===$this->loggedUser){
                return true;
            }
            return false;
        }


    }

?>
    