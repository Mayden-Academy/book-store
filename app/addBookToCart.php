<?php
require "../vendor/autoload.php";
session_start();
if (isset($_GET['id']) && isset($_GET['price'])) {
    $id = $_GET['id'];
    $price = $_GET['price'];
    $_SESSION = App\Cart::addBookToCart($_SESSION, $id, $price);
    header('Location: individualBookPage.php?id=' . $id);
    die();
}
header('Location: index.php');
die();
