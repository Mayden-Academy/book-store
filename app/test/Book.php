<?php

use PHPUnit\Framework\TestCase;

require "../src/Book.php";

class BookTest extends TestCase {
    public function testBook() {
        $book = new \App\book();
        $this->assertTrue(is_object($book));
    }
}