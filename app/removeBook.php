<?php
require_once "../vendor/autoload.php";
session_start();

if(isset($_GET["id"]) && isset($_GET["price"])) {
    $id = $_GET["id"];
    $price = $_GET["price"];
    $_SESSION = App\Cart::removeBookFromCart($_SESSION, $id, $price);
}

header("Location: cartPage.php");
die();