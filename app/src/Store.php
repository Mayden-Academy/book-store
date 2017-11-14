<?php

namespace App;


/**
 * Class Store
 * @package App
 * @return list of all books
 */
class Store
{
    public function getData($db){
        $query = $db->prepare("SELECT `id`, `title`, `price`, `image` FROM `books`;");
        $query->execute();
        $books = $query->fetchAll();
        return $books;
    }
}