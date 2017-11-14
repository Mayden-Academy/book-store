<?php

namespace App;

//require_once "DbConnector.php";

class Store
{
    public function getData($db){
        $query = $db->prepare("SELECT `id`, `title`, `price`, `image` FROM `books`;");
        $query->execute();
        $books = $query->fetchAll();
        return $books;
    }
}