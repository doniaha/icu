<?php
session_start(); 
if (isset($_POST["submit"])) {
    extract($_POST); 
    $error = [
        "name" => "",
        "email" => "",
        "password" => "",
        "address" => "",
        "phone" => "",
    ];

    // Name Valdition 
    if (empty($name)) {
        $error["name"] = "Name is required";
    } elseif (strlen($name)< 3||strlen($name) > 15) {
        $error["name"] = "The Name Must Be Between 3 and 15 Letters";
    } else if (is_numeric($name)) {
        $error["name"] = "The Name Must Be String";
    }
    // Email Valdition 
    if (empty($email)) {
        $error["email"] = "Email is required";
    }  else if (is_numeric($name)) {
        $error["email"] = "The Email Must Be String";
    }elseif (!empty($email)){
        if(isset($_SESSION["users"])) {
            foreach ($_SESSION["users"] as $exists) {
                if ($exists["email"] === $email) {
                    $error["email"] = "The Email Already Exists";
                    break;
                }
            }
        }
    }
    // Password Valdition 
    if (empty($password)) {
        $error["password"] = "Password is required";
    } else if (strlen($password) < 8 || strlen($password) > 20) {
        $error["password"] = "The Password Must Be Between 3 and 20 Letters";
    }
    // Address Valdition 
    if (empty($address)) {
        $error["address"] = "Address is required";
    } 
    // Phone Valdition 
    if (empty($phone)) {
        $error["phone"] = "Phone is required";
    }
    if (!empty($error["name"]) || !empty($error["password"]) || !empty($error["email"]) || !empty($error["address"]) || !empty($error["phone"])) {
        $_SESSION["error"] = $error;
        header('Location: ../signup.php');
        exit();
    } else {
        $user = [
            "name" => $name,
            "email" => $email , 
            "password" => $password,
            "address" => $address,
            "phone" => $phone,
        ];
            $_SESSION["users"][]= $user;
            header('Location: ../login.php');
            exit();
    }
}
