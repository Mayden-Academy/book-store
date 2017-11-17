<?php
require "../vendor/autoload.php";
session_start();
$conn = new \App\DbConnector();
$store = new \App\Store($conn->getDb());

if (isset($_GET['search'])) {
    $searchTerm = $_GET["search"];
    $searchGetTerm = 'search=' . $_GET['search'] . "&";
    $searchTitle = new \App\SearchTitle($conn->getDb());
    $books = $searchTitle->performSearch($searchTerm);
    $sortBooks = new \App\SortBooks($books);
} else {
    $searchTerm = "";
    $searchGetTerm = "";
    $books = $store->getAllBooks();
    $filteredBooksPrices = $store->getAllBookPrices();
    $sortBooks = new \App\SortBooks($filteredBooksPrices);
}

if ((!empty($_GET) && isset($_GET['min'])) && $_GET['min'] && $_GET['max']) {
    $books = $store->getBooksWithinRange($_GET['min'], $_GET['max'], $searchTerm);
}

$bookPrices = $sortBooks->getBooksPriceAscending();
$filter = new \App\FilterBooks($bookPrices);
$priceRanges = $filter->generatePriceRanges();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/styles.css" type="text/css" rel="stylesheet">
    <title>Book List</title>
</head>
<body>

<div class="stickyFooterExcluder">

    <?php include "includes/header.php" ?>

    <div class="container">
        <div class="row">
            <div class="searchAndFilterColumn col-xs-3">
                <form class="searchForm col-xs-12" action="index.php" method="GET">
                    <input class="searchInput col-xs-8" name="search" type="text" placeholder="Type here..."
                           value="<?php if (isset($_GET["search"])) {
                               echo $_GET["search"];
                           }; ?>">
                    <button class="searchButton btn btn-default col-xs-4" type="submit">Search</button>
                </form>
                <div class="filterColumn">
                    <h2>Filter by price</h2>
                    <?php foreach ($priceRanges as $ranges) {
                        if ((!empty($_GET) && isset($_GET['min'])) && $_GET['min'] == $ranges['lowerBound']) { ?>
                            <p class="filterButton active">£<?php echo $ranges['lowerBound']; ?> -
                                £<?php echo $ranges['upperBound']; ?>
                                <a type="button" href="index.php?<?php $searchGetTerm ?>" class="close"
                                   aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </p>
                            <?php
                        } else { ?>
                            <p class="filterButton"><a
                                        href="index.php?<?php echo $searchGetTerm ?>min=<?php echo $ranges['lowerBound']; ?>&max=<?php echo $ranges['upperBound']; ?>">
                                    £<?php echo $ranges['lowerBound']; ?> - £<?php echo $ranges['upperBound']; ?>
                                </a></p>
                        <?php }
                    } ?>
                </div>
            </div>
            <div class="bookList col-xs-9">
                <?php
                if (!$books) {
                    echo '<div class="alert alert-info" role="alert">"No books found."</div>';
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
    </div>
</div>

<?php include "includes/footer.php" ?>

</body>
</html>