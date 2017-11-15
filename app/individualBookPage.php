<?php
require "../vendor/autoload.php";

if (isset($_GET['id'])) {
    $conn = new \App\DbConnector();
    $individualBook = new \App\Book($conn->db, $_GET['id']);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/lib/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>View Book:<?php echo $individualBook->title ?> </title>
</head>
<body>

<div class="stickyFooterExcluder">
    <?php include "includes/header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-xs-2 label label-primary returnToHome">
                <a href="index.php">Return to search results</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-5 individualBookImage">
                <img src="<?php echo $individualBook->image; ?>"/>
            </div>
            <div class="col-xs-offset-1 col-xs-6 individualBookTitle">
                <h3><?php echo $individualBook->title; ?></h3>
            </div>
            <div class="col-xs-offset-1 col-xs-6 individualBookDescriptionHeader">
                <h3>Description:</h3>
            </div>
            <div class="col-xs-offset-1 col-xs-6 individualBookDescription">
                <p><?php echo $individualBook->description; ?></p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-2 individualBookPrice">
                <h1>Price:</h1>
            </div>
            <div class="col-xs-2 col-xs-offset-1 individualBookPrice">
                <h1><?php echo $individualBook->displayPrice(); ?></h1>
            </div>
            <div class="col-xs-6 col-xs-offset-1 individualBookAddToCart">
                <h1>Add To Cart</h1>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>
</body>
</html>