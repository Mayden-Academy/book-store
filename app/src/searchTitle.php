<?php

namespace App;


class SearchTitle
{
    public $db;
    public $id;
    public $book;
    public $title;
    public $price;
    public $description;
    public $image;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function performSearch($search) {
        try {
            $query = $this->db->prepare("SELECT `id`, `title` FROM `books` WHERE `title` LIKE '%:search%';");
            $query->bindParam(":search", $search, \PDO::PARAM_STR);
            $query->execute();
            return $query->fetchAll();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @return string
     */
    public function displayPrice()
    {
        return '£' . $this->price;
    }
}

header('Location: ../index.php');