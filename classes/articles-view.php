<?php
    require_once('articles.php');

    class articlesView extends articles{
        
        private $status;
        private $category;

        function __construct($status, $category){
            $this->status = $status;
            $this->category = $category;
        }

        function showArticles(){
            $articles = $this->getArticles($this->category, $this->status);

            foreach($articles as $article){
                if($article['status']==-1 && $article['author']!==$_SESSION['login'] && $_SESSION['login']!=='admin')
                    continue;
                echo <<< articleHTML
                    <div class='article'>
                        <div class='article-content'>
                            <h4>$article[title]</h4>
                            $article[description]
                        </div>
                        <div class='article-utility'>
                            Author: $article[author]<br>
                            Category: $article[name]<br>
                articleHTML;
                if($article['status']==1){
                    echo "Visibile to all users<br>";
                }
                else{
                    echo "Visible to author and admin<br>";
                }
                if($article['author']===$_SESSION['login'] || $_SESSION['login']==='admin'){
                    echo "<a href='./scripts/article-delete-script.php?id=$article[id]'>Delete article</a><br>
                    <a href='./scripts/article-changeVisibility-script.php?id=$article[id]'>Change visibility</a>";
                }
                echo <<< articleHTML
                        </div> 
                    </div>
                articleHTML;
            }
        }
    }
?>