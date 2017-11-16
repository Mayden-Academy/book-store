<?php

namespace App;

/**
 * Book is a DB entity, with a constructor to create itself. The constructor has a default of null and can be passed an individual book id.
 * @package App
 */
class Book
{
    public $db;
    public $id;
    public $title;
    public $price;
    public $description;
    public $image;

    /**
     * Book constructor.
     * @param PDO $db (database connection) (optional)
     * @param int $id (book id) (optional)
     */
    public function __construct(\PDO $db = null, int $id = null)
    {
        $this->db = $db;
        try {
            if (isset($id)) {
                $query = $this->db->prepare("SELECT `id`, `title`, `price`, `description`, `image` FROM `books` WHERE `id` = :id;");
                $query->bindParam(":id", $id, \PDO::PARAM_INT);
                $query->execute();
                $book = $query->fetch();
                if ($book) {
                    $this->id = $book['id'];
                    $this->title = $book['title'];
                    $this->price = $book['price'];
                    $this->description = $book['description'];
                    $this->image = $book['image'];
                }
            }
        } catch (\Exception $e) {
            return FALSE;
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