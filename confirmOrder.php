<?php
session_start();
if (!empty($_SESSION["userLogin"])) {
    $user = $_SESSION["userLogin"];
}
include "header.php";
include "navbar.php";

?>

<section id="cart-add" class="section-p1">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-between">
            <div class="col-3">
                <form class="w-100">
                    <div class="form-group my-2 px-2">
                    <label class="h2">coupon</label>
                        <input type="text" name="coupon" placeholder="Enter coupon code" class="form-control">
                        <button class="btn btn-primary my-2 px-5 py-2 d-block w-100" type="submit">Apply</button>
                    </div>
                </form>
            </div>
            <div class="col-8">
            <h2>Cart totals</h2>
        <form class="w-100" action="congratulations.php" method="post">
        <div class="form-group my-2">
        <label class="h5">Name</label>
        <input type="text" value="<?php echo $user["name"]; ?>" class="form-control">
        </div>
        <div class="form-group my-2">
        <label class="h5">Email</label>
        <input type="email" value="<?php echo $user["email"]; ?>" class="form-control">
        </div>
        <div class="form-group my-2">
        <label class="h5">address</label>
        <input type="text" value="<?php echo $user["address"]; ?>" class="form-control">
        </div>
        <div class="form-group my-2">
        <label class="h5">city</label>
        <input type="text" value="<?php echo $user["address"]; ?>" class="form-control">
        </div>
        <div class="form-group my-2">
        <label class="h5">postalCode</label>
        <input type="number" class="form-control">
        </div>
        <div class="form-group my-2">
        <label class="h5">phone</label>
        <input type="text" value="<?php echo $user["phone"]; ?>" class="form-control">
        </div>
        <div class="form-group my-2">
        <label class="h5">paymentType</label>
            <select class="form-select">
                <option value="Cash_on_Delivery">Cash on Delivery</option>
                <option value="Credit_Card">Credit Card</option>
                <option value="Fawry">Fawry</option>
            </select>
        </div>

            <button class="btn btn-primary my-2 px-5 py-2 d-block w-50 mx-auto my-2" type="submit">proceed to checkout</button>
        </form>
            </div>
        </div>
    </div>











</section>


<?php include "footer.php" ?>