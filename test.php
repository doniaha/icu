<?php
session_start();
$rate = $_SESSION["rate"];
$pro = $_SESSION["productInfo"];
// echo "<pre>";
// print_r($rate);
// echo "</pre>";

function sumRate($rateArray , $productID) {
    $rat = [];
    foreach ($rateArray as $valu) {
            if ($productID == $valu["P_id"]) {
                array_push($rat, $valu["rateing"]);
            }
    }
    return $rat;
}
$x = sumRate($rate, 1); 
$avg = array_sum($x) / count($x) ;
    echo "<pre>";
print_r($x);
echo "</pre>";
if ($avg > 0 && $avg <= 1) {
    echo "*";
} elseif ($avg > 1 && $avg <= 2) {
    echo "**";
} elseif ($avg > 2 && $avg <= 3) {
    echo "***";
} elseif ($avg > 3 && $avg <= 4) {
    echo "****";
} elseif ($avg > 4 && $avg <= 5) {
    echo "*****";
}
?>