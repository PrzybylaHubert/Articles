<?php
    session_start();
    if(!isset($_SESSION['login'])) 
        header("location: ./login.php");
    require_once("./scripts/categories-show-script.php");
    require_once('./scripts/articles-show-script.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='style.css'>
    <title>Aurora creation task</title>
</head>
<body>
    <header>
        User: <?php echo $_SESSION['login']; ?>
        <a href='./scripts/logout-script.php'>Logout</a>
    </header>
    <div class='main'>
        <div class='articles'>
            <div class='sort-form'>
                <h2>Sorting: </h2>
                <form action='index.php' method='get'>
                    <label for='status'>Status:</label>
                    <select name='status'>
                        <option value='%'>Both</option>
                        <option value='1'>Visible</option>
                        <option value='-1'>Not visible</option>
                    </select>
                    <label for='category'>Category:</label>
                    <select name='category'>
                        <option value='%'>Any</option>
                        <?php showCategories(); ?>
                    </select>
                    <input type='submit' value='Search'>
                </form>
            </div>
            <?php 
                showArticles();
            ?>
        </div>
        <div class='add-article-form'>
            <h2>Add an article:</h2>
            <form action='./scripts/article-add-script.php' method='post'>
                <input type='hidden' name='author' value=<?php echo "'$_SESSION[login]'"?>>
                <label for='title'>Title:</label>
                <input type='text' minlength="3" maxlength= '30' name='title'><br><br>
                <label for='status'>Status:</label>
                <input type='radio' name='status' value='1'>Visible
                <input type='radio' name='status' value='-1'>invisible<br><br>
                <label for='category'>Category:</label>
                <select name='category'>
                    <?php showCategories(); ?>
                </select><br><br>
                <label for='description'>Description:</label><br>
                <textarea name='description' minlength="3" maxlength='2500'></textarea><br><br>
                <input type='submit' value='add article' name='submit'>
            </form>
        </div>
    </div>
</body>
</html>