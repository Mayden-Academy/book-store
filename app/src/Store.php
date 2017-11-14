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
    public function getAllBooks(){
        $query = $this->db->prepare("SELECT `id`, `title`, `price`, `image` FROM `books`;");
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS, Book::class);
        $books = $query->fetchAll();
        return $books;
    }
}