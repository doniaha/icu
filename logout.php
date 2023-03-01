<?php
session_start();
// Logout For Admin 
if(isset($_GET["logout"])) {
    header('Location: ../login.php');
    exit();
}
// Logout For User
if(isset($_GET["userlogout"])) {
    unset($_SESSION["userLogin"]);
    header('Location: ../login.php');
    exit();
}

?>