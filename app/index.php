<?php
require "../vendor/autoload.php";
$conn = new \App\DbConnector();
$store = new \App\Store($conn->db);
$books = $store->getAllBooks();
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
            <div class="bookList col-xs-9 col-xs-offset-3">
                <?php foreach ($books as $book) { ?>
                    <div class='listedBook col-xs-4'>
                        <?php //var_dump($book); ?>
                        <a href='individualBookPage.php?id=<?php echo $book->id; ?>'>
                            <img class='bookImage' src='<?php echo $book->image; ?>'>
                            <h4 class='title'><?php echo $book->title; ?></h4>
                            <h4 class='price'><?php echo $book->displayPrice(); ?></h4>
                        </a>
                  </div>
                <?php } ?>
            </div>
        </div>
    </div>

<?php include "includes/footer.php" ?>
</body>
</html>

