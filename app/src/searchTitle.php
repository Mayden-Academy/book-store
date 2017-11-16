<?php

namespace App;


class SearchTitle
{
    public $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function performSearch($search) {
        try {
            $search = '%' . $search . '%';
            $query = $this->db->prepare("SELECT `id`, `title`, `price`, `image` FROM `books` WHERE `title` LIKE :search;");
            $query->setFetchMode(\PDO::FETCH_CLASS, BOOK::class);
            $query->bindParam(':search', $search, \PDO::PARAM_STR);
            $query->execute();
            return $query->fetchAll();
        } catch (\Exception $e) {
            return false;
        }
    }
}