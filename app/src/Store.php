<?php

namespace App;

Use App\Book as Book;

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
        $query = $this->db->prepare("SELECT `id`, `title`, `price`, `image` FROM `books`;");
        $query->setFetchMode(\PDO::FETCH_CLASS, Book::class);
        $query->execute();
        return $books = $query->fetchAll();
    }
}