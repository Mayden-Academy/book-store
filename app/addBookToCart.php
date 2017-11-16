<?php
require "../vendor/autoload.php";
session_start();
if (isset($_GET['id']) && isset($_GET['price'])) {
    $id = $_GET['id'];
    $_SESSION = App\Cart::addBookToCart($_SESSION, $id, $_GET['price']);
    header('Location: individualBookPage.php?id=' . $id);
    die();
}
header('Location: index.php');
die();
