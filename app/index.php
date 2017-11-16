<?php
require "../vendor/autoload.php";
$db = new \App\DbConnector();
$store = new \App\Store($db);
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
    <?php include "header.php" ?>

    <div class="container">
        <div class="row">
            <div class="searchAndFilterColumn col-xs-3">
                <form class="searchForm col-xs-12">
                    <input class="searchInput col-xs-8" type="text" placeholder="Type here...">
                    <button class="searchButton btn btn-default col-xs-4" type="button">Search</button>
                </form>


                <?php
                function cmp($a, $b) {
                    return $a->price > $b->price;
                }
                usort($books, "cmp");

                function getRanges($books, &$result) {
                    $max = ceil(end($books)->price / 10) * 10;
                    $min = floor($books[0]->price /10) * 10;
                    $mid = ceil(($max + $min) / 20) * 10;

                    if ($max - $min == 10) {
                        $result[] = ['min' => $min, 'max' => $max - 0.01];
                        return;
                    }

                    $array1 = array_filter($books, function ($book) use($mid) {
                        return $book->price < $mid;
                    });
                    $array1 = array_values($array1);


                    $array2 = array_filter($books, function ($book) use($mid) {
                        return $book->price >= $mid;
                    });
                    $array2 = array_values($array2);

                    if (count($array1) ==1) {
                        $arr1max = ceil($array1[0]->price / 10) * 10;
                        $arr1min = floor($array1[0]->price /10) * 10;
                        $result[] = ['min' => $arr1min, 'max' => $arr1max - 0.01];
                    } else if (count($array1) > 1) {
                        getRanges($array1, $result);
                    }

                    if (count($array2) ==1) {
                        $arr2max = ceil($array2[0]->price / 10) * 10;
                        $arr2min = floor($array2[0]->price /10) * 10;
                        $result[] = ['min' => $arr2min, 'max' => $arr2max - 0.01];
                    } else if (count($array2) > 1) {
                        getRanges($array2, $result);
                    }
                }

                $result = [];
                getRanges($books, $result);
                var_dump($result);
                
                ?>














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
                <?php foreach ($books as $book) { ?>
                    <div class='listedBook col-xs-4'>
                        <a href='individualBookPage.php?id=<?php echo $book->id; ?>'>
                            <img class='bookImage' src='<?php echo $book->image; ?>'>
                            <h4 class='title'><?php echo $book->title; ?></h4>
                            <h4 class='price'><?php echo $book->price; ?></h4>
                            <p class='description'><?php echo $book->description; ?></p>
                        </a>
                  </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>
</body>
</html>

