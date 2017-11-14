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

<div class="stickyFooterExcluder">

<?php include "header.php"?>

    <div class="container">
        <div class="searchAndFilterColumn col-xs-3">
            <form class="searchForm col-xs-12">
                <input class="searchInput col-xs-8" type="text" placeholder="Type here...">
                <button class="searchButton col-xs-4" type="button">Search</button>
            </form>

            <div class="filterColumn">
                <h2>Filter by price</h2>

                <!--SAMPLE FILTER BUTTON-->
                <p class="filterButton"><a href="index.php">£0.00 - £9.99</a></p>

                <!--SAMPLE FILTER BUTTON-->
                <p class="filterButton"><a href="index.php">£0.00 - £9.99</a></p>

                <!--SAMPLE FILTER BUTTON-->
                <p class="filterButton"><a href="index.php">£0.00 - £9.99</a></p>

                <!--SAMPLE FILTER BUTTON-->
                <p class="filterButton"><a href="index.php">£0.00 - £9.99</a></p>

                <!--SAMPLE FILTER BUTTON-->
                <p class="filterButton"><a href="index.php">£0.00 - £9.99</a></p>

                <!--SAMPLE FILTER BUTTON-->
                <p class="filterButton"><a href="index.php">£0.00 - £9.99</a></p>

                <!--SAMPLE FILTER BUTTON-->
                <p class="filterButton"><a href="index.php">Remove filter</a></p>



            </div>
        </div>

        <div class="bookList col-xs-9">

            <!--SAMPLE LISTED BOOK-->
            <a class="listedBook col-xs-4">
                <img class="bookImage" src="images/bookImage.jpeg">
                <h3>TITLE</h3>
                <h4>£5.99</h4>
                <p>More details</p>
            </a>
            <!--SAMPLE LISTED BOOK-->

            <!--SAMPLE LISTED BOOK-->
            <a class="listedBook col-xs-4">
                <img class="bookImage" src="images/bookImage.jpeg">
                <h3>TITLE</h3>
                <h4>£5.99</h4>
                <p>More details</p>
            </a>
            <!--SAMPLE LISTED BOOK-->
            <a class="listedBook col-xs-4">
                <img class="bookImage" src="images/bookImage.jpeg">
                <h3>TITLE</h3>
                <h4>£5.99</h4>
                <p>More details</p>
            </a>
            <!--SAMPLE LISTED BOOK-->
            <a class="listedBook col-xs-4">
                <img class="bookImage" src="images/bookImage.jpeg">
                <h3>TITLE</h3>
                <h4>£5.99</h4>
                <p>More details</p>
            </a>
            <!--SAMPLE LISTED BOOK-->
            <a class="listedBook col-xs-4">
                <img class="bookImage" src="images/bookImage.jpeg">
                <h3>TITLE</h3>
                <h4>£5.99</h4>
                <p>More details</p>
            </a>
            <!--SAMPLE LISTED BOOK-->
            <a class="listedBook col-xs-4">
                <img class="bookImage" src="images/bookImage.jpeg">
                <h3>TITLE</h3>
                <h4>£5.99</h4>
                <p>More details</p>
            </a>            <!--SAMPLE LISTED BOOK-->
            <a class="listedBook col-xs-4">
                <img class="bookImage" src="images/bookImage.jpeg">
                <h3>TITLE</h3>
                <h4>£5.99</h4>
                <p>More details</p>
            </a>
            <!--SAMPLE LISTED BOOK-->
            <a class="listedBook col-xs-4">
                <img class="bookImage" src="images/bookImage.jpeg">
                <h3>TITLE</h3>
                <h4>£5.99</h4>
                <p>More details</p>
            </a>
            <!--SAMPLE LISTED BOOK-->
            <a class="listedBook col-xs-4">
                <img class="bookImage" src="images/bookImage.jpeg">
                <h3>TITLE</h3>
                <h4>£5.99</h4>
                <p>More details</p>
            </a>            <!--SAMPLE LISTED BOOK-->
            <a class="listedBook col-xs-4">
                <img class="bookImage" src="images/bookImage.jpeg">
                <h3>TITLE</h3>
                <h4>£5.99</h4>
                <p>More details</p>
            </a>
            <!--SAMPLE LISTED BOOK-->
            <a class="listedBook col-xs-4">
                <img class="bookImage" src="images/bookImage.jpeg">
                <h3>TITLE</h3>
                <h4>£5.99</h4>
                <p>More details</p>
            </a>
            <!--SAMPLE LISTED BOOK-->
            <a class="listedBook col-xs-4">
                <img class="bookImage" src="images/bookImage.jpeg">
                <h3>TITLE</h3>
                <h4>£5.99</h4>
                <p>More details</p>
            </a>
        </div>

    </div>
</div>

<?php include "footer.php"?>

</body>
</html>

