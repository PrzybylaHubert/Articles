<?php
    session_start();
    if(isset($_SESSION['login'])) 
        header("location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='login.css'>
    <title>Login</title>
</head>
<body>
    <div class='main'>
        <div class='login'>
            <h1>Login</h1>
            <form action='./scripts/login-script.php' method='post'>
                    <label for='login'>Login:</label>
                    <input type='text' name='login' minlength="3" maxlength='16'><br><br>
                    <label for='password'>Password:</label>
                    <input type='password' minlength="3" name='password'><br><br>
                <input type='submit' value='login' name='submit'>
            </form>
        </div>
        <hr>
        <div class='Signup'>
            <h1>signup</h1>
            <form action='./scripts/signup-script.php' method='post'>
                <label for='email'>E-mail:</label>
                <input type='email' name='email'><br><br>
                <label for='login'>Login:</label>
                <input type='text' name='login' minlength="5" maxlength='16'><br><br>
                <label for='password'>Password:</label>
                <input type='password' minlength="3" name='password'><br><br>
                <label for='passwordRepeat'>Repeat password:</label>
                <input type='password' minlength="3" name='passwordRepeat'><br><br>
                <input type='submit' value='signup' name='submit'>
            </form>
        </div>
    </div>
</body>
</html>