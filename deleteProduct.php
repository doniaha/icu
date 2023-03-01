<?php
session_start();
if (!empty($_SESSION["productInfo"])) {
    $l = $_SESSION["productInfo"];
}
// Detete Prooduct 
if (isset($_GET["id"])) {
    extract($_GET);
    $p_id=$l[$id][3];
    $imgSrc = "../upload/$p_id";
    unlink($imgSrc) ;
    unset(  $_SESSION["productInfo"][$id]);
    array_values($_SESSION["productInfo"]);
    header("Refresh:0; url=deleteProduct.php");
}
include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
?>
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper full-page-wrapper auth login-bg">
        <div class="row  d-flex align-items-center justify-content-center g-3">
            <?php
            if (!empty($_SESSION["productInfo"])) {
                foreach ($l as $key => $product) { ?>
                    <div class="card col-lg-4 col-12 mx-2 py-1">
                        <div class="pro">
                            <img src="../upload/<?php echo $product[3]?>" alt="<?php echo $product[0] ?>" class="w-100 rounded-2" style="height:250px"/>
                            <div class="des py-2">
                                <h2>Title : <?php echo $product[0] ?></h2>
                                <h5>Description : <?php echo $product[4] ?></h5>
                                <h4>Price : <?php echo $product[1] . " LE" ?></h4>
                                <h4>quantity : <?php echo $product[2] ?></h4>
                                <!-- <input type="number" name="quantity" value="<?php echo $product[2] ?>" class="form-control"> -->
                            </div>
                            <a class="btn btn-danger py-2 px-4 col-8 my-2 mx-auto d-block" href="?id=<?php echo $key ?>">Delete</a>
                        </div>
                    </div>
                <?php  }
            } else { ?>
                <div class="card col-12 h1 p-5 text-center">
                    There are no products
                </div>
            <?php }
            ?>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- row ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<?php

include "../view/footer.php";
?>