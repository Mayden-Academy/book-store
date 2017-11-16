<?php
session_start();
require "../vendor/autoload.php";
$conn = new \App\DbConnector();
$store = new \App\Store($conn->getDb());
$bookPrices = $store->getAllBookPrices();
$filter = new \App\FilterBooks($bookPrices);
$priceRanges = $filter->generatePriceRanges();
if (!empty($_GET) && $_GET['min'] && $_GET['max']) {
    $books = $store->getBooksWithinRange($_GET['min'], $_GET['max']);
} else {
    $books = $store->getAllBooks();
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/styles.css" type="text/css" rel="stylesheet">
    <title>Book List</title>
</head>
<body>
<?php include "includes/header.php" ?>
<div class="stickyFooterExcluder">
    <div class="searchAndFilterColumn col-xs-3">
        <form class="searchForm col-xs-12">
            <input class="searchInput col-xs-8" type="text" placeholder="Type here...">
            <button class="searchButton btn btn-default col-xs-4" type="button">Search</button>
        </form>
        <div class="filterColumn">
            <h2>Filter by price</h2>
            <?php foreach ($priceRanges as $ranges) {
                if (!empty($_GET) && $_GET['min'] == $ranges['lowerBound']) { ?>
                    <p class="filterButton active">£<?php echo $ranges['lowerBound']; ?> -
                        £<?php echo $ranges['upperBound']; ?>
                        <a type="button" href="index.php" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </p>
                <?php } else { ?>
                    <p class="filterButton"><a
                                href="index.php?min=<?php echo $ranges['lowerBound']; ?>&max=<?php echo $ranges['upperBound']; ?>">
                            £<?php echo $ranges['lowerBound']; ?> - £<?php echo $ranges['upperBound']; ?>
                        </a></p>
                <?php }
            } ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="bookList col-xs-9">
                <?php
                if (!$books) {
                    echo '<div class="alert alert-danger" role="alert">"Something goes wrong, please try again later"</div>';
                } else {
                    foreach ($books as $book) { ?>
                        <div class='listedBook col-xs-4'>
                            <a href='individualBookPage.php?id=<?php echo $book->id; ?>'>
                                <img class='bookImage' src='<?php echo $book->image; ?>'>
                                <h4 class='title'><?php echo $book->title; ?></h4>
                                <h4 class='price'><?php echo $book->displayPrice(); ?></h4>
                            </a>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
        <?php include "includes/footer.php" ?>
</body>
</html>

