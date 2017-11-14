<?php require "../vendor/autoload.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/styles.css" type="text/css" rel="stylesheet">
    <title>Book List</title>
</head>
<body>

<?php include "header.php"?>

<form>
    <input type="text" placeholder="Type here to search...">
    <button type="button">Search</button>
</form>

<div class="filter-column col-xs-3">
    <h2>Filter by price</h2>

    <!--SAMPLE FILTER BUTTON-->
    <a href="index.php">£0.00 - £9.99</a>

</div>

<div class="book-list col-xs-9">

    <!--SAMPLE LISTED BOOK-->
    <div class="listed-book col-xs-4">
        <img src="">
        <h3>TITLE</h3>
        <h4>£5.99</h4>
        <a href="">More details</a>
    </div>

</div>

<?php include "footer.php"?>

</body>
</html>