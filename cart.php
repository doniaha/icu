<?php
session_start();
include 'header.php' ?>
<?php include 'navbar.php';
if (!empty($_SESSION["cart"])) {
    $cart = $_SESSION["cart"];
}
// delete From Cart 
if (isset($_GET["id"])) {
    extract($_GET);
    unset($_SESSION["cart"][$id]);
    header("Refresh:0; url=cart.php");
}
?>
<section id="page-header" class="about-header">
    <h2>#Cart</h2>
    <p>Let's see what you have.</p>
</section>
<style>
    td.no {
        font-size: 4rem !important;
        font-weight: 700 !important;
        padding: 3.5rem !important;
        text-align: center !important;
    }
</style>
<section id="cart" class="section-p1">
    <table width="100%"  class="text-center">
        <thead>
            <tr>
                <td>Image</td>
                <td>Name</td>
                <td>Desc</td>
                <td>Quantity</td>
                <td>price</td>
                <td>Subtotal</td>
                <td>Remove</td>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($_SESSION["cart"])) {
                $total = 0;
                foreach ($cart as $key => $result) {
                    $array = json_decode(json_encode($result), true);
                    ?>
                    <tr>
                        <td><img src="./admin/upload/<?php echo $array["img"] ?>" alt="product1"></td>
                        <td>
                            <?php echo $array["name"] ?>
                        </td>
                        <td>
                            <?php echo $array["desc"] ?>
                        </td>
                        <td>
                            <?php echo $array["quantity"] ?>
                        </td>
                        <td>
                            <?php echo $array["prici"] ?>
                        </td>
                        <td>
                            <?php echo $array["quantity"] * $array["prici"];
                            $t_q = $array["quantity"] * $array["prici"];
                            $total = $total + $t_q;
                            ?>
                        </td>
                        <td><a href="cart.php?id=<?php echo $key ?>" class="btn btn-danger">Remove</a></td>
                    </tr>
                <?php }
            } else { ?>
                    <tr>
                        <td colspan="7" class="no">There are no products</td>
                    </tr>
            <?php } ?>
        </tbody>
        <!-- confirm order  -->
        <h2>Total :
            <?php echo (!empty($total)) ? $total : " "; ?>
        </h2>
        <td><a href="<?php echo (count($cart) != 0) ? 'confirmOrder.php' : ' ' ;?>" class="btn btn-success">Confirm</a></td>
        <!-- confirmOrder.php -->
    </table>
</section>



<?php include "footer.php" ?>