<?php
require_once "../vendor/autoload.php";

session_start();

if(!isset($_SESSION["cart"])) {
    $_SESSION["cart"]["bookIds"] = array();
    $_SESSION["cart"]["totalPrice"] = 0;
    $_SESSION["cart"]["totalBooks"] = 0;
}

if(isset($_GET["id"]) && isset($_GET["price"])) {
    $id = $_GET["id"];
    $price = $_GET["price"];
    $cart = new App\Cart($_SESSION["cart"]["bookIds"], $_SESSION["cart"]["totalPrice"]);
    $_SESSION["cart"] = $cart->addBookToCart($id, $price);
}

header("Location: individualBookPage.php?id=". $id);
die();
