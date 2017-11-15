<?php
require "../vendor/autoload.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/lib/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>BOOK PAGE | Booky McBookface</title>
</head>
<body>
<?php include_once "header.php"?>
<?php
$db = new \App\DbConnector();
$store = new \App\Store($db);

if (isset($_GET['id'])){
    $individualBook = $store->getIndividualBook($_GET['id']);
} else {
    $individualBook = new \App\Book();
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-2 label label-primary ReturnToHome">
            <a href="index.php">Return to search results</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5 individualBookImage">
            <img src="<?php echo $individualBook->image; ?>"/>
        </div>
        <div class="col-xs-6 col-xs-offset-1 individualBookTitle">
            <h3><?php echo $individualBook->title; ?></h3>
        </div>
        <div class="col-xs-6 col-xs-offset-1 individualBookDescriptionHeader">
            <h3>Description:</h3>
        </div>
        <div class="col-xs-6 col-xs-offset-1 individualBookDescription">
            <p><?php echo $individualBook->description; ?></p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-2 individualBookPrice">
            <h1>Price:</h1>
        </div>
        <div class="col-xs-2 col-xs-offset-1 individualBookPrice">
            <h1>£<?php echo $individualBook->price; ?></h1>
        </div>
        <div class="col-xs-6 col-xs-offset-1 individualBookAddToCart">
            <h1>Add To Cart</h1>
        </div>
    </div>
</div>
<?php include_once "footer.php"?>
</body>
</html>