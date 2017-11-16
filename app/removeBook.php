<?php
require_once "../vendor/autoload.php";

session_start();

if(isset($_GET["id"]) && isset($_GET["price"])) {
    $id = $_GET["id"];
    $price = $_GET["price"];
    $cart = new App\Cart($_SESSION["cart"]["bookIds"], $_SESSION["cart"]["totalPrice"]);
    $_SESSION["cart"] = $cart->removeBookFromCart($id, $price);
    var_dump($_SESSION["cart"]);
}

header("Location: cartPage.php");
die();