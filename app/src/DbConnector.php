<?php

namespace App;

/**
 * Class DbConnector
 * @package App
 * automatically instantiates the database connector object using PDO which can then be called with the $db variable.
 * dependencies: needed for all database queries.
 */
class DbConnector
{
    public function __construct()
    {
        $db = new \PDO('mysql:host=127.0.0.1;dbname=bookStore', 'root', '');
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        return $db;
    }
}