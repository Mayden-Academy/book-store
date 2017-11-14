<?php

namespace App;

Use App\Book as Book;

/**
 * Class Store - prepare and execute query to DB to get all book names, ids, prices and images
 * @package App
 * @return array(object) of all books
 */
class Store
{

    public $db;

    public function __construct(DbConnector $connection)
    {
        $this->db = $connection->db;
    }

    /**
     * @param $db - property from DbConnector class
     */
    public function getAllBooks()
    {
        $query = $this->db->prepare("SELECT `id`, `title`, `price`, `image` FROM `books`;");
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS, Book::class);
        $books = $query->fetchAll();
        return $books;

    }

    public function showAllBooks($books)
    {
        foreach ($books as $book) {
            echo "<div class='listedBook col-xs-4'>
                        <a href='../individualBookPage.php?id=$book->id'>
                            <img class='listedBookImage' src='$book->image'>
                            <h4 class=''>$book->title</h4>
                            <h4 class=''>£$book->price</h4>
                            <p class=''>$book->description</p>
                        </a>
                  </div>";
        }
    }
}