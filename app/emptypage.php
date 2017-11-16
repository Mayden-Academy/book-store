<?php
/**
 * Created by PhpStorm.
 * User: alexandrk
 * Date: 15/11/2017
 * Time: 10:42
 */

require_once "cart.php";

session_start();
if(empty($_SESSION["cart"])) {
    $_SESSION["cart"]["bookIds"] = array();
    $_SESSION["cart"]["totalPrice"] = 0;
    $_SESSION["cart"]["totalBooks"] = 0;
}

if(isset($_GET["id"]) && isset($_GET["price"])) {
    $id = $_GET["id"];
    $price = $_GET["price"];
    $cart = new cart($_SESSION["cart"]["bookIds"], $_SESSION["cart"]["totalPrice"]);
    $_SESSION["cart"] = $cart->addBookToCart($id, $price);
}
var_dump($_SESSION["cart"]);

//session_destroy();
header("Location: individualBookPage.php?id=". $id);
die();
