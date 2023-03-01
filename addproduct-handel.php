<?php
session_start();
if (isset($_POST["addProduct"])) {
    extract($_POST);
    $errors = [
        "name" => [],
        "price" => [],
        "quantity" => [],
        "img" => [],
        "desc" => []
    ];
    // valid name
    if (empty($name)) {
        $errors["name"] = "Please Enter the product name";
    }
    if (!is_string($name)) {
        $errors["name"] = "Product Name Must Be string";
    }
    if (strlen($name) < 3) {
        $errors["name"] = "Please Enter the product name More than 3 char";
    }
    // valid price
    if (empty($price)) {
        $errors["price"] = "Please Enter the product price";
    }
    if (!is_numeric($price)) {
        $errors["price"] = "Product price Must Be Number";
    }
    if ($price < 0) {
        $errors["price"] = "Please Enter Valid Number Must Be Greater Than Zero";
    }
    // valid quantity
    if (empty($quantity)) {
        $errors["quantity"] = "Please Enter the product quantity";
    }
    if (!is_numeric($quantity)) {
        $errors["quantity"] = "Product quantity Must Be Number";
    }
    if ($quantity < 0) {
        $errors["quantity"] = "Please Enter Valid Number Must Be Greater Than Zero";
    }
    // valid desc
    if (empty($quantity)) {
        $errors["desc"] = "Please Enter the product Description";
    }
    // Get Data for imf
    $img = $_FILES["img"];
    $imgName = $img["name"];
    $type = $img["type"];
    $tmpName = $img["tmp_name"];
    $size = $img["size"] / (1024 * 1024);
    $imgError = $img["error"];
    $ext = pathinfo($imgName, PATHINFO_EXTENSION);
    // valid img
    $exts = ["gif", "png", "jpg", "webp"];
    if ($imgError != 0) {
        $errors["img"] = "The image does not exist";
    } elseif ($size > 3) {
        $errors["img"] = "Image size is large, choose a smaller image";
    } elseif (!in_array($ext, $exts)) {
        $errors["img"] = "The image is incorrect";
    }
    // Generat Roundom Name
    $random = uniqid() . time();
    $newName = "$random.$ext";
    // $src = "../admin/upload/$newName";
    if (!empty($errors["name"]) && !empty($errors["price"]) && !empty($errors["quantity"]) && !empty($errors["img"])) {
        $_SESSION["error"] = $errors;
        header("location: ../admin/view/addproduct.php");
        exit();
    } else {
        move_uploaded_file($tmpName, "../admin/upload/$newName");
        $info = [
            $name, 
            $price, 
            $quantity, 
            $newName,   
            $desc
        ];
        $_SESSION["productInfo"][] = $info;
        header("location: ../admin/view/addproduct.php?load=done");
        exit();
 }
}
