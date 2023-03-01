<?php
session_start();
if (isset($_POST["submit"])) {
    extract($_GET);
    extract($_POST);
    $info = [
        "code" =>$productId,
        "name" => $hiddenName,
        "prici" => $hiddenPrice,
        "quantity" => $quantity,
        "desc" => $hiddenDesc,
        "img" => $hiddenimg
    ];



    // echo "ordered Quantity = ".$info["quantity"] ;
    // echo "<br>";
    if (isset($_SESSION["cart"])) {
        function chek($info)
        {
            foreach ($_SESSION["cart"] as $key => $product) {
                if ($info["name"] === $product["name"] && $info["prici"] === $product["prici"] && $info["desc"] === $product["desc"] && $info["img"] === $product["img"]) {
                    return [true, $key];
                }
            }
        }

        $hena = chek($info);
        if ($hena[0] === true) {
            $sum = $quantity + $quantity;
            $_SESSION["cart"][$hena[1]]["quantity"] = $sum;
            // print_r($_SESSION["cart"][$hena[1]]);
        } else {
            $_SESSION["cart"][] = $info;
        }
        if (empty($_SESSION["cart"])) {
            $_SESSION["cart"][] = $info;
        }
    } else {
        $_SESSION["cart"][] = $info;
    }
        // echo "Old Quantity = ".$_SESSION["productInfo"][1][2] ;
    // echo "<br>";
    header("location: ../cart.php");
    exit();
}




// if (isset($_POST["submit"])) {
//     extract($_POST);
//     $info = [
//         $productId => array(
//             "name" => $hiddenName,
//             "prici" => $hiddenPrice,
//             "quantity" => $quantity,
//             "desc" => $hiddenDesc,
//             "img" => $hiddenimg
//         ) , 
//     ];
//      if (!empty($_SESSION["cart"])) {
//         if(in_array($productId,array_keys($_SESSION["cart"]))) {
//             foreach ($_SESSION["cart"] as $key => $product) {
//                 if ($productId === $key) {
//                     if(empty($_SESSION["cart"][$key]["quantity"])) {
//                         $_SESSION["cart"][$key]["quantity"] = 0;
//                     }
//                     $_SESSION["cart"][$key]["quantity"] += $quantity;
//                 }
//             }
//         }else {
//             $_SESSION["cart"][] = $info;
//         }
//      }else {
//         $_SESSION["cart"] = $info;
//      }
//     //  header("location: ../cart.php");
//     //  exit();
//     echo "<pre>";
//     print_r($info);
//     echo "</pre> <br> // <br>";
//     echo "<pre>";
//     print_r($_SESSION["cart"]);
//     echo "</pre>";
// }
// 

// Quantity Update




// function quantityUpdate($productAraay, $id)
// {
//     $new_q = "";
//     foreach ($productAraay as $v) {
//         foreach ($_SESSION["cart"] as $valu) {
//             if ($valu["code"] == $id) {
//                 $new_q = $v[2] - $valu["quantity"];
//                 return $new_q;
//             }
//         }
//     }
// }
// $newQuantity = quantityUpdate($_SESSION["productInfo"] , 1);
// $_SESSION["productInfo"][1][2] = $newQuantity;
// echo "New Quantity = ".$newQuantity ;
// echo "<br>";
// echo "product Info Araay";
// echo "<pre>";
// print_r($_SESSION["productInfo"]);
// echo "</pre>";
?>
