<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 15/11/2017
 * Time: 09:39
 */

namespace App;
/**
 * Book is a DB entity, with a constructor to create itself. The constructor has a default of null and can be passed an individual book id.
 * @package App
 */
class Book
{
    public $id;
    public $title;
    public $price;
    public $description;
    public $image;

//remove and replace from store
    public function __constructor (int $id = null): Book
    {
        if ($id != null) {
            $query = $this->db->prepare("SELECT `id`, `title`, `price`, `description`, `image` FROM `books` WHERE `id` = :id;");
            $query->bindParam(":id", $id);
            $query->setFetchMode(\PDO::FETCH_CLASS, Book::class);
            $query->execute();
            $book = $query->fetch();
            if ($book) {
                return $book;
            } else {
                return new Book();
            }
        }
    }
}