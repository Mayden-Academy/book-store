<?php

namespace App;


/**
 * Class Store - prepare and execute query to DB to get all book names, ids, prices and images
 * @package App
 * @return list(array) of all books
 */
class Store
{

    /**
     * @param $db - property from DbConnector class
     */
    public function getData($db){
        $query = $db->prepare("SELECT `id`, `title`, `price`, `image` FROM `books`;");
        $query->execute();
        $books = $query->fetchAll();
        return $books;
    }
}