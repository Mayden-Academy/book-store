<?php

namespace App;

Use App\Book as Book;

class Store
{
    public $db;

    /**
     * Store constructor.
     * @param DbConnector $connection
     */
    public function __construct(DbConnector $connection)
    {
        $this->db = $connection->db;
    }

    /**
     * gets all the books and their data from DataBase
     * @return array of book objects
     */
    public function getAllBooks()
    {
        $query = $this->db->prepare("SELECT `id`, `title`, `price`, `image` FROM `books`;");
        $query->setFetchMode(\PDO::FETCH_CLASS, Book::class);
        $query->execute();
        $books = $query->fetchAll();
        return $books;
    }


    /**
     * gets the data from the DataBase for individual book given the id
     * @param int $id
     * @return Book object with specified id
     */
    public function getIndividualBook(int $id): Book
    {
        $query = $this->db->prepare("SELECT `id`, `title`, `price`, `description`, `image` FROM `books` WHERE `id` = :id;");
        $query->bindParam(":id", $id, \PDO::PARAM_INT);
        $query->setFetchMode(\PDO::FETCH_CLASS, Book::class);
        $query->execute();
        $book = $query->fetch();
        if ($book) {
            return $book;
        } else {
            return new Book();
        }
    }

    /**
     * gets the data from the DataBase for individual book given where the price range is between min and max values
     * @param float $min $max
     * @return Book object within specified price range
     */
    public function getBooksWithinRange(float $min, $max)
    {

        $query = $this->db->prepare("SELECT `id`, `title`, `price`, `image` FROM `books` WHERE `price` BETWEEN :min AND :max");
        $query->bindParam(":min", $min);
        $query->bindParam(":max", $max);
        $query->setFetchMode(\PDO::FETCH_CLASS, Book::class);
        $query->execute();
        $booksWithinPriceRange = $query->fetch();
        return $booksWithinPriceRange;
    }
}