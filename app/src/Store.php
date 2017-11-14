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
    public function getAllBooks(){
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
    public function getIndividualBook(int $id): Book {
        $query = $this->db->prepare("SELECT `id`, `title`, `price`, `description`, `image` FROM `books` WHERE `id` = :id;");
        $query->bindParam(":id", $id);
        $query->setFetchMode(\PDO::FETCH_CLASS, Book::class);
        $query->execute();
        $book = $query->fetch();
        if ($book) {
            return $book;
        } else {
            return new Book();
        }
    }
}