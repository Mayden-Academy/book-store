<?php
require_once "../vendor/autoload.php";
session_start();

if(isset($_GET["id"]) && isset($_GET["price"])) {
    $_SESSION = App\Cart::removeBookFromCart($_SESSION, $_GET["id"], $_GET["price"]);
}

header("Location: cartPage.php");
die();