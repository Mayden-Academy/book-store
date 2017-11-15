<?php

namespace App;

/**
 * Class DbConnector
 * @package App
 * class to connect to database
 * dependencies: needed for all database queries.
 */
class DbConnector
{
    private $db;

    /**
     * DbConnector constructor.
     * automatically instantiates the DB connector object using PDO which can then be called with the $db variable.
     */
    public function __construct()
    {
        $this->db = new \PDO('mysql:host=127.0.0.1;dbname=bookStore', 'root', '');
    }

    public function getDb() {
        return $this->db;
    }
}