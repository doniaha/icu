<?php 
session_start();
if (!empty($_SESSION["productInfo"])) {
    $products = $_SESSION["productInfo"];
}
if (!empty($_SESSION["rate"])) {
    $rate = $_SESSION["rate"];
    // Get Prouduct rate 
    function sumRate($rateArray , $productID) {
        $rat = [];
        foreach ($rateArray as $valu) {
                if ($productID == $valu["P_id"]) {
                    array_push($rat, $valu["rateing"]);
                }
        }
        return $rat;
    }
}

include 'header.php' ?>
<?php include 'navbar.php' ?>
<section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p>Summer Collection New Modren Desgin</p>
    <div class="container">
        <div class="row  d-flex align-items-center justify-content-center g-3">
            <?php
            if (isset($_SESSION["productInfo"])) {
                foreach ($products as $key => $product) { ?>
                    <div class="col-lg-4 col-12 ">
                        <div class="pro w-100">
                            <form action="./Solution/addtocart-handel.php?id=<?php echo $key ?>" method="post">
                            <img src="./admin/upload/<?php echo $product[3] ?>" alt="<?php echo $product[0] ?>"
                                class="w-100 rounded-2" style="height:250px" />
                            <div class="des">
                                <h2> <span class="h2 fw-bolder">Title :</span>
                                    <?php echo $product[0] ?>
                                </h2>
                                <h5>
                                <span class="h2 fw-bolder">Description :</span>    
                                    <?php echo $product[4] ?>
                                </h5> 
                                <?php
                                if (!empty($_SESSION["rate"])) {
                                    $rateArray = sumRate($rate, $key);
                                    (count($rateArray) > 0) ? $avg = array_sum($rateArray) / count($rateArray) : $avg = 0;  
                                    if ($avg > 0 && $avg <= 1) {
                                        echo "
                                        <div class='star'>
                                        <i class='fas fa-star h5'></i>
                                    </div>
                                        ";
                                    } elseif ($avg > 1 && $avg <= 2) {
                                        echo "
                                        <div class='star'>
                                        <i class='fas fa-star h5'></i>
                                        <i class='fas fa-star h5'></i>
                                    </div>
                                        ";
                                    } elseif ($avg > 2 && $avg <= 3) {
                                        echo "
                                        <div class='star'>
                                        <i class='fas fa-star h5'></i>
                                        <i class='fas fa-star h5'></i>
                                        <i class='fas fa-star h5'></i>
                                    </div>
                                        ";
                                    } elseif ($avg > 3 && $avg <= 4) {
                                        echo "
                                        <div class='star'>
                                        <i class='fas fa-star h5'></i>
                                        <i class='fas fa-star h5'></i>
                                        <i class='fas fa-star h5'></i>
                                        <i class='fas fa-star h5'></i>
                                    </div>
                                        ";
                                    } elseif ($avg > 4 && $avg <= 5) {
                                        echo "
                                        <div class='star'>
                                        <i class='fas fa-star h5'></i>
                                        <i class='fas fa-star h5'></i>
                                        <i class='fas fa-star h5'></i>
                                        <i class='fas fa-star h5'></i>
                                        <i class='fas fa-star h5'></i>
                                    </div>
                                        ";
                                    }          
                                }
                                ?>
                                <h4>
                                <span class="h2 fw-bolder">Price :</span>
                                    <?php echo $product[1] . " LE" ?>
                                </h4>
                                <input type="hidden" name="hiddenName" value="<?php echo $product[0] ?>">
                                <input type="hidden" name="hiddenPrice" value="<?php echo $product[1] ?>">
                                <input type="hidden" name="hiddenimg" value="<?php echo $product[3] ?>">
                                <input type="hidden" name="hiddenDesc" value="<?php echo $product[4] ?>">
                                <input type="hidden" name="productId" value="<?php echo $key ?>">
                                <input type="number" name="quantity" class="form-control mb-1" value="1"> 
                                <button type="submit" name="submit" style="border:none"><a class="cart "><i class="fas fa-shopping-cart"></i></a></button>                                
                            </div>
                            </form>
                            <a href="rating.php?rate=<?php echo $key?>" class="btn btn-outline-success" >rating</a>
                        </div>
                    </div>
                <?php 
                }
            } else { ?>
                <div class="card col-12 h1 p-5 text-center">
                    There are no products
                </div>
            <?php }
            ?>
        </div>
    </div>
    </div>
</section>
<section id="pagenation" class="section-p1">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="shop.php" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1 of 2 </a></li>
            <li class="page-item">
                <a class="page-link" href="shop.php?" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</section>
<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext ">
        <h4>Sign Up For Newletters</h4>
        <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
    </div>
    <div class="form ">
        <input type="text " placeholder="Enter Your E-mail... ">
        <button class="normal ">Sign Up</button>
    </div>
</section>


<?php include 'footer.php' ?>