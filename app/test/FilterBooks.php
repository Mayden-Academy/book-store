<?php

use PHPUnit\Framework\TestCase;

require "../src/FilterBooks.php";
require "../src/SortBooks.php";
require "../src/Book.php";

class FilterBooksTest extends TestCase
{
    public function testFilterBooksSuccess()
    {
        $filterBooks = new \App\FilterBooks([]);
        $this->assertTrue(is_object($filterBooks));
    }

    public function testFilterBooksMalformed()
    {
        $this->expectException(TypeError::class);
        new \App\FilterBooks('test');
    }

    public function testGeneratePriceRanges()
    {
        $book = $this->createMock(\App\Book::class);
        $book->price = 15;
        $book2 = $this->createMock(\App\Book::class);
        $book2->price = 25;
        $book3 = $this->createMock(\App\Book::class);
        $book3->price = 50;
        $book4 = $this->createMock(\App\Book::class);
        $book4->price = 79.99;
        $books = [$book, $book2, $book3, $book4];
        $filterBooks = new \App\FilterBooks($books);
        $generatedRanges = $filterBooks->generatePriceRanges();
        $expectedRanges = [['lowerBound' => 10, 'upperBound' => 19.99], ['lowerBound' => 20, 'upperBound' => 29.99], ['lowerBound' => 50, 'upperBound' => 59.99], ['lowerBound' => 70, 'upperBound' => 79.99]];
        $this->assertEquals($expectedRanges, $generatedRanges);
    }
}