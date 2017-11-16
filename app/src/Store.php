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
        } catch(\Exception $e) {
            return FALSE;
        }

    }
}