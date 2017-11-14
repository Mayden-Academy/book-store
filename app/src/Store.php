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
    /**
     * @param $db - property from DbConnector class
     */
    public function getData($db){
        $query = $db->prepare("SELECT `id`, `title`, `price`, `image` FROM `books`;");
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS, Book::class);
        $books = $query->fetchAll();
        var_dump($books);
        return $books;
    }
}