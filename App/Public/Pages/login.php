<?php

use Database\Auth;

include_once('./config/Db/Auth.php')
?>
<html lang="nl">
<form action="" method="post">
    <label>
        <input type="password" name="password">
    </label>
    <label>
        <input type="text" name="username">
    </label>
    <input type="submit" name="submit">
</form>
</html>


<?php


if(isset($_POST["submit"])){
    $password = htmlspecialchars($_POST['password']);
    $user = new Auth();
    $user->get_User(htmlspecialchars($_POST['username']));
    if(password_verify($password,$user->users->password)){
        echo 'logged in';
    }
}