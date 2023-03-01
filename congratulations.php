<?php
session_start();
if (!empty($_SESSION["userLogin"])) {
    $user = $_SESSION["userLogin"];
}
include "header.php";
?>
<div class="container d-flex align-items-center justify-content-between">
    <img src="undraw_Completed_re_cisp.png" class="w-75">
    <h2>Done</h2>
</div>
<style>
    h2 {
        font-size: 6rem;
        color: #6C63FF;
        letter-spacing: 5px;
        font-weight: 900;
    }
</style>
<?php
// Quantity Update
function quantityUpdate($productAraay ) {
    $new_q = "";
    foreach ($productAraay as $k => $v) {
    foreach($_SESSION["cart"] as $valu) {
                if ($valu["code"]== $k) {
            $new_q = $v[2] - $valu["quantity"];
            return [$new_q , $k];
        }
    }
}
}
foreach ($_SESSION["productInfo"] as $id => $v) {
    $rateArray = quantityUpdate($_SESSION["productInfo"]);
    $_SESSION["productInfo"][$key][2] = $rateArray[0];
} 

unset($_SESSION["cart"]);
header("refresh: 1 ; url=/exam/shop.php");
exit();
?>