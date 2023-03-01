<?Php
session_start();
if (isset($_POST["submit"])) {
    extract($_POST);
    extract($_GET);
    $rate = [
        "P_id" => $id,
        "rateing" => $rateing,
        "comment" => $comment
    ];
    $_SESSION["rate"][] = $rate;

    header("location: ../shop.php");
    exit();
}