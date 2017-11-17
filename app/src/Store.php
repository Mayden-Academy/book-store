<?php

namespace App;

Use App\Book as Book;

/**
 * Class Store
 * @package App - contain all data about books from DataBase
 */
class Store
{
    private $db;

    /**
     * Store constructor.
     * @param PDO $db (database connection)
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * gets all the books and their data from DataBase
     * @return array of book objects
     */
    public function getAllBooks()
    {
        try {
            $query = $this->db->prepare("SELECT `id`, `title`, `price`, `image` FROM `books`;");
            $query->setFetchMode(\PDO::FETCH_CLASS, Book::class);
            $query->execute();
            return $query->fetchAll();
        } catch (\Exception $e) {
            return FALSE;
        }
    }

    /**
     * gets all the books prices
     * @return array of book prices
     */
    public function getAllBookPrices()
    {
        try {
            $query = $this->db->prepare("SELECT `price` FROM `books`;");
            $query->setFetchMode(\PDO::FETCH_CLASS, Book::class);
            $query->execute();
            return $query->fetchAll();
        } catch (\Exception $e) {
            return FALSE;
        }
    }

    /**
     * gets the data from the DataBase for individual book given where the price range is between min and max values
     * @param int $min minimum price of a book
     * @param float $max maximum price of a book
     * @return array of Book objects within specified price range
     */
    public function getBooksWithinRange(int $min, float $max, string $search): array
    {
        try {
            $search = '%' . $search . '%';
            $query = $this->db->prepare("SELECT `id`, `title`, `price`, `image` FROM `books` WHERE `price` >= :min AND `price` <= :max AND `title` LIKE :search;");
            $query->bindParam(":min", $min);
            $query->bindParam(":max", $max);
            $query->bindParam(':search', $search, \PDO::PARAM_STR);
            $query->setFetchMode(\PDO::FETCH_CLASS, Book::class);
            $query->execute();
            return $query->fetchAll();
        } catch (\Exception $e) {
            return FALSE;
        }
    }
}