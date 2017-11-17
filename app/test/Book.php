<?php

use PHPUnit\Framework\TestCase;

require "../src/Book.php";

class BookTest extends TestCase {
    public function testBook() {
        $book = new \App\book();
        $this->assertTrue(is_object($book));
    }

    public function testdisplayPrice() {
        $book = new \App\book();
        $book->price = 10;
        $displayedPrice = $book->displayPrice();
        $this->assertEquals($displayedPrice, "£10");
    }
}