

<section id="header">
<a href="index.html">
    <img src="img/logo.png" alt="homeLogo">
</a>

<div>
    <ul id="navbar">
        <li class="link">
            <a class="active " href="index.html"></a>
        </li>
        <li class="link">
            <a href="shop.php"></a>
        </li>
        <li class="link">
            <a href="blog.html">Blog</a>
        </li>
        <li class="link">
            <a href="about.html">About</a>
        </li>
        <li class="link">
            <a href="contact.html">Contact</a>
        </li>
        <li class="link">
        <?php 
        if (!isset($_SESSION["userLogin"])) {
            echo ' <a href="signup.php">Signup</a>' ;
        }
        ?>
        </li>
        <li class="link">
            <a href="lang.php?lang=en">English</a>
        </li>
        <li class="link">
            <a href="lang.php?lang=ar">Arabic</a>
        </li>

    <li class="link">
        <?php 
        if (isset($_SESSION["userLogin"])) {
            echo '<a href="./Solution/logout.php?userlogout">Logout</a>' ;
        } else {
            echo '<a href="login.php">Login</a>' ;
        } 
        ?>
        </li>
        <li class="link">
            <a id="lg-cart" href="cart.html">
                <i class="fas fa-shopping-cart"></i> 
            </a>
        </li>
        <li class="link fw-bolder">
        <?php 
        if (isset($_SESSION["userLogin"])) {
            echo "WellCome ". $_SESSION["userLogin"]["name"] ;
        } else {
            echo ' ' ;
        } 
        ?>
        </li>
    </ul>

</div>

<div id="mobile">
    <a href="cart.html">
        <i class="fas fa-shopping-cart"></i>
    </a>
    <a href="#" id="bar"> <i class="fas fa-outdent"></i> </a>
</div>
</section>