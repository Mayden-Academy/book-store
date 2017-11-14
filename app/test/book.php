<?php

use PHPUnit\Framework\TestCase;

require "../src/book.php";

class bookTest extends TestCase {
    public function testBook() {
        $book = new \App\book();
        $this->assertTrue(is_object($book));
    }
}