<?php
session_start();
include 'header.php';
include 'navbar.php';
if (!empty($_SESSION["productInfo"])) {
    $product = $_SESSION["productInfo"];
}
if (!empty($_SESSION["rate"])) {
    $rate = $_SESSION["rate"];
}
if (isset($_GET["rate"])) {
    extract($_GET);
}
?>
<style>
    input[type="radio"]:checked+.fa-star {
        color: gold !important;
    }
</style>
<div class="container py-3">
    <div class="row d-flex align-items-center justify-content-between">
        <div class="col-4 p-2 rounded-2">
            <img src="./admin/upload/<?php echo $product[$rate][3] ?>" alt="<?php echo $product[$rate][0] ?>"
                class="w-100 rounded-2" style="height:250px" />
            <div class="des bg-dark p-2">
                <h2 class="text-light"> <span class="h2 fw-bolder text-light">Title :</span>
                    <?php echo $product[$rate][0] ?>
                </h2>
                <h5 class="text-light">
                    <span class="h2 fw-bolder text-light">Description :</span>
                    <?php echo $product[$rate][4] ?>
                </h5>
                <h4 class="text-light">
                    <span class="h2 fw-bolder text-light">Price :</span>
                    <?php echo $product[$rate][1] . " LE" ?>
                </h4>
                <input type="hidden" name="hiddenName" value="<?php echo $product[0] ?>">
                <input type="hidden" name="hiddenPrice" value="<?php echo $product[1] ?>">
                <input type="hidden" name="hiddenDesc" value="<?php echo $product[4] ?>">
                <input type="hidden" name="hiddenimg" value="<?php echo $product[3] ?>">
            </div>
        </div>
        <div class="col-7">
            <form action="./Solution/rating-handel.php" method="post">
                <div class="form-group my-3">
                    <label class="h3 p-2" for="exampleFormControlInput1">rate</label>
                    <div class="star">
                        <label for="1"><input type="radio" name="rateing" hidden id="1" value="1" ><i
                                class="fas fa-star h2 "></i> </label>
                        <label for="2"><input type="radio" name="rateing" hidden id="2" value="2"><i
                                class="fas fa-star h2 "></i> </label>
                        <label for="3"><input type="radio" name="rateing" hidden id="3" value="3"><i
                                class="fas fa-star h2 "></i> </label>
                        <label for="4"><input type="radio" name="rateing" hidden id="4" value="4"><i
                                class="fas fa-star h2 "></i> </label>
                        <label for="5"><input type="radio" name="rateing" hidden id="5" value="5"><i
                                class="fas fa-star h2 "></i> </label>
                    </div>
                </div>
                <input type="hidden" value="<?php echo $rate ?>" name="id">
                <div class="form-group my-3">
                    <label class="h3 p-2" for="exampleFormControlTextarea1">Text</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>
                </div>
                <input type="submit" class="btn btn-primary col-5 mx-auto d-block" name="submit" value="Rate">
            </form>
        </div>
    </div>
</div>
<?php include "footer.php" ?>