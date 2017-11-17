<?php

use PHPUnit\Framework\TestCase;

require "../src/SortBooks.php";
require "../src/Book.php";

class SortBooksTest extends TestCase
{
    public function testSortBooksSuccess()
    {
        $sortBooks = new \App\SortBooks([]);
        $this->assertTrue(is_object($sortBooks));
    }

    public function testSortBooksMalformed()
    {
        $this->expectException(TypeError::class);
        new \App\SortBooks('test');
    }

    public function testGetBooksPriceAscending()
    {
        $book = $this->createMock(\App\Book::class);
        $book->price = 35.34;
        $book2 = $this->createMock(\App\Book::class);
        $book2->price = 93.02;
        $book3 = $this->createMock(\App\Book::class);
        $book3->price = 48.94;
        $book4 = $this->createMock(\App\Book::class);
        $book4->price = 48.79;
        $books = [$book, $book2, $book3, $book4];
        $sortBooks = new \App\SortBooks($books);
        $generatedSortedBooks = $sortBooks->getBooksPriceAscending();
        $expectedSortedBooks = [$book, $book4, $book3, $book2];
        $this->assertEquals($expectedSortedBooks, $generatedSortedBooks);
    }
}