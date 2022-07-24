<?php
    require_once('articles.php');

    class articlesRemove extends articles{

        private $articleId;
        private $loggedUser;

        function __construct($articleId, $loggedUser){
            $this->articleId = $articleId;
            $this->loggedUser = $loggedUser;
        }

        public function removeArticle(){
            if($this->LoggedUserAuthorAdmin() == false){
                header("location: ../index.php?error=unauthorizedAttemptToDelete");
            }
            else{
                $this->deleteArticle($this->articleId);
            }
        }

        private function LoggedUserAuthorAdmin(){
            $author = $this->getField($this->articleId, 'author');
            echo $author['author'];
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
    