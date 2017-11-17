<?php

namespace App;

/**
 * SearchTitle is a DB entity with constructor to connect to DB and method that search the title of book
 * @package App
 */
class SearchTitle
{
    public $db;

    /**
     * SearchTitle constructor.
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * method that search the titles inside DB
     * @param $search
     * @return array|bool
     */
    public function performSearch($search) {
        try {
            $search = '%' . $search . '%';
            $query = $this->db->prepare("SELECT `id`, `title`, `price`, `image` FROM `books` WHERE `title` LIKE :search;");
            $query->setFetchMode(\PDO::FETCH_CLASS, BOOK::class);
            $query->bindParam(':search', $search, \PDO::PARAM_STR);
            $query->execute();
            $returnedBooks = $query->fetchAll();
            return $returnedBooks;
        } catch (\Exception $e) {
            return false;
        }
    }
}