<?php
session_start();
include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
if (isset($_SESSION["error"])) {
  extract($_SESSION);
}
?>
<div class="container-fluid page-body-wrapper full-page-wrapper ">
  <div class="row w-100 m-0">
    <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
      <div class="card col-lg-8 mx-auto">
        <div class="card-body px-5 py-5">
          <h3 class="card-title text-left mb-3">Add Product</h3>
          <form method="POST" action="../../Solution/addproduct-handel.php" enctype="multipart/form-data">
            <div class="form-group">
              <label>Title</label>
              <input type="text" name="name" class="form-control text-light p_input">
              <?php
            echo !empty($error["name"]) ? "<div class='py-0 px-2 mt-1 alert alert-danger'>" . $error["name"] . "</div>" : " ";
            ?>
            </div>
            <div class="form-group">
              <label>Description</label>
              <input type="text" name="desc" class="form-control text-light p_input">
              <?php
            echo !empty($error["desc"]) ? "<div class='py-0 px-2 mt-1 alert alert-danger'>" . $error["desc"] . "</div>" : " ";
            ?>
            </div>
            <div class="form-group">
              <label>Price</label>
              <input type="number" name="price" class="form-control text-light p_input">
              <?php
            echo !empty($error["price"]) ? "<div class='py-0 px-2 mt-1 alert alert-danger'>" . $error["price"] . "</div>" : " ";
            ?>
            </div>
            <div class="form-group">
              <label>Quantity</label>
              <input type="number" name="quantity" class="form-control text-light p_input">
              <?php
            echo !empty($error["quantity"]) ? "<div class='py-0 px-2 mt-1 alert alert-danger'>" . $error["quantity"] . "</div>" : " ";
            ?>
            </div>
            <div class="form-group">
              <label>Image</label>
              <input type="file" name="img" class="form-control p_input">
              <?php
            echo !empty($error["img"]) ? "<div class='py-0 px-2 mt-1 alert alert-danger'>" . $error["img"] . "</div>" : " ";
            ?>
            </div>
            <div class="text-center">
              <button type="submit" name="addProduct" class="btn btn-primary btn-block enter-btn col-6">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php
if (isset($_GET["load"])) {
  include_once("../../Solution/successmessage.php");
} 

include "../view/footer.php";
unset($_SESSION["error"]);

?>