<?php
session_start();
$adminEmail = "admin@gmail.com";
$adminPassword = "admin";
$temp = "";
$users = $_SESSION["users"];
function search_user($user, $field)
{
    foreach ($user as $data) {
        if ($data['email'] == $field)
            return $data;
    }
}
if (isset($_POST["submit"])) {
    extract($_POST);
    $error = [
        "email" => "",
        "password" => "",
        "notFound" => ""
    ];
    // log in for Admin 
    if ($email === $adminEmail && $password === $adminPassword) {
        header("location: ../admin/view/layout.php");
        exit();
    }
    // log in for User 
    $user = search_user($users, $email);
    if ($user == null) {
        if (!empty($email)) {
            $error ["notFound"]= "You don't have an account";
        } else {
            $error ["email"]= "Enter Your Email";
        }
    } else {
        if (!in_array( $email , $user)) {
            $error ["email"]= "email is incorrect";
        }
        if (!in_array($password , $user)) {
            $error ["password"]= "password is incorrect";
        }
        if(empty($password)) {
            $error ["password"]= "Enter Your password";
        } 
    }

    if (!empty($error["notFound"]) || !empty($error["password"]) || !empty($error["email"])) {
        $_SESSION["error"] = $error;
        header('Location: ../login.php');
        exit();
    }else {
            $_SESSION["userLogin"]= $user;
            header('Location: ../shop.php');
            exit();
    }
}



