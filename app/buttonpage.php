<?php
    session_start();
    if(empty($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    echo "Our cart: ";
//    var_dump($_SESSION["cart"]);

?>
<p  style="text-align: center; margin-top: 200px"><a href="addBookToCart.php?id=3">Click on me</a></p>
<p  style="text-align: center; margin-top: 200px"><a href="destroy.php">Checkout</a></p>

