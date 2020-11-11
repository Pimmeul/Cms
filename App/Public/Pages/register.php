<?php
?>






<?php
if(isset($_POST["submit"])) {
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
}
?>
